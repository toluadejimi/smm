<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use App\Constants\Status;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\AdminNotification;
use App\Models\Transfertransactions;


class ApiController extends Controller
{



	public function run(request $request){

        $userIds = Service::pluck('name');

        // Get transactions with user_id as null
        $transactionsToUpdate = Transfertransactions::whereNull('service')->where('status', 2)->get();

        // Update transactions with random user IDs
        foreach ($transactionsToUpdate as $transaction) {
            $randomUserId = $userIds->random();
            $transaction->service = $randomUserId;
            $transaction->save();
        }


        return response()->json([
            'message' => 'Transactions updated successfully!'
        ]);

    }


	public function e_check(request $request){

        $get_user =  User::where('email', $request->email)->first() ?? null;

        if($get_user == null){

            return response()->json([
                'status' => false,
                'message' => 'No user found, please check email and try again',
            ]);
        }


        return response()->json([
            'status' => true,
            'user' => $get_user->username,
        ]);

    }


    public function e_fund(request $request){

        $get_user =  User::where('email', $request->email)->first() ?? null;

        if($get_user == null){

            return response()->json([
                'status' => false,
                'message' => 'No user found, please check email and try again',
            ]);
        }

        User::where('email', $request->email)->increment('balance', $request->amount) ?? null;

        $amount = number_format($request->amount, 2);

        return response()->json([
            'status' => true,
            'message' => "NGN $amount has been successfully added to your wallet",
        ]);

    }



	public function process(Request $request)
	{
		if (!$request->action) {
			return response()->json(["error" => "The action field is required"]);
		}

		if (!$request->key) {
			return response()->json(["error" => "The api key field is required"]);
		}
		$actionExists = array('services', 'add', 'status', 'refill', 'refill_status', 'balance');

		if (!in_array($request->action, $actionExists)) {
			return response()->json(["error" => "Invalid action"]);
		}
		//Checking api key exist
		if (!User::where('api_key', $request->key)->exists()) {
			return response()->json(['error' => 'Invalid api key']);
		}
		//Checking the request action is services
		$action = $request->action;
		return $this->$action($request);
	}


    public function process_request(Request $request)
	{
       
            $data['services'] = Service::where("category_id",$request->cat)
            ->get(["name","price_per_k", "min", "max", "details", "id", "api_provider_id", "api_service_id"]);
            return response()->json($data);
       
	}


    public function process_info(Request $request)
	{
          
            $data['services'] = Service::where("id",$request->cat)
            ->get(["name","price_per_k", "min", "max", "details", "api_provider_id", "api_service_id"]);
            return response()->json($data);
       
	}


	//List of services
	public function services()
	{
		$services      = Service::active()->with('category')->get();
		$modifyService = [];

		foreach ($services as $service) {
			$modifyService[] = [
				"service"  => $service->id,
				"name"     => $service->name,
				"rate"     => $service->price_per_k,
				"min"      => $service->min,
				"max"      => $service->max,
				"category" => $service->category->name,
			];
		}

		return response()->json($modifyService);
	}

	//Place new order
	public function add(Request $request)
	{

		//Service
		$service = Service::active()->find($request->service);

		if (!$service) {
			return response()->json(['error' => 'Invalid Service Id']);
		}


		if (!$request->link) {
			return response()->json(['error' => 'The link field is required']);
		}
		if (!$request->quantity) {
			return response()->json(['error' => 'The quantity field is required']);
		}

		if ($request->quantity < $service->min && $request->quantity > $service->max) {
			return response()->json(['error' => 'Please follow the limit']);
		}


		$price = getAmount(($service->price_per_k / 1000) * $request->quantity);

		//Subtract user balance
		$user = User::where('api_key', $request->key)->firstOrFail();

		if ($user->balance < $price) {
			return response()->json(['error' => 'Insufficient balance']);
		}

		$user->balance -= $price;
		$user->save();

		//Save order record
		$order              = new Order();
		$order->user_id     = $user->id;
		$order->category_id = $service->category_id;
		$order->service_id  = $service->id;
		$order->link        = $request->link;
		$order->quantity    = $request->quantity;
		$order->runs        = $request->runs ?? 0;
		$order->interval    = $request->interval ?? 0;
		$order->price       = $price;
		$order->remain      = $request->quantity;
		$order->save();

		//Create Transaction
		$transaction               = new Transaction();
		$transaction->user_id      = $user->id;
		$transaction->amount       = $price;
		$transaction->post_balance = getAmount($user->balance);
		$transaction->trx_type     = '-';
		$transaction->details      = 'Order for ' . $service->name;
		$transaction->trx          = getTrx();
		$transaction->save();

		//Create admin notification
		$adminNotification            = new AdminNotification();
		$adminNotification->user_id   = $user->id;
		$adminNotification->title     = 'New order request for ' . $service->name;
		$adminNotification->click_url = urlPath('admin.orders.details', $order->id);
		$adminNotification->save();

		//Send email to user
		$gnl = GeneralSetting::first();
		notify($user, 'PENDING_ORDER', [
			'service_name' => $service->name,
			'username'     => $user->username,
			'full_name'    => $user->fullname,
			'price'        => $price,
			'currency'     => $gnl->cur_text,
			'post_balance' => getAmount($user->balance),
		]);

		return response()->json(['order' => $order->id]);
	}

	//Order Status
	private function status($request)
	{

		if (!$request->order) {
			return response()->json(["error" => "The order field is required"]);
		}

		//Service
		$order = Order::where('id', $request->order)->select(['status', 'start_counter', 'remain'])->first();

		if (!$order) {
			return response()->json(['error' => 'Invalid Order Id']);
		}

		$order['status'] = ($order->status == Status::ORDER_PENDING ? 'pending' : ($order->status == Status::ORDER_PROCESSING ? 'processing' : ($order->status == Status::ORDER_COMPLETED ? 'completed' : ($order->status == Status::ORDER_CANCELLED ? 'cancelled' : 'refunded'))));

		$order['currency'] = gs()->cur_text;

		return response()->json($order);
	}

	private function balance($request)
	{
		//Validation
		$balance = User::where('api_key', $request->key)->select(['balance'])->first();

		if (!$balance) {
			return response()->json(['error' => 'Invalid api key']);
		}

		$balance = [
			"balance" => showAmount($balance->balance),
			"currency" => gs()->cur_text,
		];
		return response()->json($balance);
	}
}
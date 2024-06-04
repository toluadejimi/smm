<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Lib\GoogleAuthenticator;
use App\Models\Category;
use App\Models\Deposit;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\Service;
use App\Models\SupportTicket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        $pageTitle = 'Dashboard';
        $user = auth()->user();
        $widget['balance'] = $user->balance;
        $widget['total_spent'] = Order::where('status', '!=', Status::ORDER_REFUNDED)->where('user_id', $user->id)->sum('price');
        $widget['total_transaction'] = Transaction::where('user_id', $user->id)->count();
        $widget['total_order'] = Order::where('user_id', $user->id)->count();
        $widget['pending_order'] = Order::where('user_id', $user->id)->pending()->count();
        $widget['processing_order'] = Order::where('user_id', $user->id)->processing()->count();
        $widget['completed_order'] = Order::where('user_id', $user->id)->completed()->count();
        $widget['cancelled_order'] = Order::where('user_id', $user->id)->cancelled()->count();
        $widget['refunded_order'] = Order::where('user_id', $user->id)->refunded()->count();
        $widget['deposit'] = Deposit::successful()->where('user_id', $user->id)->sum('amount');
        $widget['total_service'] = Service::active()->count();
        $widget['total_ticket'] = SupportTicket::where('user_id', $user->id)->count();
        $transactions = Transaction::where('user_id', auth()->id())->searchable(['trx'])->filter(['trx_type', 'remark'])->orderBy('id', 'desc')->paginate(getPaginate());

        $pending = Order::where('user_id', $user->id)->pending()->get();

        $whatsapp_link = GeneralSetting::where('id', 1)->first()->whatsapp_link;
        return view($this->activeTemplate . 'user.dashboard', compact('pageTitle', 'transactions', 'pending', 'widget', 'whatsapp_link'));
    }

    public function depositHistory(Request $request)
    {
        $pageTitle = 'Deposit History';
        $deposits = auth()->user()->deposits()->searchable(['trx'])->with(['gateway'])->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.deposit_history', compact('pageTitle', 'deposits'));
    }

    public function show2faForm()
    {
        $general = gs();
        $ga = new GoogleAuthenticator();
        $user = auth()->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $general->site_name, $secret);
        $pageTitle = '2FA Setting';
        return view($this->activeTemplate . 'user.twofactor', compact('pageTitle', 'secret', 'qrCodeUrl'));
    }

    public function create2fa(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);
        $response = verifyG2fa($user, $request->code, $request->key);

        if ($response) {
            $user->tsc = $request->key;
            $user->ts = Status::ENABLE;
            $user->save();
            $notify[] = ['success', 'Google authenticator activated successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong verification code'];
            return back()->withNotify($notify);
        }
    }

    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user = auth()->user();
        $response = verifyG2fa($user, $request->code);

        if ($response) {
            $user->tsc = null;
            $user->ts = Status::DISABLE;
            $user->save();
            $notify[] = ['success', 'Two factor authenticator deactivated successfully'];
        } else {
            $notify[] = ['error', 'Wrong verification code'];
        }

        return back()->withNotify($notify);
    }

    public function transactions(Request $request)
    {
        $pageTitle = 'Transactions';
        $remarks = Transaction::distinct('remark')->orderBy('remark')->get('remark');
        $transactions = Transaction::where('user_id', auth()->id())->searchable(['trx'])->filter(['trx_type', 'remark'])->orderBy('id', 'desc')->paginate(getPaginate());

        return view($this->activeTemplate . 'user.transactions', compact('pageTitle', 'transactions', 'remarks'));
    }

    public function attachmentDownload($fileHash)
    {
        $filePath = decrypt($fileHash);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $general = gs();
        $title = slug($general->site_name) . '- attachments.' . $extension;
        $mimetype = mime_content_type($filePath);
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($filePath);
    }

    public function userData()
    {
        $user = auth()->user();

        if ($user->profile_complete == 1) {
            return to_route('user.home');
        }

        $pageTitle = 'User Data';
        return view($this->activeTemplate . 'user.user_data', compact('pageTitle', 'user'));
    }

    public function userDataSubmit(Request $request)
    {
        $user = auth()->user();

        if ($user->profile_complete == 1) {
            return to_route('user.home');
        }

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = [
            'country' => @$user->address->country,
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'city' => $request->city,
        ];
        $user->profile_complete = 1;
        $user->save();

        $notify[] = ['success', 'Registration process completed successfully'];
        return to_route('user.home')->withNotify($notify);
    }

    public function services()
    {
        $pageTitle = 'Services';
        $categories = Category::active()->whereHas('services', function ($services) {
            return $services->active();
        })->orderBy('name')->get();

        $whatsapp_link = GeneralSetting::where('id', 1)->first()->whatsapp_link;
        return view($this->activeTemplate . 'user.services.services', compact('pageTitle', 'categories', 'whatsapp_link'));
    }


    public function services2()
    {
        $pageTitle = 'Services';
        $categories = Category::active()->whereHas('services', function ($services) {
            return $services->active();
        })->orderBy('name')->get();

        $whatsapp_link = GeneralSetting::where('id', 1)->first()->whatsapp_link;
        return view($this->activeTemplate . 'user.services.servicess', compact('pageTitle', 'categories', 'whatsapp_link'));
    }

    public function serviceCategory($id)
    {
        $category = Category::active()->findOrFail($id);
        $pageTitle = $category->name;
        $services = Service::active()->where('category_id', $id)->paginate(getPaginate());
        return view($this->activeTemplate . 'user.services.category', compact('pageTitle', 'services'));
    }


    public function resolve_deposit(request $request)
    {

        $trx = $request->order_id;
        $session_id = $request->session_id;

        $verify = verify_trx($trx, $session_id);

        $status = $verify[0]['status'];
        $amount = $verify[0]['amount'];


        $trx = Deposit::where('trx', $request->trx)->first()->status ?? null;
        if ($trx == null) {

            $message = Auth::user()->email . "is trying to reslove a deleted transaction on PALASH SMM";
            send_notification($message);

            $message = Auth::user()->email . "is trying to reslove a deleted transaction on PALASH SMM";
            send_notification2($message);
            send_notification3($message);


            return back()->with('error', "Transaction has been deleted");

        }


        $chk = Deposit::where('trx', $request->trx)->first()->status ?? null;

        if ($chk == 2 || $chk == 4) {

            $message = Auth::user()->email . "is trying to steal hits the endpoint twice on Palash SMM";
            send_notification($message);


            $message = Auth::user()->email . "is trying to steal hits the endpoint twice on  Palash SMM";
            send_notification2($message);
            send_notification3($message);


            return back()->with('error', "Error Occured");


        }

        if ($status == 'success') {

            User::where('id', Auth::id())->increment('balance', $amount);
            Deposit::where('trx', $request->trx)->update(['status' => 1]);

            $ref = "PLA-" . random_int(000, 999) . date('ymdhis');

            $data = new Deposit();
            $data->user_id = Auth::id();
            $data->method_code = 102;
            $data->method_currency = "NGN";
            $data->amount = $request->amount;
            $data->charge = 0;
            $data->rate = 0;
            $data->final_amo = $request->amount;
            $data->btc_amo = 0;
            $data->btc_wallet = "";
            $data->trx = $ref;
            $data->status = 5;


            $message = Auth::user()->email . "| just resolved with $request->session_id | NGN " . number_format($amount) . " on PALASH SMM";
            send_notification($message);


            $message = Auth::user()->email . "| just resolved with $request->session_id | NGN " . number_format($amount) . " on PALASH SMM";
            send_notification2($message);
            send_notification3($message);


            return back()->with('message', 'Wallet has been successfully funded');
        }

        if ($status == 'failed') {
            return back()->with('error', 'Transaction not found,  Please wait few minutes and try again with resolve deposit');
        }


        return back()->with('error', 'Transaction not found, Please wait few minutes and try again with resolve deposit');


    }


    public function session_resolve(request $request)
    {



        if ($request->bank_type == "providus") {


            $ref = $request->order_id;
            $session_id = $request->session_id;

            $resolve = session_resolve($ref, $session_id);

            $status = $resolve[0]['status'];
            $amount = $resolve[0]['amount'];
            $message = $resolve[0]['message'];



            $trx = Deposit::where('trx', $request->order_id)->first()->status ?? null;

            if ($trx == null) {

                $message = Auth::user()->email . "is trying to steal from deleted transaction";
                send_notification($message);
                send_notification3($message);

                return back()->with('error', "Transaction has been deleted");

            }


            $chk = Deposit::where('trx', $request->order_id)->first()->status ?? null;


            if ($chk == 1 || $chk == 4) {


                $message = Auth::user()->email . "is trying to steal hits the endpoint twice";
                send_notification($message);
                send_notification3($message);


                return back()->with('error', "Error Occured");


            }



            if ($status == true) {
                User::where('id', Auth::id())->increment('balance', $amount);
                Deposit::where('trx', $request->order_id)->update(['status' => 1]);

                $ref = "PLA-" . random_int(000, 999) . date('ymdhis');

                $data = new Deposit();
                $data->user_id = Auth::id();
                $data->method_code = 102;
                $data->method_currency = "NGN";
                $data->amount = $request->amount;
                $data->charge = 0;
                $data->rate = 0;
                $data->final_amo = $request->amount;
                $data->btc_amo = 0;
                $data->btc_wallet = "";
                $data->trx = $request->order_id;
                $data->status = 5;


                $message = Auth::user()->email . "| just resolved with $request->session_id | NGN " . number_format($amount) . " on PALASH";
                send_notification($message);

                return back()->with('message', "Transaction successfully Resolved, NGN $amount added to ur wallet");
            }


            if ($status == false) {
                return back()->with('error', "$message");
            }

        }

        if ($request->bank_type == "opay") {




            $ref = $request->order_id;
            $session_id = $request->session_id;




            $trx = Deposit::where('trx', $request->order_id)->first()->status ?? null;


            if ($trx == null) {

                $message = Auth::user()->email . "is trying to steal from deleted transaction";
                send_notification($message);
                send_notification3($message);

                return back()->with('error', "Transaction has been deleted");

            }


            $chk = Deposit::where('trx', $request->order_id)->first()->status ?? null;



            if ($chk == 1 || $chk == 4) {


                $message = Auth::user()->email . "is trying to steal hits the endpoint twice";
                send_notification($message);
                send_notification3($message);


                return back()->with('error', "Error Occured");


            }

            if($chk == 2){




                $resolve = session_resolve_others($ref, $session_id);

                $status = $resolve[0]['status'];
                $amount = $resolve[0]['amount'];
                $message = $resolve[0]['message'];


                if ($status == true) {
                    User::where('id', Auth::id())->increment('balance', $amount);
                    Deposit::where('trx', $request->order_id)->update(['status' => 1]);

                    $ref = "PLA-" . random_int(000, 999) . date('ymdhis');

                    $data = new Deposit();
                    $data->user_id = Auth::id();
                    $data->method_code = 102;
                    $data->method_currency = "NGN";
                    $data->amount = $request->amount;
                    $data->charge = 0;
                    $data->rate = 0;
                    $data->final_amo = $request->amount;
                    $data->btc_amo = 0;
                    $data->btc_wallet = "";
                    $data->trx = $request->order_id;
                    $data->status = 5;


                    $message = Auth::user()->email . "| just resolved with $request->session_id | NGN " . number_format($amount) . " on PALASH";
                    send_notification($message);

                    return back()->with('message', "Transaction successfully Resolved, NGN $amount added to ur wallet");
                }


                if ($status == false) {
                    return back()->with('error', "$message");
                }


            }






        }

        if ($request->bank_type == "palmpay") {


            $ref = $request->order_id;
            $session_id = $request->session_id;

            $resolve = session_resolve_others($ref, $session_id);

            $status = $resolve[0]['status'];
            $amount = $resolve[0]['amount'];
            $message = $resolve[0]['message'];


            $trx = Deposit::where('trx', $request->order_id)->first()->status ?? null;

            if ($trx == null) {

                $message = Auth::user()->email . "is trying to steal from deleted transaction";
                send_notification($message);
                send_notification3($message);

                return back()->with('error', "Transaction has been deleted");

            }


            $chk = Deposit::where('trx', $request->order_id)->first()->status ?? null;


            if ($chk == 1 || $chk == 4) {


                $message = Auth::user()->email . "is trying to steal hits the endpoint twice";
                send_notification($message);
                send_notification3($message);


                return back()->with('error', "Error Occured");


            }


            if ($status == true) {
                User::where('id', Auth::id())->increment('balance', $amount);
                Deposit::where('trx', $request->order_id)->update(['status' => 1]);

                $ref = "PLA-" . random_int(000, 999) . date('ymdhis');

                $data = new Deposit();
                $data->user_id = Auth::id();
                $data->method_code = 102;
                $data->method_currency = "NGN";
                $data->amount = $request->amount;
                $data->charge = 0;
                $data->rate = 0;
                $data->final_amo = $request->amount;
                $data->btc_amo = 0;
                $data->btc_wallet = "";
                $data->trx = $request->order_id;
                $data->status = 5;


                $message = Auth::user()->email . "| just resolved with $request->session_id | NGN " . number_format($amount) . " on PALASH";
                send_notification($message);

                return back()->with('message', "Transaction successfully Resolved, NGN $amount added to ur wallet");
            }


            if ($status == false) {
                return back()->with('error', "$message");
            }

        }

    }


}

<?php

namespace App\Console\Commands;

use App\Constants\Status;
use App\Lib\CurlRequest;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Order';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Order::where('status', Status::ORDER_PROCESSING)->with('provider')->where('api_provider_id', '!=', 0)->where('order_placed_to_api', 1)->get();
        foreach ($orders as $order) {
            $response = CurlRequest::curlPostContent($order->provider->api_url, [
                'key'    => $order->provider->api_key,
                'action' => "status",
                'order'  => $order->api_order_id,
            ]);
            $response = json_decode($response);

            $err = $response->error ?? null;

            $order->start_counter = $response->start_count;
            $order->remain        = $response->remains;

            if ($response->status == 'Completed') {
                $order->status = Status::ORDER_COMPLETED;
            }

            if ($response->status == 'Cancelled') {
                $order->status = Status::ORDER_CANCELLED;
            }

            if ($response->status == 'Refunded') {
                $order->status = Status::ORDER_REFUNDED;
            }

            $order->save();
        }
        Log::info('SUCCESS');
    }
}

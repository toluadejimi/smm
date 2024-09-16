<?php

namespace App\Jobs;

use App\Constants\Status;
use App\Lib\CurlRequest;
use App\Models\ApiProvider;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UpdateOrderStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @param Order $order
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = $this->order;
        $provider = ApiProvider::find(1); // Assuming you need the provider with ID 1

        if (!$provider) {
            Log::error('API provider not found.');
            return;
        }

        $response = CurlRequest::curlPostContent($provider->api_url, [
            'key' => $provider->api_key,
            'action' => "status",
            'order' => $order->api_order_id,
        ]);

        $response = json_decode($response);

        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('JSON decode error: ' . json_last_error_msg());
            return;
        }

        if (isset($response->error)) {
            Log::error('API response error: ' . $response->error);
            return;
        }

        $err = $response->error ?? null;

        $order->start_counter = $response->start_count;
        $order->remain = $response->remains;

        if ($response->status == 'Completed') {
            $order->status = Status::ORDER_COMPLETED;
        }

        if ($response->status == 'In progress') {
            $order->status = Status::ORDER_PROCESSING;
        }

        if ($response->status == 'Partial') {
            $order->status = Status::ORDER_PARTIAL;
        }

        if ($response->status == 'Cancelled') {
            $order->status = Status::ORDER_CANCELLED;
        }


        if ($response->status == 'Refunded') {
            $order->status = Status::ORDER_REFUNDED;
        }

        $order->save();

    }
}

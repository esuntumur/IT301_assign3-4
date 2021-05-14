<?php

namespace App\Console\Commands;

use App\Models\order;
use Illuminate\Console\Command;
use DateTime;
use App\Models\storage;
use Illuminate\Support\Facades\DB;

class dateSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Deleting outdated order";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = order::where("renting", 0)->get();
        foreach ($orders as $order) {
            $datetime1 = new DateTime($order['created_at']);
            $datetime2 = new \DateTime('NOW');

            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            if ($days >= 1 && $order['renting'] == 0) {
                DB::beginTransaction();
                try {
                    order::where("id", $order['id'])->delete();
                    $quantity = storage::where('shopId', $order->shopId)->where('contentId', $order->contentId)->first();
                    $quantityDiff = $quantity['quantity'] + $order->quantity;
                    storage::where('shopId', $order->shopId)->where('contentId', $order->contentId)->update(['quantity' => $quantityDiff]);
                    DB::commit();
                } catch (\Exception $e) {
                    return $e;
                    DB::rollBack();
                }
            }
        }
    }
}
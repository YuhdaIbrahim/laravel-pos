<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory(25)->create()->each(function ($order){
            $orderDetails = Order_detail::factory(rand(1,4))->make();
            $order->order_details()->saveMany($orderDetails);
        });
    }
}

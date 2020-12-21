<?php

namespace Database\Factories;

use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class Order_detailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order_detail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => rand(1,4),
            'id_product' => rand(1,25)
        ];
    }
}

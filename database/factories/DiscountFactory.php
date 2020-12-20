<?php

namespace Database\Factories;

use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DiscountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Discount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code_discount' => Str::random(5),
            'discount' => rand(1,100),
            'expires' => Carbon::instance($this->faker->dateTimeBetween('-1 months', '+1 months')),
            'active' => rand(0,1),
        ];
    }
}

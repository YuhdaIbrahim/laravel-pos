<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $suffix = [
            'potato',
            'pizza',
            'hamburger',
            'soup',
            'pasta',
            'noodles',
            'chicken',
            'wings'
        ];
        return [
            'name_product' => $this->faker->word . ' '.  Arr::random($suffix),
            'price' => rand(2, 40),
            'img_path' => 'img/test.png'
        ];
    }
}

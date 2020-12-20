<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(25)->create()->each(function ($category){
           $product = Product::factory(rand(3,6))->make();
           $category->products()->saveMany($product);
        });
    }
}

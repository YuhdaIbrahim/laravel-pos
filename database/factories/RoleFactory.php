<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_role' => $this->faker->firstName,
            'all' => rand(0,1),
            'home' => rand(0,1),
            'products' => rand(0,1),
            'orders' => rand(0,1),
            'employees' => rand(0,1),
        ];
    }
}

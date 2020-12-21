<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $suffix = [
            'admin',
            'karyawan',
            'manajer',
            'kasir'
        ];
        return [
            'jabatan' => Arr::random($suffix),
            'gaji' => rand(2000000,6000000)
        ];
    }
}

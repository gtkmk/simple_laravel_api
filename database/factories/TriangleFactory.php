<?php

namespace Database\Factories;

use App\Models\Triangle;
use Illuminate\Database\Eloquent\Factories\Factory;

class TriangleFactory extends Factory
{
    protected $model = Triangle::class;

    public function definition()
    {
        return [
            'base' => $this->faker->randomFloat(2, 0, 100),
            'height' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
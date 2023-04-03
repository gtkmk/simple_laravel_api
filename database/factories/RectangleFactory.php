<?php

namespace Database\Factories;

use App\Models\Rectangle;
use Illuminate\Database\Eloquent\Factories\Factory;

class RectangleFactory extends Factory
{    
    protected $model = Rectangle::class;

    public function definition()
    {
        return [
            'base' => $this->faker->randomFloat(2, 0, 100),
            'height' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}

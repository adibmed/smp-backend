<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph(3),
            'price'=>$this->faker->randomFloat(2, 1, 100),
            'image'=>$this->faker->imageUrl,
            'status'=>$this->faker->randomElement(['approved', 'hold'])
        ];
    }
}

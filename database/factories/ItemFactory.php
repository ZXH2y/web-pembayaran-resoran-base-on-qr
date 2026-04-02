<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(10000, 100000),
            'category_id' => $this->faker->numberBetween(1, 2), 
            'img' => fake()->randomElement(
                ['https://images.unsplash.com/photo-1569718212165-3a8278d5f624',
                 'https://plus.unsplash.com/premium_photo-1668143358351-b20146dbcc02',
                'https://images.unsplash.com/photo-1738681335816-8e0df0aa9824',
                 ]
               
            ),
            'is_active' => $this->faker->boolean(80), // 80% chance of being available
        ];
    }
}

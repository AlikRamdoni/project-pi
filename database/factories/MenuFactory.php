<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'image_url' => $this->faker->imageUrl(640, 480, 'food', true),
            'price' => $this->faker->numberBetween(1000, 100000),
            'category' => $this->faker->randomElement(['Food', 'Beverage']),
        ];
    }
}

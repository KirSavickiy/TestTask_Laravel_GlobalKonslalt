<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article' => $this->faker->unique()->regexify('[A-Za-z0-9]{8}'), // Генерируем уникальный артикул
            'name' => $this->faker->unique()->sentence(3), // Генерируем уникальное имя
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'data' => json_encode([
                'color' => $this->faker->safeColorName(),
                'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            ]),
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Получаем первого пользователя (или можно создать тестового пользователя)
        $user = User::first(); // Или $user = User::factory()->create(); для создания нового пользователя

        // Проверяем, есть ли пользователь в базе
        if ($user) {
            // Создаем тестовый продукт
            Product::create([
                'article' => 'ART123',
                'name' => 'Test Product 1',
                'status' => 'available', // Или 'unavailable'
                'data' => json_encode([
                    'color' => 'red',
                    'size' => 'M',
                ]),
                'user_id' => $user->id,
            ]);

            Product::create([
                'article' => 'ART124',
                'name' => 'Test Product 2',
                'status' => 'unavailable',
                'data' => json_encode([
                    'color' => 'blue',
                    'size' => 'L',
                ]),
                'user_id' => $user->id,
            ]);
        }
    }
}

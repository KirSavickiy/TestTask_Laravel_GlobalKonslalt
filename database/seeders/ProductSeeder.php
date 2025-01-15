<?php

namespace Database\Seeders;

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
        $user = User::first();

        if ($user) {
            Product::factory()->count(100)->create([
                'user_id' => $user->id,
            ]);
        } else {
            $this->command->error('No users found in the database. Please create a user first.');
        }
    }
}

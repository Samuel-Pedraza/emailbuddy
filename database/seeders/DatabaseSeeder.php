<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use LemonSqueezy\Laravel\Order;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // LemonSqueezy package factory has a bug,
        // For that reason forced to overwrite default values

        for ($i = 0; $i < 300; $i++) {
            try {
                Order::factory()->create([
                    'lemon_squeezy_id' => fake()->unique()->randomNumber(8),
                    'order_number' => fake()->unique()->randomNumber(8),
                    'customer_id' => fake()->unique()->randomNumber(8),
                    'product_id' => fake()->unique()->randomNumber(8),
                    'variant_id' => fake()->unique()->randomNumber(8),
                    'subtotal' => $subtotal = rand(40000, 100000),
                    'discount_total' => $discount = rand(1, 100),
                    'tax' => $tax = rand(1, 50),
                    'total' => $subtotal - $discount + $tax,
                    'billable_id' => User::factory()->create(),
                    'billable_type' => User::class,
                    'identifier' => fake()->unique()->uuid()
                ]);
            } catch (\Exception $exception) {
                continue;
            }
        }

        // \App\Models\User::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

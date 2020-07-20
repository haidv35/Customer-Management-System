<?php

namespace App\Seeds;

use Faker\Factory;
use App\Models\Transaction;

class TransactionSeeder
{
    public function index()
    {
        for ($i = 0; $i < 100; $i++) {
            $faker = Factory::create();
            $c = new Transaction();
            $c->create(
                [
                    'price' => '3000000',
                    'quantity' => $faker->numberBetween(1, 20),
                    'created_at' => $faker->dateTimeBetween('-6 months', '+5 months', 'Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s'),
                    'product_id' => $faker->numberBetween(1, 8),
                    'user_id' => $faker->numberBetween(1, 101),
                ]
            );
        }
        echo "success";
    }
}

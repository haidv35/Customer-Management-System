<?php

namespace App\Seeds;

use Faker\Factory;
use App\Models\Customer;

class CustomerSeeder
{
    public function index()
    {
        for ($i = 0; $i < 100; $i++) {
            $faker = Factory::create();
            $c = new Customer();
            $c->create(
                [
                    'username' => $faker->username,
                    'password' => hash('sha256', $faker->password),
                    'firstname' => $faker->firstName,
                    'lastname' => $faker->lastName,
                    'dob' => $faker->dateTimeThisMonth('now')->format('Y-m-d'),
                    'email' => $faker->email,
                    'phone' => $faker->numberBetween(0000000000, 9999999999),
                    'address' => "số 10, Nguyễn Trãi, Hà Nội",
                    'created_at' => $faker->dateTimeThisMonth('now')->format('Y-m-d H:i:s'),
                    'role_id' => 2
                ]
            );
        }
        echo "success";
    }
}

<?php

namespace App\Seeds;

use Faker\Factory;
use App\Models\Product;

class ProductSeeder
{
    public function index()
    {
        for ($i = 0; $i < 100; $i++) {
            $faker = Factory::create();
            $c = new Product();
            $c->create(
                [
                    'type' => 'quần',
                    'name' => $faker->lexify('Quần ?????'),
                    'price' => '300000',
                    'des' => '',
                ]
            );
        }
        for ($i = 0; $i < 100; $i++) {
            $faker = Factory::create();
            $c = new Product();
            $c->create(
                [
                    'type' => 'áo',
                    'name' => $faker->lexify('Áo ?????'),
                    'price' => '300000',
                    'des' => ''
                ]
            );
        }
        echo "success";
    }
}

<?php

use Faker\Generator as Faker;
use App\Entities\Costumer;
use App\Entities\Product;
use App\Entities\Sale;

$factory->define(Costumer::class, function (Faker $faker) {
    return [
        'name' =>  $faker->text(40)
    ];
});


$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' =>  $faker->text(40),
        'price' =>  $faker->randomFloat(2,10,1000),
        'description' => $this->faker->boolean(70) ? $faker->text($faker->numberBetween(10, 100)) : null
    ];
});

$factory->define(Sale::class, function (Faker $faker) {

    $product = Product::inRandomOrder()->limit(1)->first();
    $amount= $faker->numberBetween(1, 100);
    $date = $faker->dateTimeThisMonth();
    return [
        'status' =>  $this->faker->boolean(80) ? 0 : $faker->numberBetween(1, 2),
        'product_id' => $product,
        'price'=> $product->price,
        'amount'=> $amount,
        'discount' => $amount * $faker->numberBetween(1, 30)/100,
        'costumer_id' => Costumer::inRandomOrder()->limit(1)->first(),
        'date' => $date,
        'created_at' => $date,
        'updated_at' => $date
    ];
});


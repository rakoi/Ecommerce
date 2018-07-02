<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
       
        'first_name'=>'Brian ',
        'last_name'=>'Rakoi',
        'email' => 'brianrakoi@gmail.com',
        'phone_number'=>'0702164611',
        'password' => '$2y$10$1ePL7HHxbnLVNGn7XspMQukcl9eR409ykL59QCxamWBDGNyuyV50O', // secret
        'remember_token' => str_random(10),
        'admin'=>'1',
    ];
});
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(2),
        'size'=>'small',
        'image' => '1435274686438-P-2777267.jpg2018-05-20 14:12:23.jpg',
        'category_id'=>rand(1,5),
        'quantity'=>rand(1,5),
        'price'=>rand(1000,1599)

    ];
});
$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        
    ];
});
$factory->define(App\orders::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->email,
        'phone' =>'07227484820',
        'amount' =>'1899',
        'product_id' => rand(1,10),
    ];
});
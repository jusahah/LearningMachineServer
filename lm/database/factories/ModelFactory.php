<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'user_id' => 1,
        'parent_id' => null
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'user_id' => 1,
    ];
});

$num = 1;
$factory->define(App\Question::class, function (Faker\Generator $faker) use (&$num) {
    return [
    	'user_id' => rand(1,2),
        'question' => ($num++) . 'question',
        'item_id'  => rand(1,2),
        'answer' => $faker->name
    ];
});

$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    return [
        'question_id' => rand(1,12),
        'correct' => rand(1,2) == 1,
        'answergiven' => $faker->paragraph
    ];
});
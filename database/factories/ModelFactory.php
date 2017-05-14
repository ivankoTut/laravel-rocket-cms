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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    static $email;

    return [
        'name' => $faker->name,
        'email' => $email ?: $email = $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\CmsModels\TypePage::class, function (Faker\Generator $faker) {
    return [
        'name' => 'main',
    ];
});

$factory->define(\App\Models\CmsModels\Page::class, function (Faker\Generator $faker) {
    $name = $faker->jobTitle;
    $typePage = \App\Models\CmsModels\TypePage::first();
    return [
        'title'  => $name,
        'slug' => str_slug($name),
        'text' => $faker->realText(500,3),
        'type_page_id' => $typePage->id,
    ];
});

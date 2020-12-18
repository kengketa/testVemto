<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;

use App\Models\Role;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence(15),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;

use App\Models\Permission;

$factory->define(Permission::class, function (Faker $faker) {
    return [
        'slug' => $faker->slug,
        'description' => $faker->sentence(15),
        'enable' => $faker->boolean,
        'role_id' => factory(App\Models\Role::class),
    ];
});

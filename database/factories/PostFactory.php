<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(5),
        'content'=>$faker->paragraph(2),
        'create_by'=>\App\User::inRandomOrder()->first()->id
    ];
});

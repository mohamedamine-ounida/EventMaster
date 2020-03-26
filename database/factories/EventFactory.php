<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'user_id'=>rand(1,100),
        'titre'=>$faker->sentence(rand(2,6)),
        'brief'=>$faker->sentence(rand(2,6)),
        'content'=>$faker->text(100),
        'date'=>$faker->dateTimeBetween('35','now'),
        'country'=>$faker->country,
        'city'=>$faker->city,
        'speaker'=>$faker->name,
    ];
});

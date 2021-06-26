<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    $title=$faker->sentence;
    return [
        'title'=>$title,
        'slug'=>$title,
        'body'=>$faker->text,
        'category_id'=>function(){
            return \App\Model\Category::all()->random();
        },
        'user_id'=>function(){
        return \App\User::all()->random();
        }
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(App\Education::class, function (Faker $faker) {
    return [
	  	'institute_id' => App\Institute::inRandomOrder()->first()->id,
    	'course_id' => App\Course::inRandomOrder()->first()->id,
  		'degree_id' => App\Degree::inRandomOrder()->first()->id,
    	'start_at' => $faker->dateTime,
    	'end_at' => $faker->dateTime,
    	'is_active' => $faker->numberBetween(0, 1)
    ];
});

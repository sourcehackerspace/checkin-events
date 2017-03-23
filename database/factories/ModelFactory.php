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

    return [
        'name' => "Administrador general",
        'email' => "admin@bluebeanmx.com",
        'password' => $password ?: $password = bcrypt('Bluebean-19'),
        'type' => 'admin',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Course::class, function (Faker\Generator $faker){
	static $busy = 0;
	return [
		'title' => $faker->sentence(3, true),
		'subtitle' => $faker->sentence(2, true),
		'description' => $faker->paragraph(6, true),
		'address' => $faker->address,
		'date' => $faker->date('Y-m-d', 'now'),
		'time' => $faker->time('H:i:s', 'now'),
		'image' => $faker->imageUrl(640, 480),
		'quota' => 15,
		'busy' => $busy = $faker->numberBetween(0, 15),
		'remaining' => 15 - $busy,
	];
});

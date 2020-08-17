<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estado;
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
$factory->define(Estado::class, function (Faker $faker) {
	return [
		"nombre" => $faker->word,
	];
});
/*$factory->define(Pedido::class, function (Faker $faker) {
return [
'cliente_id' => $faker->numberBetween(1, 10),
'total_pedido' => $faker->numberBetween(1000, 50000),
'estado_id' => $faker->numberBetween(1, 5),
];
});*/

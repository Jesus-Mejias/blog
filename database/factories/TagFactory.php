<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
  // (\:

    $title = $faker->unique()->word(5); // ]: Crea titulos de 5 caracteres

    // \~> Define estructura de la tabla 
    return [
        'name' => $title,			// ]: Establece el titulo de categoria
        'slug' => str_slug($title),	// ]: Convierte titulo a slug
    ];
    // ]>~
});

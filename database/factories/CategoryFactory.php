<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    // (\:

    $title = $faker->sentence(4); // ]: Crea titulos de 4 palabras

    // \~> Define estructura de la tabla 
    return [
        'name' => $title,			// ]: Establece el titulo de categoria
        'slug' => str_slug($title),	// ]: Convierte titulo a slug
        'body' => $faker->text(500),// ]: Genera texto aleatorio
    ];
    // ]>~
});

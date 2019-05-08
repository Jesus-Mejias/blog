<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    // (|:

    $title = $faker->sentence(4); // ]: Crea titulos de 4 palabras

    // |~> Define estructura de la tabla 
    return [
    	'user_id' => rand(1, 30),		// ]: Crea id's de usuarios
    	'category_id' => rand(1, 20),	// ]: Crea id's de categorias
        'name' => $title,				// ]: Establece el titulo de categoria
        'slug' => str_slug($title),		// ]: Convierte titulo a slug
        'excerp' => $faker->text(200),	// ]: Genera texto aleatorio
        'body' => $faker->text(500),	// ]: Genera texto aleatorio
        // ]: Genera URL's para imagenes
        'file' => $faker->imageUrl($width = 1200, $heigth = 400),
        // ]: Genera de manera aleatoria el estado de los post
        'status' => $faker->randomElement(['DRAFT', 'PUBLISHED']),
    ];
    // ]>~
});

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ]: Ruta de redireccion 
Route::redirect('/', 'blog');

Auth::routes();

// |~> Cliente Web
// ]: Ruta para la pagina de posts
Route::get('blog', 'Web\PageController@blog')->name('blog');
// ]: Ruta para el detalle de cada post
Route::get('entrada/{slug}', 'Web\PageController@post')->name('post');
// ]: Ruta para la categoria 
Route::get('categoria/{slug}', 'Web\PageController@category')->name('category');
// ]: Ruta para la etiqueta 
Route::get('etiqueta/{slug}', 'Web\PageController@ptag')->name('tag'); 

// |~> Administrador
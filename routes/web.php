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

Route::get('blog', 'Web\PageController@blog')->name('blog');

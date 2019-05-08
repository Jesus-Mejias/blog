<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;

class PageController extends Controller
{
    // |~> Metodo para la vista principal del blog
    public function blog()
    {

    	// ]: Retorna listado de posts
    	$posts = Post::orderBy('id', 'DESC')
    		->where('status', 'PUBLISHED')
    		->paginate(3);

    	return view('web.posts', compact('posts'));
    }

    // |~> Filtra post por categoria
    public function category($slug)
    {
    	// ]: Retorna el id de la categoria
    	$category = Category::where('slug', $slug)
    		->pluck('id')
    		->first();

    	// ]: Devuelve posts por categoria
    	$posts = Post::where('category_id', $category)
    		->where('status', 'PUBLISHED')
    		->orderBy('id', 'DESC')
    		->paginate(3);

    	return view('web.posts', compact('posts'));
    }

    // |~> Filtra post por etiqueta
    public function tag($slug)
    {
    	// ]: Devuelve posts por tags
    	$posts = Post::whereHas('tags', function ($query) use($slug)
    	{
    		$query->where('slug', $slug);	
    	})
    	->where('status', 'PUBLISHED')
    	->orderBy('id', 'DESC')
    	->paginate(3);

    	return view('web.posts', compact('posts'));
    }

    // |~> Metodo para la vista del post
    public function post($slug)
    {
    	
    	// ]: Retorna el poste que se esta seleccionando
    	$post = Post::where('slug', $slug)->first();

    	return view('web.post', compact('post'));
    }


}

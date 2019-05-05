<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;

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

    // |~> Metodo para la vista del post
    public function post($slug)
    {
    	
    	// ]: Retorna el poste que se esta seleccionando
    	$post = Post::where('slug', $slug)->first();

    	return view('web.post', compact('post'));
    }
}

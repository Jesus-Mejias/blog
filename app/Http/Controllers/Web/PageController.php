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

    	return view('web.post', compact('posts'));
    }
}

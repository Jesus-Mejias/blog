<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
    * |~> Metodo constructor que evalua
    * la autenticacion del usuario.
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ]: Retorna los post de cada autor
        $posts = Post::orderBy('id', 'DESC')
            ->where('user_id', auth()->user()->id)
            ->paginate();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // ]: Consulta las categorias
        $categories = Category::orderBy('name', 'ASC')
            ->pluck('name', 'id');

        // ]: Consulta las etiquetas
        $tags = Tag::orderBy('name', 'ASC')->get();

        // ]: Retorna el formulario para crear posts
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        // ]: Guarda el post en la base de datos
        $post = Post::create($request->all());

        // ]: Redirecciona a la ruta de editar
        return redirect()->route('posts.edit', $post->id)
            ->with('info', 'Entrada creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ]: Muestra en detalle un post
        $post = Post::find($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // ]: Consulta las categorias
        $categories = Category::orderBy('name', 'ASC')
            ->pluck('name', 'id');

        // ]: Consulta las etiquetas
        $tags = Tag::orderBy('name', 'ASC')->get();

        // ]: Busca el post que se va a editar
        $post = Post::find($id);

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        // ]: Actualiza el post que se esta editando
        $post = Post::find($id);

        $post->fill($request->all())->save();

        return redirect()->route('posts.edit', $post->id)
            ->with('info', 'Entrada actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ]: Elimina un post
        $post = Post::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}

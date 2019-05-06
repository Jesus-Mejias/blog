<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Request\TagStoreRequest;
use App\Http\Request\TagUpdateRequest;
use App\Http\Controllers\Controller;

use App\Tag;

class TagController extends Controller
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
        // ]: Retorna todas las etiquetas
        $tags = Tag::orderBy('id', 'DESC')->paginate();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ]: Retorna el formulario para crear etiquetas
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        // ]: Guarda la etiqueta en la base de datos
        $tag = Tag::create($request->all());

        // ]: Redirecciona a la ruta de editar
        return redirect()->route('tags.edit', $tag->id)
            ->with('info', 'Etiqueta creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ]: Muestra en detalle una etiqueta
        $tag = Tag::find($id);

        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // ]: Busca la etiqueta que se va a editar
        $tag = Tag::find($id);

        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
        // ]: Actualiza la etiqueta que se esta editando
        $tag = Tag::find($id);

        $tag->fill($request->all())->save();

        return redirect()->route('tags.edit', $tag->id)
            ->with('info', 'Etiqueta actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ]: Elimina una etiqueta
        $tag = Tag::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}

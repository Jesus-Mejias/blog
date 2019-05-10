<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
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
        $categories = Category::orderBy('id', 'DESC')->paginate();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ]: Retorna el formulario para crear etiquetas
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        // ]: Guarda la etiqueta en la base de datos
        $category = Category::create($request->all());

        // ]: Redirecciona a la ruta de editar
        return redirect()->route('categories.edit', $category->id)
            ->with('info', 'Categoría creada con exito');
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
        $category = Category::find($id);

        return view('admin.categories.show', compact('category'));
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
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        // ]: Actualiza la etiqueta que se esta editando
        $category = Category::find($id);

        $category->fill($request->all())->save();

        return redirect()->route('categories.edit', $category->id)
            ->with('info', 'Categoría actualizada con exito');
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
        $category = Category::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}

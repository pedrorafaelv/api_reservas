<?php

namespace App\Http\Controllers;
// use  App\Http\Requests\Recurso\StoreRequest;

use App\Http\Requests\TipoRecurso\StoreRequest;
use App\Http\Requests\TipoRecurso\PutRequest;
use App\Models\TipoRecurso;
class TipoRecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiporecursos= TipoRecurso::paginate(8);
        return view('tipoRecurso.index', compact('tiporecursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoRecurso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $tiporecurso = new TipoRecurso();
        $tiporecurso->fill($request->all());
        $exito = $tiporecurso->save();
        if (!$exito) {

        }
        return redirect()->route('tiporecurso.index')->with('status', 'Tipo de Recurso creado correctamente.');

        // return redirect('tipoRecurso.show', compact('tiporecurso'));

    // Si no se pudo guardar la empresa, redireccionar con un mensaje de error
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoRecurso $tiporecurso
     * @return \Illuminate\Http\Response
     */
    public function show(TipoRecurso $tiporecurso)
    {
        return view('tipoRecurso.show', compact('tiporecurso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoRecurso $tiporecurso
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoRecurso $tiporecurso)
    {
        return view('tipoRecurso.edit', compact('tiporecurso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoRecurso $tiporecurso
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, TipoRecurso $tiporecurso)
    {
        $tiporecurso->update();
        return redirect()->route('tiporecurso.show', ['tiporecurso' => $tiporecurso])->whit('status', 'Tipo de recurso actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoRecurso $tiporecurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoRecurso $tiporecurso)
    {
        $tiporecurso->delete();
        return redirect()->route('tiporecurso.index')->with('status', 'Tipo de Recurso eliminado exitosamente');
    }

}

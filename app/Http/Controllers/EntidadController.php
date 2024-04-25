<?php

namespace App\Http\Controllers;

use App\Http\Requests\Entidad\StoreRequest;
use App\Http\Requests\Entidad\PutRequest;
use App\Models\Entidad;

class EntidadController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entidads= Entidad::paginate();
        return view('entidad.index', compact('entidads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $entidad = new Entidad();
        $entidad->fill($request->all());
        $exito = $entidad->save();
        if (!$exito) {

        }
        // $request->session()->flash('status', 'Entidad creado correctamente');
        return redirect()->route('entidad.index')->with('status', 'Entidad creada correctamente.');

    // Si no se pudo guardar la empresa, redireccionar con un mensaje de error
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entidad $entidad
     * @return \Illuminate\Http\Response
     */
    public function show(Entidad $entidad)
    {
        return view('entidad.show', compact('entidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entidad $entidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Entidad $entidad)
    {
        return view('entidad.edit', compact('entidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entidad $entidad
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Entidad $entidad)
    {
        // dd($request->validated());
        $entidad->update($request->validated());
        $request->session()->flash('status', 'Entidad actualizada exitosamente');
        return redirect()->route('entidad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entidad $entidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entidad $entidad)
    {
        $entidad->delete();
        return redirect()->route('entidad.index')->with('status', 'Entidad eliminada');
    }
}

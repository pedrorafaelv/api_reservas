<?php

namespace App\Http\Controllers;
use  App\Http\Requests\Estado\PutRequest;
use  App\Http\Requests\Estado\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Estado;
class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::paginate(4);
        return view('estado.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('estado.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $estado = new Estado();
        $estado->fill($request->all());
        $exito = $estado->save();
        if (!$exito) {
            // Si no se pudo guardar la empresa, redireccionar con un mensaje de error
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Estado \App\Models\Estado $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        return view('estado.show', compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        return view('estado.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  estado  App\Models\Estado
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Estado $estado)
    {
        $estado->update($request->validated());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  estado  App\Models\Estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        $estado->delete();
    }
}

<?php

namespace App\Http\Controllers;
use  App\Http\Requests\Estado\PutRequest;
use  App\Http\Requests\Estado\StoreRequest;
use App\Models\Estado;
use App\Models\Entidad;
class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::paginate(8);
        return view('estado.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entidads = Entidad::pluck('nombre', 'id')->toArray();

        // $entidads = Entidad::all();
        return view('estado.create', compact('entidads'));
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
        $request->session()->flash('status', 'Estado creado correctamente');
        return redirect()->route('estado.show', ['estado'=>$estado]);
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
        $entidads = Entidad::pluck('nombre', 'id')->toArray();
        return view('estado.edit', compact('estado', 'entidads'));
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
        $request->session()->flash('status', 'Estado actualizado exitosamente');
        return redirect()->route('estado.show', [ 'estado'=> $estado]);

    }

    /**
     * Remove the specified resource from storage.
     * @param  estado  App\Models\Estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        $estado->delete();
        return redirect()->route('estado.index')->with('status', 'Estado eliminado exitosamente');
    }
}

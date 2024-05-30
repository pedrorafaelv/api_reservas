<?php

namespace App\Http\Controllers;
use  App\Http\Requests\Estado\PutRequest;
use  App\Http\Requests\Estado\StoreRequest;
use App\Models\Estado;
use App\Models\Entidad;
use App\Models\TipoRecurso;
use TipoRecursos;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiporecursos = TipoRecurso::pluck('nombre', 'id')->toArray();
        $estados = Estado::paginate(8);
        return view('estado.index', compact('estados', 'tiporecursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiporecursos = TipoRecurso::pluck('nombre', 'id')->toArray();

        // $entidads = Entidad::all();
        return view('estado.create', compact('tiporecursos'));
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
        print_r($request['nombre']);
         $exito = $estado->save();
         if (!$exito) {
            // Si no se pudo guardar la empresa, redireccionar con un mensaje de error
         }
         return redirect()->route('estado.show', ['estado'=>$estado])->with('status', 'Estado creado correctamente');
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
        // $entidads = Entidad::pluck('nombre', 'id')->toArray();
        $tiporecursos = TipoRecurso::pluck('nombre', 'id')->toArray();

        return view('estado.edit', compact('estado', 'tiporecursos'));
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
        //print_r($request->validated());
        return redirect()->route('estado.show', [ 'estado'=> $estado])->with('status', 'Estado actualizado exitosamente');

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

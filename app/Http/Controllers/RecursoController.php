<?php

namespace App\Http\Controllers;
use  App\Http\Requests\Recurso\PutRequest;
use  App\Http\Requests\Recurso\StoreRequest;
use App\Models\Recurso;
use App\Models\Empresa;
use App\Models\TipoRecurso;
use App\Models\Estado;
class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $empresas = Empresa::pluck('nombre', 'id')->toArray();
        // $estados = Estado::pluck('nombre', 'id')->toArray();
        // $tiporecursos = TipoRecurso::pluck('nombre', 'id')->toArray();
        $recursos= Recurso::paginate(4);
        return view('recurso.index', compact('recursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::pluck('nombre', 'id')->toArray();
        $estados = Estado::pluck('nombre', 'id')->toArray();
        $tiporecursos = TipoRecurso::pluck('nombre', 'id')->toArray();
        return view('recurso.create', compact('empresas','tiporecursos', 'estados' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // dd($request->all());
        $recurso = new Recurso();
        $recurso->fill($request->all());
        $exito = $recurso->save();
        if (!$exito) {
            return false;
            // Si no se pudo guardar la empresa, redireccionar con un mensaje de error
        }
        $request->session()->flash('status', 'Recurso creado exitosamente');
        return redirect('recurso.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Recurso App\Models\Recurso
     * @return \Illuminate\Http\Response
     */
    public function show(Recurso $recurso)
    {
        // $empresas = Empresa::pluck('nombre', 'id')->toArray();
        // $estados = Estado::pluck('nombre', 'id')->toArray();
        // $tiporecursos = TipoRecurso::pluck('nombre', 'id')->toArray();
        return view('recurso.show', compact('recurso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function edit(Recurso $recurso)
    {
        //  dd($recurso);
        $empresas = Empresa::pluck('nombre', 'id')->toArray();
        $estados = Estado::pluck('nombre', 'id')->toArray();
        $tiporecursos = TipoRecurso::pluck('nombre', 'id')->toArray();
        return view('recurso.edit', compact('empresas','tiporecursos', 'estados', 'recurso' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Recurso $recurso)
    {
        $recurso->update($request->validated());
        $request->session()->flash('status', 'Recurso actualizado exitosamente');
        return redirect('recurso.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recurso $recurso)
    {
        $recurso->delete();
        return redirect('recurso.index')->with('status', 'Recurso eliminado exitosamente');
    }
}

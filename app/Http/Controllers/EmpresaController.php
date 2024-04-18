<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\Empresa\StoreRequest;
use  App\Http\Requests\Empresa\PutRequest;
use Illuminate\Http\Response;
use Validator;
use App\Models\Empresa;
use App\Models\Industria;

use debugbar;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industrias = Industria::pluck('nombre', 'id')->toArray();
        $empresas = Empresa::paginate(4);
        return view('empresa.index', compact('empresas', 'industrias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $industrias = Industria::pluck('nombre', 'id')->toArray();
        return view('empresa.create', compact('industrias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        // Crear una nueva empresa
        // dd($request);
        $empresa = new Empresa();
        $empresa->fill($request->all());
        $exito = $empresa->save();
        if (!$exito) {
            // Si no se pudo guardar la empresa, redireccionar con un mensaje de error
        }
        //  return redirect()->route('empresas.show')->with('success', 'Empresa creada correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $industrias = Industria::pluck('nombre', 'id')->toArray();
        return view('empresa.show', compact('industrias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        $industrias = Industria::pluck('nombre', 'id')->toArray();
        return view('empresa.edit', compact('industrias','empresa' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Empresa $empresa)
    {
        $empresa->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
    }
}

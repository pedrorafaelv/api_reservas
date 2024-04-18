<?php

namespace App\Http\Controllers;
use App\Models\Industria;
use Illuminate\Http\Request;

use App\Http\Requests\Industria\StoreRequest;
use App\Http\Requests\Industria\PutRequest;
class IndustriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industrias = Industria::paginate(4);
        return view('industria.index', compact('industrias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('industria.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        $industria = new Industria();
        $industria->fill($request->all());
        $exito = $industria->save();
        if (!$exito) {
            // Si no se pudo guardar la empresa, redireccionar con un mensaje de error
        }
        //  return
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Industria $industria)
    {
        return view('industria.show', compact('industria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Industria $industria)
    {
        //   dd( $industria);
         $industria = Industria::find($industria->id);
        // return view('industria.edit', compact('industria'));
        return view('industria.edit', compact('industria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Industria
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Industria $industria)
    {
        $industria->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Industria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industria $industria)
    {
        $industria->delete();
    }
}

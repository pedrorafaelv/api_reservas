<?php

namespace App\Http\Controllers;
use App\Models\Industria;
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
        $industrium = new Industria();
        $industrium->fill($request->all());
        $exito = $industrium->save();
        if (!$exito) {
            // return redirect('industria.show')->with('industria', $industria);
        }
        $request->session()->flash('status', 'Industria creada correctamente');
        return view('industria.show',compact ('industrium'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Industria \App\Models\Industria
     * @return \Illuminate\Http\Response
     */
    public function show(Industria $industrium)
    {
        //  dd($industrium);
        return view('industria.show', compact('industrium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Industria $industrium)
    {
        //   dd( $industrium);
         $industria = Industria::find($industrium->id);
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
        public function update(PutRequest $request, Industria $industrium)
        {
            $industrium->update($request->validated());
            $request->session()->flash('status', 'Industria actualizada con éxito');
         return redirect()->route('industria.show', ['industrium'=> $industrium]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  App\Models\Industria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industria $industrium)
    {
        //  dd($industrium);
        $industrium->delete();
        return redirect('industria.index')->with('status', 'Industria eliminada con éxito');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Reserva;
use App\Models\Recurso;
use App\Models\Empresa;
use App\Models\Cliente;
use App\Models\estado;
use App\Http\Requests\Reserva\PutRequest;
use App\Http\Requests\Reserva\StoreRequest;
use Carbon\Carbon;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::pluck('nombre', 'id')->toArray();
        $estados = Estado::pluck('nombre', 'id')->toArray();
        $recursos = Recurso::pluck('nombre', 'id')->toArray();
        $clientes = Cliente::pluck('nombre', 'id')->toArray();
        $reservas = Reserva::paginate(10);
        return view('reserva.index', compact('reservas', 'empresas', 'estados','recursos', 'clientes'));
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
        $recursos = Recurso::pluck('nombre', 'id')->toArray();
        $clientes = Cliente::pluck('nombre', 'id')->toArray();
        return view('reserva.create', compact('empresas', 'estados', 'recursos', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // Validar los datos del formulario
        // Crear una nueva reserva
        $reserva = new Reserva();
        $reserva->fill($request->all());
        $exito = $reserva->save();
        if (!$exito){
              return false;
        }
        return redirect()->route('reserva.index')->with('status', 'Reserva creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        return view('reserva.show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        // dd($reserva);
        $empresas = Empresa::pluck('nombre', 'id')->toArray();
        $estados = Estado::pluck('nombre', 'id')->toArray();
        $recursos = Recurso::pluck('nombre', 'id')->toArray();
        $clientes = Cliente::pluck('nombre', 'id')->toArray();
        $reserve = new Reserva();
        $reserve->fecha_inicio = Carbon::parse($reserva->feha_inicio);
        return view('reserva.edit', compact('empresas','estados','recursos','clientes','reserva', 'reserve'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Reserva $reserva)
    {
        //  return route('reserva.create');
        $empresas = Empresa::pluck('nombre', 'id')->toArray();
        $estados = Estado::pluck('nombre', 'id')->toArray();
        $recursos = Recurso::pluck('nombre', 'id')->toArray();
        $clientes = Cliente::pluck('nombre', 'id')->toArray();
        $reserva->update($request->validated());
        $request->session()->flash('status', 'Reserva actualizada exitosamente');
        return redirect()->route('reserva.show', ['empresas' => $empresas, 'estados'=>$estados,'recursos'=>$recursos ,'clientes'=>$clientes,'reserva'=>$reserva]);

        // return redirect('reserva.show', 'reserva');
        //  return redirect()->route('reserva.create')
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reserva.index')->with('status', 'Reserva eliminada exitosamente');

    }
}

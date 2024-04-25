<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\Cliente\StoreRequest;
use  App\Http\Requests\Cliente\PutRequest;
use App\Models\Cliente;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(8);
        return  view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // Crear una nueva cliente
        $cliente = new Cliente();
        $cliente->fill($request->all());
        $exito = $cliente->save();
        if (!$exito) {
            // Si no se pudo guardar la cliente, redireccionar con un mensaje de error
        }
        return redirect()->route('cliente.index')->with('status', 'Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Cliente $cliente)
    {
        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        // dd($cliente);
        return view('cliente.edit',compact('cliente'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  App\Models\Cliente
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());
        $request->session()->flash('status', 'Cliente actualizado exitosamente');
        return redirect()->route('cliente.show', ['cliente'=> $cliente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        // dd($cliente);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('status', 'Cliente eliminado correctamente.');
        ;
    }
}

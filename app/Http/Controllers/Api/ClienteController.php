<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Http\Response;
use Validator;


class ClienteController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes=Cliente::all();
        if (!$clientes->isEmpty()) {
            return response()->json(['message'=>'clientes','clientes'=>$clientes], 200);
        }
        return response()->json(['Error'=>'No hay clientes'],404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'nombre' => 'required|min:4',
            'telefono' => 'required|min:8',
            'email' => 'required|email|unique:clientes,email',
        ];
        $messages=[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'=>'el nombre debe ser minimo :min caracateres',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.min'=>'El telefono minimo debe ser :min numeros',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'El correo electronico ya esta en uso.',
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);

        // Crear un nuevo Tipo de recurso
        if (!$validator->fails()){
                $nuevoCliente =new Cliente();
                $nuevoCliente->fill($request->route()->parameters);
                $res =$nuevoCliente->save();
                if ($res){
                    return response()->json(['message'=>'El cliente se ha creado correctamente', 'cliente'=>$nuevoCliente],201);
                }
                return response()->json(['Error'=>'El cliente No se ha creado'],500);
        }
        return response()->json(['Error'=>'Nose puedo crear el nuevo cliente', 'errors'=>$validator->errors()],409);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cliente = Cliente::find($id);
        if(is_object($cliente)){

            return response()->json(['message'=>'Cliente', 'cliente'=>$cliente], 200);
        }
         return response( )->json(['Error'=>'No existe la cliente'], 404);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'nombre' => 'required|min:4',
            'telefono' => 'required|min:8',
        ];
        $messages=[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'=>'el nombre debe ser minimo :min caracateres',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.min'=>'El telefono minimo debe ser :min numeros',
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);

        $cliente = Cliente::find($id);
        if  ($cliente){
            if(!$validator->fails()){
                $cliente->nombre= $request->nombre;
                $cliente->telefono= $request->telefono;
                $res = $cliente->save();
                if ($res){
                    return response()->json(['message'=>'cliente actualizado con exito ', 'cliente'=> $cliente ], 200);
                }
                return response()->json(['Error'=>'No se pudo actualizar el registro'], 401);
            }
            return response()->json(['Error'=>'No se puedoe actualizar el registro', 'errors'=>$validator->errors()], 409);
        }
        return response()->json(['Error'=>'No se encontró el registro'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $eliminado = false;
        $cliente = Cliente::find($id);
        if  (!$cliente) {
            return response()->json(['Error'=> 'No se encontró el Cliente a eliminar.'], 400);
        }
        $eliminado = $cliente->delete();
        if($eliminado){
            return response()->json(['message'=> ' Cliente eliminado con éxito.'], 201);
        }
            return response()->json([ 'Error'=>'no se puede eliminar la cliente'],409);
     }
}

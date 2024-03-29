<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Estado;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rule;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estados = Estado::all();
        if(!$estados->isEmpty()){
            return response()->json(['message'=>'estados','Estados'=>$estados ],200);
        }
        return  response()->json(['Error'=>'No se encontraron estados'],404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      // Método para mostrar el formulario de creación de estado
      public function create()
      {
        //
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
            'entidad' => 'required|min:4',
            'nombre' => [' min:4' ,'required', Rule::unique('estados')->where(function ($query) use ($request) {
                return $query->where('entidad', $request->entidad);
            })],
          ];
        $messages=[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'=>'el nombre debe ser minimo :min caracateres',
            'nombre.unique'=> 'El la combinacion de nombre y entidad ya existe en la tabla Estados',
            'entidad.required' => 'la entidad es obligatorio.',
            'entidad.min'=>'la entidad debe ser minimo :min caracateres',
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);

       // Buscar el estado por su ID
       // Validar los datos que llegan desde la peticion
       if(!$validator->fails()){
                $estado = new Estado();
                $estado->nombre = $request->nombre;
                $estado->entidad = $request->entidad;
                $res = $estado->save();
                if($res){
                    return response()->json([ 'message'=>'Estado Guardado Correctamente', 'Estado'=>$estado],201);
                }
                return  response()->json(['Error'=>'Fallo al guardar el estado'],409);
        }
        return  response()->json(['Error'=>'NO se ha podido guardar el registro', 'errors'=> $validator->errors() ],409);
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
        $estado = Estado::find($id);
        if (is_object($estado)){
            return response()->json(['message'=>'estado', 'estado'=>$estado], 201);
        }
         return response()->json(['Error'=>'No se encontro el registro'],404);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'entidad' => 'required|min:4',
            'nombre' => ['min:4','required', Rule::unique('estados')->where(function ($query) use ($request) {
                return $query->where('entidad', $request->entidad);
            })],
          ];
        $messages=[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'=>'el nombre debe ser minimo :min caracateres',
            'nombre.unique'=> 'La combinación de nombre y entidad ya existe en la tabla Estados',
            'entidad.required' => 'la entidad es obligatorio.',
            'entidad.min'=>'la entidad debe ser minimo :min caracateres',
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);
        // Buscar el estado por su ID
        $estado = Estado::find($id);
        if ($estado){
            if(!$validator->fails()){
                // Guardar en la base de datos y
               // Asignacion masiva
                $estado->fill($request->route()->parameters);
                $res = $estado->save();
                if($res){
                    return response()->json([ 'message'=>' Estado Guardado Correctamente', 'Estado'=>$estado],201);
                }
                return  response()->json(['Error'=>'Fallo al guardar el estado'],500);
            }
            return  response()->json(['Error'=>'No se puede actualizar el estado', 'errors'=> $validator->errors() ],409);
        }
        return  response()->json(['Error'=>'No se encontró el estado',],404);
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
        $estado = Estado::find($id);
        if  (!$estado) {
            return response()->json(['Error'=> 'No se encontró el estado a eliminar.'], 400);
        }
        $eliminado = $estado->delete();
        if($eliminado){
            return response()->json(['message'=> ' Estado eliminado con éxito.'], 201);
        }
            return response()->json([ 'Error'=>'no se puede eliminar el estado.'],409);
    }


}

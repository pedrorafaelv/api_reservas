<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Industria;
use Validator;

class IndustriaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industrias=Industria::all();
        if (!$industrias->isEmpty()) {
            return response()->json(['message'=>'Todas las industrias','industrias'=>$industrias], 200);
        }
        return response()->json(['Error'=>'No hay industrias'],404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'nombre' => 'required|min:4|unique:industrias,nombre',
          ];
        $messages=[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'=>'el nombre debe ser minimo :min caracateres',
            'nombre.unique'=>'Ya existe una industria con este nombre'
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);

        // Crear un nuevo Tipo de recurso
        if (!$validator->fails()){
                $industria =new Industria();
                $industria->nombre = $request->nombre;
                $res =$industria->save();
                if ($res){
                    return response()->json(['message'=>'El industria se ha creado correctamente', 'industria'=>$industria],201);
                }
                return response()->json(['Error'=>'El industria No se ha creado'],500);
        }
        return response()->json(['Error'=>'El al crear la industria', 'falla en los datos'=>$validator->errors()],422);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $industria = Industria::find($id);
        if(is_object($industria)){

            return response()->json(['message'=>'Industria', 'industria'=>$industria], 200);
        }
         return response( )->json(['Error'=>'No existe la industria'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
            'nombre' => 'required|min:4|unique:industrias,nombre',
          ];
        $messages=[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'=>'el nombre debe ser minimo :min caracateres',
            'nombre.unique'=>'Ya existe una industria con este nombre'
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);
        $industria = Industria::find($id);
        if  ($industria){
            if(!$validator->fails()){
                $industria->nombre= $request->nombre;
                $res = $industria->update();
                if ($res){
                    return response()->json(['message'=>'industria actualizada exitosamente ', 'industria'=> $industria ], 200);
                }
                return response()->json(['Error'=>'No se pudo actualizar la industria'], 401);
            }
            return response()->json(['Error'=>'Error al actualizar la industria', 'errors'=>$validator->errors()], 409);
        }
        return response()->json(['Error'=>'No se encontró el registro'], 400);
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
        $industria = Industria::find($id);
        if  (!$industria) {
            return response()->json(['Error'=> 'No se encontró la industria a eliminar.'], 40);
        }
        $eliminado = $industria->delete();
        if($eliminado){
            return response()->json(['message'=> ' Industria eliminada exitosamente.'], 201);
        }
            return response()->json([ 'Error'=>'no se puede eliminar la industria'],409);
     }
}

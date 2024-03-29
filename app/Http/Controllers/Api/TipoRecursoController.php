<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\TipoRecurso;
use Illuminate\Support\Facades\Validator;

// use App\Http\Controllers\Api\Validator;

class TipoRecursoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tiporecursos=TipoRecurso::all();
        if (!$tiporecursos->isEmpty()) {
            return response()->json(['message'=>'tiporecursos','tiporecursos'=>$tiporecursos], 200);
        }
        return response()->json(['Error'=>'No hay tiporecursos'],404);
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
            'nombre' => 'required|min:4|unique:tipo_recursos,nombre',
          ];
        $messages=[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'=>'el nombre debe ser minimo :min caracateres',
            'nombre.unique'=>'Ya existe un tipo recurso con este nombre'
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);
        // Crear un nuevo Tipo de recurso
        if (!$validator->fails()){
               $tiporecurso =new TipoRecurso();
                $tiporecurso->nombre = $request->nombre;
                $res =$tiporecurso->save();
                if ($res){
                    return response()->json(['message'=>'El tiporecurso se ha creado correctamente', 'tiporecurso'=>$tiporecurso],201);
                }
                return response()->json(['Error'=>'El tiporecurso No se ha creado'],500);
             }
        return response()->json(['Error'=>'El tiporecurso no se puedo actualizar', 'errors'=> $validator->errors()],409);
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
        $tiporecurso = TipoRecurso::find($id);
        if(is_object($tiporecurso)){

            return response()->json(['message'=>'TipoRecurso', 'tiporecurso'=>$tiporecurso], 200);
        }
         return response( )->json(['Error'=>'No existe la tiporecurso'], 404);
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
        // $tiporecurso = TipoRecurso::findOrFail($id);

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
            'nombre' => 'required|min:4|unique:tipo_recursos,nombre',
          ];
        $messages=[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'=>'el nombre debe ser minimo :min caracateres',
            'nombre.unique'=>'Ya existe un tipo recurso con este nombre'
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);
        $tiporecurso = TipoRecurso::find($id);
        if  ($tiporecurso){
            if(!$validator->fails()){
                $tiporecurso->nombre= $request->nombre;
                $res = $tiporecurso->save();
                if ($res){
                    return response()->json(['message'=>'tipo recurso actualizado con exito ', 'tiporecurso'=> $tiporecurso ], 200);
                }
                return response()->json(['Error'=>'No se pudo actualizar el registro'], 401);
            }
            return response()->json(['Error'=>'No se pudo actualizar el registro', 'errors'=> $validator->errors()], 400);
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
        $tiporecurso = TipoRecurso::find($id);
        if  (!$tiporecurso) {
            return response()->json(['Error'=> 'No se encontró la tipoRecurso a eliminar.'], 40);
        }
        $eliminado = $tiporecurso->delete();
        if($eliminado){
            return response()->json(['message'=> ' TipoRecurso eliminado con éxito.'], 201);
        }
            return response()->json([ 'Error'=>'no se puede eliminar la tiporecurso'],409);
     }
}

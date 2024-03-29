<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Recurso;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// use Illuminate\Support\Facades\DB;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recursos=Recurso::all();
        if (!$recursos->isEmpty()) {
            return response()->json(['message'=>'recursos','recursos'=>$recursos], 200);
        }
        return response()->json(['Error'=>'No hay recursos'],404);
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
            'nombre' => 'required|min:4|unique:recursos,nombre,empresa_id,tipo_recurso_id',
            'empresa_id'=>'required|numeric|exists:empresas,id',
            'tipo_recurso_id'=>'required|numeric|exists:tipo_recursos,id',
            'estado_id'=>'required|numeric|exists:estados,id',
          ];
        $messages=[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'=>'el nombre debe ser minimo :min caracateres',
            'nombre.unique'=>'Ya existe un tipo recurso con este nombre, para esta empresa y tipo de recurso',
            'empresa_id.required'=>'El id de la empresa es obligatorio',
            'empresa_id.exists'=>'La empresa no existe en nuestra base de datos',
            'empresa_id.numeric'=>'Debe ingresar un valor numerico para la empresa',
            'tipo_recurso_id.required'=>'el id del tipo de recurso es obligatorio',
            'tipo_recurso_id.exists'=>'Este tipo de recurso no se encuentra registrado.',
            'tipo_recurso_id.numeric'=>'Debe ingresarun valor numerico para el tipo de recurso',
            'estado_id.required'=>'Se requiere que indique el estado del recurso.',
            'estado_id.exists'=>'El estado no está dado de alta en la base de datos.',
            'estado_id.numeric'=>'DebeIngrese un valor numérico para el campo Estado.'
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);
        // Crear un nuevo Tipo de recurso
        if (!$validator->fails()){
              $recurso =new Recurso();
              $recurso->fill($request->route()->parameters);
              $res =$recurso->save();
              if ($res){
                return response()->json(['message'=>'El recurso se ha creado correctamente', 'recurso'=>$recurso],201);
              }
              return response()->json(['Error'=>'El recurso No se ha podido crear'],500);
        }
        return response()->json(['Error'=>'El Recurso no se puede guardar', 'errors'=> $validator->errors()],409);
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
        $recurso = Recurso::find($id);
        if(is_object($recurso)){

            return response()->json(['message'=>'Recurso', 'recurso'=>$recurso], 200);
        }
         return response( )->json(['Error'=>'No existe la recurso'], 404);
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
            'empresa_id'=>'required|numeric|exists:empresas,id',
            'nombre' => ['min:4 |required', Rule::unique('recursos')->where(function ($query) use ($request) {
                return $query->where('empresa_id', $request->empresa_id)->where('tipo_recurso_id', $request->tipo_recurso_id);
            })],
            'tipo_recurso_id'=>'required|numeric|exists:tipo_recursos,id',
            'estado_id'=>'required|numeric|exists:estados,id',
          ];
        $messages=[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'=>'el nombre debe ser minimo :min caracateres',
            'nombre.unique'=>'Ya existe un tipo recurso con este nombre, para esta empresa y tipo de recurso',
            'empresa_id.required'=>'El id de la empresa es obligatorio',
            'empresa_id.exists'=>'La empresa no existe en nuestra base de datos',
            'empresa_id.numeric'=>'Debe ingresar un valor numerico para la empresa',
            'tipo_recurso_id.required'=>'el id del tipo de recurso es obligatorio',
            'tipo_recurso_id.exists'=>'Este tipo de recurso no se encuentra registrado.',
            'tipo_recurso_id.numeric'=>'Debe ingresarun valor numerico para el tipo de recurso',
            'estado_id.required'=>'Se requiere que indique el estado del recurso.',
            'estado_id.exists'=>'El estado no está dado de alta en la base de datos.',
            'estado_id.numeric'=>'DebeIngrese un valor numérico para el campo Estado.'
        ];
        // Crear un nuevo Tipo de recurso
        $recurso = Recurso::find($id);
        if  ($recurso){
            $validator = Validator::make($request->route()->parameters, $rules, $messages);
            if(!$validator->fails()){
                $recurso->tipo_recurso_id = $request->tipo_recurso_id;
                $recurso->estado_id = $request->estado_id;
                $recurso->nombre = $request->nombre;
                $res = $recurso->update();
                if ($res){
                    return response()->json(['message'=>' El recurso se ha actualizado con exito ', 'recurso'=> $recurso ], 200);
                }
                return response()->json(['Error'=>'No se pudo actualizar el registro'], 401);
            }
            return response()->json(['Error'=>'No se pudo actualizar el registro', 'errors'=> $validator->errors()], 409);
        }
        return response()->json(['Error'=>'No se encontró el registro'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request)
    {
        $rules = [
                 'id' => ['sin_reservas:id'], // Aplica la regla de validación personalizada
                 ];
        $messages=[
                 'id.sin_reservas'=>'Existe una reserva para este recurso',
                  ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);

        if($validator->fails()){
            return response()->json(['validator->fails'=>$validator->fails(),'errors'=>$validator->errors()], 409);
        }
        $eliminado = false;
        $recurso = Recurso::find($id);
        if  (!$recurso) {
            return response()->json(['Error'=> 'No se encontró el Recurso a eliminar.'], 404);
        }
         $eliminado = $recurso->delete();
        if($eliminado){
            return response()->json(['message'=> ' Recurso eliminado exitosamente.'], 201);
        }
            return response()->json([ 'Error'=>'no se pudo eliminar el recurso'],409);
     }

    public function ActiveDeactiveRecurso(Request $request){
        $deactive = false;
        $recurso = Recurso::find($id);
        if  (!$recurso) {
            return response()->json(['Error'=> 'No se encontró el Recurso a desactivar.'], 404);
        }
        $recurso->estado_id = $request->estado_id;
         $deactive = $recurso->update();
        if($deactive){
            return response()->json(['message'=> ' Recurso desactivado existosamente.'], 201);
        }
            return response()->json([ 'Error'=>'no se pudo desactivar el recurso'],409);
     }

    public function getXEmpresa( Request $request){
        $recursos = Recurso::getRecursosXEmpresa($request->empresa_id, $request->estado_id);
        if (is_null($recursos)) {
          return response()->json(['mensaje' => 'Registro no encontrado'],  404);
        }
        if (count($recursos)>0){
            return response()->json(['message'=>'recursos x empresa','data'=>$recursos, 'count'=> count($recursos)],200);
        }
        return response()->json(['Error'=>'No existen recursos para esta empresa y estado'],200);
    }

    public function getXestado(Request $request){

        $recursos = Recurso::getXestado($request->recurso_id, $request->estado_id, $request->fecha_inicio, $request->fecha_fin);
        if(is_null($recursos)){
          return response()->json(['mensaje' => 'Registro no encontrado'],  404);

        }
        if (count($recursos) > 0){
            return response()->json(['message'=>'dispinibilidad X Recurso','data'=>$recursos],200);
        }
        return response()->json(['Error'=>'No existen recursos para esta empresa y estado'],200);
    }


    }


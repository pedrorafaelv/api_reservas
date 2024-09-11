<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Validator;

// use Validator;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        if (!$empresas->isEmpty()){
           return response()->json(['message'=> 'empresas', 'empresas'=>$empresas], 200);
        }
        return response()->json(['error'=> 'No hay Empresas'], 404);
    }

    // Método para mostrar el formulario de creación de empresa
    public function create()
    {
    }

    // Método para guardar un nuevo empresa
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $rules=[
            'nombre' => 'required|min:4|unique:empresas,nombre',
            'direccion' => 'required|min:8',
            'telefono' => 'required|min:8',
            'email' => 'required|email|unique:empresas,email',
            'industria_id'=>'required|numeric',
            'fundacion'=> 'required|date',
            'ingresos'=>'required|numeric',
            'descripcion'=> 'required|min:10'
        ];
        $messages=[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'=>'el nombre debe ser minimo :min caracateres',
            'nombre.unique'=>'el nombre ya esta en uso',
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.min'=>'la direccion minima son :min caracteres',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.min'=>'El telefono minimo debe ser :min numeros',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'El correo electronico ya esta en uso.',
            'fundacion.required' => 'la fundacion es obligatoria.',
            'fundacion.date' => 'Debe ingresar una fecha valida.',
            'industria_id.required' => 'La industria es obligatoria.',
            'industria_id.numeric' => 'Debe ingresar una industria valida.' ,
            'ingresos.required' => 'Los ingresos son obligatorios.',
            'ingresos.numeric' => 'Los ingresos deben ser numéricos.',
            'descripcion.required' => 'La descripción es obligatoria.' ,
            'descripcion.min' => 'La descripciondebe tenere al menos :min caracteres.',
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);
        if ($validator->fails()){
             return response()->json(['Error'=> 'Error al Crear Empresa', 'errors '=>$validator->errors()], 400);
        }
        try {
        $nuevaEmpresa = new Empresa();
        $nuevaEmpresa->fill($request->route()->parameters);
        // Guardamos la nueva empresa en la base de datos
        $resp = $nuevaEmpresa->save();
        // Devolvemos una respuesta con el código HTTP 201 y el mensaje de que se ha creado correctamente
            return response()->json(['message'=> 'Empresa creada existosamente', 'nuevaempresa'=>$nuevaEmpresa], 200);
         } catch (\Exception $e) {
            return response()->json(['Error'=> 'Error al Crear Empresa', 'errors'=>$validator->errors(), 'nuevaempresa'=> $nuevaEmpresa], 409);
            // En caso de que no se pueda crear el registro, devolvemos un código HTTP 400 en lugar de 500
        }
    }

    // Método para mostrar un empresa específico ok
    public function show($id)
    {
        $empresa = Empresa::find($id);
        if(is_object($empresa)){
            return response()->json(['message'=>'empresa','empresa'=>$empresa],200);
        }
        return response()->json(['Error'=>'La empresa no existe'],404 );
    }

    // Método para mostrar el formulario de edición de empresa
    public function edit($id)
    {

    }

    // Método para actualizar un empresa existente
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $rules=[
            'nombre' => 'required|min:4',
            'direccion' => 'required|min:8',
            'telefono' => 'required|min:8',
            'industria_id'=>'required|numeric|exists:industrias,id',
            'fundacion'=> 'required|date',
            'ingresos'=>'required|numeric',
            'descripcion'=> 'required|min:10'
        ];
        $messages=[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min'=>'el nombre debe ser minimo :min caracateres',
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.min'=>'la direccion minima son :min caracteres',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.min'=>'El telefono minimo debe ser :min numeros',
            'fundacion.required' => 'la fundacion es obligatoria.',
            'fundacion.date' => 'Debe ingresar una fecha valida.',
            'industria_id.required' => 'La industria es obligatoria.',
            'industria_id.numeric' => 'Debe ingresar una industria valida.' ,
            'industria_id.exists'=>'No se encuentra la industria en nuestros registros.',
            'ingresos.required' => 'Los ingresos son obligatorios.',
            'ingresos.numeric' => 'Los ingresos deben ser numéricos.',
            'descripcion.required' => 'La descripción es obligatoria.' ,
            'descripcion.min' => 'La descripciondebe tenere al menos :min caracteres.',
        ];
        // Buscar el empresa por su ID
        $empresa = Empresa::find($id);
        if ($empresa) {
            $validator = Validator::make($request->route()->parameters, $rules, $messages);
            if(!$validator->fails()){
            // Actualizar la información del empresa
                $res = $empresa->update($request->route()->parameters);
            // Devolver una respuesta
                if($res){
                    return response()->json(['message'=>'Se ha actualizado correctamente','empresa'=>$empresa], 200);
                }
                return response()->json(['error'=> 'No se pudo actualizar el registro'], 404);
            }
            return response()->json(['Error'=>'No se pudo actualizar el registro', 'errors'=> $validator->errors()], 409);
        }
        return response( )->json(['error'=> 'Empresa no encontrada'], 404);
    }

    // Método para eliminar un empresa
    public function destroy($id)
    {
         $eliminado = false;
        // Buscar el empresa por su ID y eliminarlo
        $empresa = Empresa::find($id);
        if (!$empresa) {
            return response()->json(['error'=>'La empresa no existe'], 404);
        }
        $eliminado= $empresa->delete();
        if ($eliminado) {
            return response()->json(['message'=>'Empresa eliminada'], 200);
        }
        return  response()->json(['error'=>'Error en la eliminación'],409 );
    }
}

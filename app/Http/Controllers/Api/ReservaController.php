<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Empresa;
use App\Models\Recurso;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Validator;
use App\Provider\AppServiceProvider;
use DateTime;

class ReservaController extends Controller
{

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas=Reserva::all();
        if (!$reservas->isEmpty()) {
            return response()->json(['message'=>'reservas','reservas'=>$reservas], 200);
        }
        return response()->json(['Error'=>'No hay reservas'],404);
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
            'cliente_id'=>['required','numeric','exists:clientes,id'],
            'empresa_id'=>['required','numeric','exists:empresas,id'],
            'recurso_id'=>'required|numeric|exists:recursos,id',
            'fecha_inicio'=>['date','required', Rule::unique('reservas')->where(function ($query) use ($request) {
                return $query->where('empresa_id', $request->empresa_id)->where('recurso_id', $request->recurso_id);
            })],
            'fecha_fin'=>['required','date','after:fecha_inicio', 'fecha_no_entre_registros:fecha_inicio,fecha_fin'],
            'estado_id'=>'required|numeric|exists:estados,id',
          ];
        $messages=[
            'fecha_inicio.required'=>'La fecha de inicio es obligatoriaa',
            'fecha_inicio.date'=>'La fecha debe ser una fecha válida',
            'fecha_inicio.unique'=>'Ya existe una reserva en esa fecha y recurso',
            'fecha_fin.required'=>'La fecha fin es obligatoria',
            'fecha_fin.date'=>'La fecha fin debe ser una fecha valida',
            'fecha_fin.after'=>'La fecha fin debe ser posterior a la fecha inicio',
            'fecha_fin.fecha_no_entre_registros'=>'el recurso esta ocupado en otra reserva',
            'empresa_id.required'=>'El id de la empresa es obligatorio',
            'empresa_id.exists'=>'La empresa no existe en nuestra base de datos',
            'empresa_id.numeric'=>'Debe ingresar un valor numerico para la empresa',
            'cliente_id.required'=>'Se requiere del cliente que realiza la reserva',
            'cliente_id.exists'=>'Este usuario no se encuentra registrado como cliente.',
            'cliente_id.numeric'=>'Ingrese el ID del cliente correctamente',
            'recurso_id.required'=>'el id del recurso es obligatorio',
            'recurso_id.exists'=>'Este recurso no se encuentra registrado.',
            'recurso_id.numeric'=>'Debe ingresar un valor numerico para el recurso',
            'estado_id.required'=>'Se requiere que indique el estado del recurso.',
            'estado_id.exists'=>'El estado no está dado de alta en la base de datos.',
            'estado_id.numeric'=>'DebeIngrese un valor numérico para el campo Estado.'
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);
        // Crear un nuevo Tipo de reserva
        if (!$validator->fails()){
            $reserva =new Reserva();
            $reserva->fill($request->route()->parameters);
            $res =$reserva->save();
            if ($res){
                return response()->json(['message'=>'La reserva se ha creado correctamente', 'reserva'=>$reserva],201);
               }
                return response()->json(['Error'=>'El reserva No se ha creado'],500);
        }
        return response()->json(['Error'=>'La reserva no se a podido crear', 'errors'=> $validator->errors()],422);
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
        $reserva = Reserva::find($id);
        if(is_object($reserva)){

            return response()->json(['message'=>'Reserva', 'reserva'=>$reserva], 200);
        }
         return response( )->json(['Error'=>'No existe la reserva'], 404);
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
            'cliente_id'=>['required','numeric','exists:clientes,id'],
            'recurso_id'=>['required','numeric','exists:recursos,id'],
            'fecha_inicio'=>['date','required',  Rule::unique('reservas')->where(function ($query) use ($request) {
                return $query->where('empresa_id', $request->empresa_id)->where('recurso_id', $request->recurso_id);
            })],
            'fecha_fin'=>['required','date','after:fecha_inicio'],
          ];
        $messages=[
            'fecha_inicio.required'=>'La fecha de inicio es obligatoria',
            'fecha_inicio.date'=>'La fecha debe ser una fecha válida',
            'fecha_inicio.unique'=>'Ya existe una reserva en esa fecha y recurso para este cliente',
            'fecha_fin.date'=>'La fecha fin debe ser una fecha valida',
            'fecha_fin.required'=>'La fecha fin es obligatoria',
            'fecha_fin.after'=>'La fecha fin debe ser posterior a la fecha inicio',
            'cliente_id.required'=>'Se requiere del cliente que realiza la reserva',
            'cliente_id.exists'=>'Este usuario no se encuentra registrado como cliente.',
            'cliente_id.numeric'=>'Ingrese el ID del cliente correctamente',
            'recurso_id.required'=>'el id del recurso es obligatorio',
            'recurso_id.exists'=>'Este recurso no se encuentra registrado.',
            'recurso_id.numeric'=>'Debe ingresar un valor numerico para el recurso',
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);
        $reserva = Reserva::find($id);
        if  ($reserva){
            if(!$validator->fails()){
                $reserva->fill($request->route()->parameters);
                $res = $reserva->save();
                if ($res){
                    return response()->json(['message'=>'Reserva actualizada exitosamente', 'reserva'=> $reserva ], 200);
                }
                 return response()->json(['Error'=>'No se pudo actualizar la reserva'], 400);
            }
            return response()->json(['Error'=>'No se pudo actualizar la reserva', 'errors'=>$validator->errors()], 409);
        }
        return response()->json(['Error'=>'No se encontro la reserva'], 400);
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
        $reserva = Reserva::find($id);
        if  (!$reserva) {
            return response()->json(['Error'=> 'No se encontró el Reserva a eliminar.'], 40);
        }
        $eliminado = $reserva->delete();
        if($eliminado){
            return response()->json(['message'=> ' Reserva eliminada existosamente.'], 201);
        }
            return response()->json([ 'Error'=>'no se puede eliminar la reserva'],409);
     }



/** Obtener las reservas para una una fceha de inicio y fin para una empresa de acuerd con el estado
 * de las reservas
 *   * @param  int  $empresa_id
 *   * @param  int  $estado_id
 *   * @param  date  $fecha_inicio
 *   * @param  date  $fecha_fin
 *
     * @return \Illuminate\Http\Response
 */

     public function getReservas(Request $request ){

        $reservas=Reserva::where('empresa_id', $request->empresa_id)
        ->where('estado_id', $estado_id)
        ->whereDate('fecha_inicio','>=', $fecha_inicio)
        ->whereDate('fecha_fin','<=', $fecha_fin)->get();
        if($reservas->isEmpty()){
            return response()->json(['mensaje'=>'No hay reservas disponibles en los parámetros indicados'],300);
        }
        return response()->json(['message'=>'reservas encontradas', 'data'=> $reservas], 200);
     }

     /** Crear reservas para una una fecha en una empresa  con estado disponible
     * para cada recurso sin un cliente
     *   * @param  int  $empresa_id
     *   * @param  date  $fecha
     */
     public function createReservasXdia(Request $request){
        //validacion de los parametros que llegan por post
        $rules = [
            "empresa_id"=>["required","numeric", 'exists:empresas,id'],
            "fecha"=>"required|date",
        ];
        $messages=[
            'empresa_id.required'=>'La fecha de inicio es obligatoria',
            'empresa_id.numeric'=>'el id de la empresa es un número',
            'empresa_id.exists'=>'Este id no se encuentra registrada como empresa.',
            'fecha.required'=>'La fecha es obligatoria',
            'fecha.date'=>'La fecha debe ser una fecha válida',
        ];
        $validator = Validator::make($request->route()->parameters, $rules, $messages);

        //obtener la disponibilidad de la empresa para el día  y el formato de reserva
        //de la empresa y bien sea por día, 4 horas, 1 hora, 30, 45, 15 minutos

        $empresa = Empresa::find($request->empresa_id);
        $notAvailableDays = $empresa->getNotAvailableDays();
        $notAvailableDates = $empresa->getNotAvailableDates();
        $availableHours= $empresa->getAvailableHours();
        $recursos= $empresa->recursos();
        $nh = count( $availableHours );//numero de horarios disponibles por dia
        $empresa_duration = (count($availableHours)) *60;
        $time_start = new  DateTime($empresa->time_start);
        $time_off = new   DateTime($empresa->time_off);
        $estado_id= 1;//disponible
        $cliente_id = 4;//sin asignar aun
        $reservas=[];
         // ($empresa_duration == 0)?$empresa_duration=1440:$empresa_duration=$empresa_duration;//
        foreach( $recursos as $recurso ){
            $disponibility= intval($empresa_duration/$recurso->time_format_reserve);
            $recurso= Recurso::find( $recurso->id );

            $i = 0;
            $guardado = false;
            $start_reservation = $time_start;
            $end_reservation = new  DateTime($empresa->time_start);
            $end_reservation->modify('+'. ($recurso->time_format_reserve - 1) .' minutes');
            for($i=0; $i< $disponibility; $i++){
                $new_reservation = $this->createReservasXhoras($request->empresa_id, $recurso->id,$start_reservation->format('Y-m-d H:i:s'), $end_reservation->format('Y-m-d H:i:s'), $estado_id, $cliente_id);
                // return response()->json(['Message'=> 'guardado', 'data'=> $new_reservation], 409);
                if ($new_reservation){
                   array_push($reservas,$new_reservation);
                   $start_reservation->modify('+'. ($recurso->time_format_reserve) .' minutes');
                   $end_reservation->modify('+'. ($recurso->time_format_reserve) .' minutes');
                   $guardado = false;
                }else{
                    return response()->json(['Error'=> 'No se pudo guardar correctamente todas las reservas', 'data'=> $reservas, 'Errors'=>''], 409);
                }
            }
            return response()->json(['Message'=>'datos guardados correctamente','$reservas'=> $reservas], 200);
        }

    }


/**
 * crea las reservas por horas
 */

    public function createReservasXhoras($empresa_id, $recurso_id, $fecha_inicio, $fecha_fin, $estado_id, $cliente_id){

        $parametros = compact('empresa_id', 'recurso_id', 'fecha_inicio', 'fecha_fin', 'estado_id', 'cliente_id');
        $rules=[
            'cliente_id'=>['required','numeric','exists:clientes,id'],
            'empresa_id'=>['required','numeric','exists:empresas,id'],
            'recurso_id'=>['required','numeric','exists:recursos,id'],
            'fecha_inicio'=>['date','required', Rule::unique('reservas')->where(function ($query) use ($empresa_id, $recurso_id, $fecha_inicio) {
                return $query->where('empresa_id', $empresa_id)
                             ->where('recurso_id', $recurso_id)
                             ->where('fecha_inicio', $fecha_inicio);
            }),
        ],
            'fecha_fin'=>['required','date','after:fecha_inicio', 'fecha_no_entre_registros:fecha_inicio,fecha_fin'],
            'estado_id'=>['required','numeric','exists:estados,id'],
              ];
            $messages=[
                'fecha_inicio.required'=>'La fecha de inicio es obligatoriaa',
                'fecha_inicio.date'=>'La fecha debe ser una fecha válida',
                'fecha_inicio.unique'=>'Ya existe una reserva en esa fecha y recurso',
                'fecha_fin.required'=>'La fecha fin es obligatoria',
                'fecha_fin.date'=>'La fecha fin debe ser una fecha valida',
                'fecha_fin.after'=>'La fecha fin debe ser posterior a la fecha inicio',
                'fecha_fin.fecha_no_entre_registros'=>'el recurso esta ocupado en otra reserva',
                'empresa_id.required'=>'El id de la empresa es obligatorio',
                'empresa_id.exists'=>'La empresa no existe en nuestra base de datos',
                'empresa_id.numeric'=>'Debe ingresar un valor numerico para la empresa',
                'cliente_id.required'=>'Se requiere del cliente que realiza la reserva',
                'cliente_id.exists'=>'Este usuario no se encuentra registrado como cliente.',
                'cliente_id.numeric'=>'Ingrese el ID del cliente correctamente',
                'recurso_id.required'=>'el id del recurso es obligatorio',
                'recurso_id.exists'=>'Este recurso no se encuentra registrado.',
                'recurso_id.numeric'=>'Debe ingresar un valor numerico para el recurso',
                'estado_id.required'=>'Se requiere que indique el estado del recurso.',
                'estado_id.exists'=>'El estado no está dado de alta en la base de datos.',
                'estado_id.numeric'=>'DebeIngrese un valor numérico para el campo Estado.'
            ];
            $validator = Validator::make($parametros, $rules, $messages);
            // Crear un nuevo Tipo de reserva
            if (!$validator->fails()){
                $reserva =new Reserva();
                $reserva->fill($parametros);
                $res =$reserva->save();
                if ($res){
                    //return response()->json(['Message'=> 'reserva guardada', 'data'=> $reserva], 200);
                     return $reserva;
                }
                //return response()->json(['Error'=> 'No se pudo guardar correctamente la reservas', 'data'=> $reserva], 409);
                 return false;
            }
            //return response()->json(['Error'=> 'No se pudo guardar correctamente  la reserva', 'Errors'=> $validator->errors(), 'fecha_inicio'=> $fecha_inicio, 'fecha_fin'=>$fecha_fin], 409);
             return false;
        }


      public function  searchReservas(Request $request){
         //filtrado de busqueda por fecha y usuario
        //    $fechaI=$request->fecha_inicio;
       //    $fechaF=$request->fecha_fin;
        //    $recurso_id=$request->recurso_id;
        //    $empresa_id = $request->empresa_id;
           $reservas=[];
           $i=0;
           /*si no hay un recurso, muestra todas las reservas para esa empresa*/
        //    if(!isset($fechaI) && !isset($usuarioID)){
            $reservas=Reserva::where('empresa_id', $request->empresa_id)
            ->where('estado_id', $estado_id)
            ->whereDate('fecha_inicio','>=', $fecha_inicio)
            ->whereDate('fecha_fin','<=', $fecha_fin)->get();

        //    }else{/*busca por fecha o por usuario*/
                // if (isset($fechaI)) {
        //            $reservas=Reserva::whereDate('horaInicio','>=',$fechaI)
        //            where('empresa_id', $empresa_id)->get();
        //            $i=count($reservas);
        //         }
        //         if (isset($recurso_id)) {
        //             $reservas=Reserva::where('user_id','=',$usuarioID)->get();
        //         }
        //         if ($tipoUsuario==='admin') {
        //             for ($j=0; $j<$i ; $j++) {
        //                 $usuarios= User::select('name')->where('id','=',$reservas[$j]['user_id'])->get();
        //                 $reservas[$j]['nombre']=$usuarios[0]['name'];
        //             }
        //         }
        // //    }
        //    foreach ($reservas as $r) {
        //       $horas=date("H:i",strtotime($r['horaInicio']));
        //       $diaSemana= date('l', strtotime($r['horaInicio']));
        //       $diasemanal[]= $diaSemana;
        //       $horariovalido="Si";
        //       switch ($diaSemana) {
        //          case "Monday":
        //              $diasemana="Lunes";
        //              break;
        //          case "Tuesday":
        //              $diasemana="Martes";
        //              break;
        //          case "Wednesday":
        //              $diasemana="Miércoles";
        //              break;
        //          default :
        //               $diasemana=$diaSemana."/No definida";
        //       }
        //       $arrayHorario=json_decode($r['horario'],true);
        //       //comprueba si la hora de inicio está dentro del horario permitido para el día correspondiente. Si no lo
        //       foreach ($arrayHorario as $dia => $valores) {
        //           if(in_array($dia,$diasemanal)) {
        //                if (!in_array($horas , $valores)) {
        //                   $horariovalido="No";
        //                }
        //           }
        //       }

        //       $datos[] = array(
        //          'Id' => $r['id'],
        //          'Nombre'=> $r['nombre'],
        //          'Dia' => $diasemana,
        //          'Fecha Inicio' => $r['fechaInicio'],
        //          'Hora Inicio' => $horas,
        //          'Disponible' => $horariovalido
        //       );
        //    }
        // return new JsonModel($datos);

    }
}
// }

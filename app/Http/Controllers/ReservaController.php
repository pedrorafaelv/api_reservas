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
use DateTime;
use DateTimeZone;
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
        $zonaHoraria = new DateTimeZone('UTC');
        $today  = new DateTime('now',$zonaHoraria);
        $dia =intval($today->format('d'));
        $hora_inicio= '8:00:00';
        $hora_fin = '23:59:59';
        $lastDay = new DateTime('now', $zonaHoraria );
        $lastDay->modify('+90 day');
        $today->modify('-4 hours');
        $f= $today->Format('Y-m-d');
        $reserv = Reserva::where('fecha_inicio', '>=' ,$f )->orderBy('fecha_inicio', 'asc')->get()->toArray();
        $nro_reservas = Reserva::where('fecha_inicio', '>=', $f)->count();
        // $sql = str_replace_array('?', $reserv->getBindings(), $reserv->toSql());
        // dd($reserv->toSql(), $reserv->getBindings());
        $ev = array();
        $events= array();
        $reserva_hoy= false;
        $hayReservas = false;
        $cambioDia = false;
        for ($i = 0; $i<= 30; $i++ ){
            $fecha = "";
            if (count($reserv)>0){
                foreach($reserv as $reserva){
                    $fecha = new DateTime($reserva['fecha_inicio']);
                    if($fecha->format('Y-m-d') == $today->format('Y-m-d')){
                        $hayReservas= true;
                        $evento =array(
                            'title' => $reserva['id'],
                            'start' => $reserva['fecha_inicio'],
                        );
                        array_push($events, $evento);
                        $firstIndex = array_key_first($reserv);
                        unset($reserv[$firstIndex]);
                    }
                    else{
                        if($fecha > $today){
                            if ($hayReservas ==false){
                                $evento=array(
                                    'title' => 'Disponible',
                                    'start' => $today->format('Y-m-d h:i:00'),
                                    'end'  => $today->format('Y-m-d h:i:59'),
                                );
                                array_push($events, $evento);
                            }
                            $today->modify('+1 day');
                            break;
                        }
                    }
                }
            }
            if ($fecha ==''){
                $evento=array(
                    'title' => 'Disponible',
                    'start' => $today->format('Y-m-d h:i:00'),
                    'end'  => $today->format('Y-m-d h:i:59'),
                );
                array_push($events, $evento);
                $today->modify('+1 day');
            }
        }
        $reservas = Reserva::paginate(10);
        return view('reserva.index', compact('reservas', 'empresas', 'estados','recursos', 'clientes', 'events'));
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
        return redirect()->route('reserva.show', ['empresas' => $empresas, 'estados'=>$estados,'recursos'=>$recursos ,'clientes'=>$clientes,'reserva'=>$reserva])
        ->with('status', 'Reserva actualizada exitosamente');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva; // Asumiendo que tienes un modelo Reserva

class CalendarController extends Controller
{
    public function index()
    {
        $events = Reserva::all()->map(function($reserva) {
            return [
                'title' => $reserva->nombre, // Cambia esto según tu modelo
                'start' => $reserva->fecha_inicio, // Cambia esto según tu modelo
                'end' => $reserva->fecha_fin, // Cambia esto según tu modelo
            ];
        });

        return view('calendar.index', ['events' => $events]);
    }
}

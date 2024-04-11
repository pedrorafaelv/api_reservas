<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
         // Obtener la API key de la solicitud
        $apiKey = $request->header('X-API-Key');

        // Buscar la empresa por su API key
        $empresa = Empresa::where('api_key', $apiKey)->first();

        // Si la empresa no existe o la API key es incorrecta, devuelve un error
        if (!$empresa) {
            return response()->json(['error' => 'Acceso no autorizado'], 401);
        }

        // Asigna la empresa al request para que esté disponible en los controladores
        $request->empresa = $empresa;

        return $next($request);
    }
}

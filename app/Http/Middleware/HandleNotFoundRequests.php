<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HandleNotFoundRequests
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
        $response = $next($request);

        // Si la respuesta tiene un código de estado 404, redirigir a una página de error personalizada
         if ($response->status()=== '404'){
            return response()->json(['message'=> 'ruta no encontrada', Response::HTTP_NOT_FOUND], 404);
         }
         return $response;
    }
}

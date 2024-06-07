<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Verificar la autenticación del usuario aquí
        // Si el usuario no está autenticado, puedes redirigirlo a la página de inicio de sesión o devolver una respuesta de error

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(\Auth::user()position != 1) {
            return redirect('/')
                ->with([
                    'message' => 'No se han asignado los derechos para ingresar a este módulo',
                    'alert-class' => 'alert-info'
                ]);
        }

        return $next($request);
    }
}

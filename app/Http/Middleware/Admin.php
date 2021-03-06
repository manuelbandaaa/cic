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
        if(\Auth::user()->position_id != 1) {
            return redirect('/home')
                ->with([
                    'message' => 'No tienes los permisos para ingresar a este módulo',
                    'alert-class' => 'alert-info'
                ]);
        }

        return $next($request);
    }
}

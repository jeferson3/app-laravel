<?php

namespace App\Http\Middleware;

use Closure;

/*
    criando um novo middleware -> php artisan make:middleware nomeMiddleware
    tem que definir ele aqui, e instanciar no arquivo http/kernel.php
*/

class CheckIsAdminMiddleware
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
        $user = auth()->user(); //pega o usuario logado;

        if ($user->email != "jeferson@email.com") {
            return redirect('/');
        }

        return $next($request);
    }
}

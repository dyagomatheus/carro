<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        // Verifica se está logado, se não tiver redireciona
        if ( !auth()->check() )
            return redirect()->route('login');
    
        /*
        * Verifica se o usuário é um Admin
        */
        // Recupera o tipo do usuário
        $admin = auth()->user()->admin;
    
        // Verifica se admin é = true, caso não se redireciona para a Home Page
        if ( $admin == false )
            return redirect('/');
    
    
        // Permite que continue (Caso não entre em nenhum dos if acima)...
        return $next($request);
    }
}

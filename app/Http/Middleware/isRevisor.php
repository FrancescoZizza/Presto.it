<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isRevisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // se l'autore che è loggato è un revisore, mi ritroni una nuova richiesta
        if(Auth::check() && Auth::user()->is_revisor){
            return $next($request);
        }
        // altrimenti se non è loggato
        return redirect('/')->with('access.denied','Attenzione solo i revisori hanno accesso a questa sezione');
    }
}

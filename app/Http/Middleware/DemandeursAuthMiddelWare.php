<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemandeursAuthMiddelWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $users=session()->get('users');
        $auth=session()->get('auth');

        if($users ==null || $auth !=true){
           flash()->error('Veuillez vous authentifier');
           return redirect()->route('home');

        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{
            $user = Auth::user();
            if ($user->role === 'SuperAdmin' ) {
                return $next($request);
            }else{
                session()->flash('messageErreur', 'Impossible d\'accéder à cette page, vous n\'avez les droits d\'accès ');
                return redirect('/');
            }
        }catch(Exception $e){
            return redirect('/login');
        }
    }
}

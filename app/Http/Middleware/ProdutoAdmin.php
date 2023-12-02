<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdutoAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->exists('login')) {
            $login = $request->session()->get('login');
            if ($login['admin']) {
                return $next($request);
            } else {
                return redirect()->route('negadologin');
            }
        }
        return redirect()->route('negado');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TerceiroMidlleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $nome, $idade): Response
    {
        // Salva um registro no arquivo laravel.log
        Log::debug("Passou pelo TerceiroMidlleware [ nome = $nome, $idade]");
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SegundoMidlleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::debug("Passou pelo SegundoMidlleware ANTES");
        $response = $next($request);
        // Salva um registro no arquivo laravel.log
        Log::debug("Passou pelo SegundoMidlleware DEPOIS");
        return $response;
    }
}

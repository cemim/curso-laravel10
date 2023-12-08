<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // Intercepta o erro de autenticação para redirecionar para a página de login do admin ou do usuário
    protected function unauthenticated($request, AuthenticationException $exception)
    {

        // Verificar se esta acessando por API
        if($request->expectsJson()) {
            return response()->json(['message'=>$exception->getMessage()],401);
        }

        $guard = data_get($exception->guards(), 0);

        switch($guard) {
            case 'admin':
                $login = 'admin.login';
                break;
            case 'web':
                $login = 'login';
                break;
            default:
                $login = 'login';
                break;

        }

        return redirect()->guest(route($login));
    }
}

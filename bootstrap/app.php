<?php

use App\Http\Middleware\DemandeursAuthMiddelWare;
use App\Http\Middleware\UsersAuthMiddelWare;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
           'auth.admin'=>App\Http\Middleware\AdminAuthValid::class,
           'auth.user'=>App\Http\Middleware\DemandeursAuthMiddelWare::class,

        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

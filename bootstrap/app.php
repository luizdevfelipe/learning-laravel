<?php

use App\Http\Middleware\AssignRequestId;
use App\Http\Middleware\CheckUserRole;
use App\Http\Middleware\SomeOtherMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {}
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => CheckUserRole::class
        ]);

        $middleware->append(AssignRequestId::class);

        // $middleware->web(
        //     prepend: [AssignRequestId::class],
        //     replace: [EncryptCookies::class => CustomEncryptCookies::class],
        // );
        
        $middleware->appendToGroup('check-access', [CheckUserRole::class, SomeOtherMiddleware::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

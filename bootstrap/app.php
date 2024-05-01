<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\AuthorizeListingActions;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            HandleInertiaRequests::class,
            AddLinkHeadersForPreloadedAssets::class,
            VerifyCsrfToken::class,

        ]);
        $middleware->alias([
            'auth' => Authenticate::class,
            'can.listing' => AuthorizeListingActions::class,


        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

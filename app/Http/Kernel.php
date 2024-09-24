<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        'checkuser' => \App\Http\Middleware\CheckUser::class,
    ];
}

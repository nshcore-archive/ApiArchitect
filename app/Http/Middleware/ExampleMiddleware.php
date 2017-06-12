<?php

namespace App\Http\Middleware;

use Closure;
use ApiArchitect\Compass\Http\Middleware\AbstractMiddleware;
use Psr\Http\Message\ServerRequestInterface;

class ExampleMiddleware extends AbstractMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(ServerRequestInterface $request, Closure $next)
    {
        return $next($request);
    }
}

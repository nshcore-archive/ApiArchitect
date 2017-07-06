<?php

	namespace App\Http\Middleware;

	use Closure;
	use ApiArchitect\Compass\Http\Middleware\AbstractMiddleware;

	/**
	 * Class ExampleMiddleware
	 *
	 * @package App\Http\Middleware
	 * @author  James Kirkby <jkirkby@protonmail.ch>
	 */
	class ExampleMiddleware extends AbstractMiddleware
	{
		/**
		 * Handle an incoming request.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \Closure  $next
		 * @return mixed
		 */
		public function handle($request, Closure $next)
		{
			return $next($request);
		}
	}

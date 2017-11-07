<?php

	namespace Healer\Api\Http\Middleware;

	use Closure;
	use ApiArchitect\Compass\Http\Middleware\AbstractMiddleware;
	use Psr\Http\Message\ServerRequestInterface;

	/**
	 * Class ExampleMiddleware
	 *
	 * @package Healer\Api\Http\Middleware
	 * @author  James Kirkby <jkirkby@protonmail.ch>
	 */
	class ExampleMiddleware extends AbstractMiddleware
	{

		/**
		 * handle()
		 * @param \Psr\Http\Message\ServerRequestInterface $request
		 * @param \Closure                                 $next
		 *
		 * @return mixed
		 */
		public function handle(ServerRequestInterface $request, Closure $next)
		{
			return $next($request);
		}
	}
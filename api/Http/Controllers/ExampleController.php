<?php

	namespace Healer\Api\Http\Controllers {

		use ApiArchitect\Compass\Http\Controllers\ResourceApi;
		use Psr\Http\Message\ServerRequestInterface;

		/**
		 * Class ExampleController
		 *
		 * @package Healer\Api\Http\Controllers
		 * @author  James Kirkby <jkirkby@protonmail.ch>
		 */
		class ExampleController extends ResourceApi
		{

			/**
			 * store()
			 * @param \Psr\Http\Message\ServerRequestInterface $request
			 *
			 * @return \Zend\Diactoros\Response\JsonResponse
			 */
			public function store(ServerRequestInterface $request)
			{

				return $this->createdResponse(Fractal()
					->item($app->version())
					->transformWith($this->transformer)
					->serializeWith(new ArraySerialization())
					->toJson());
			}
		}
	}

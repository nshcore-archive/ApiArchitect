<?php

	namespace App\Http\Controllers;

	use ApiArchitect\Compass\Http\Controllers\ResourceApi;

	/**
	 * Class ExampleController
	 *
	 * @package App\Http\Controllers
	 * @author  James Kirkby <jkirkby@protonmail.ch>
	 */
	class ExampleController extends ResourceApi
	{

		/**
		 * store()
		 * @param \App\Http\Controllers\ServerRequestInterface $request
		 *
		 * @return mixed
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

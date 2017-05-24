<?php

namespace App\Http\Controllers;

use ApiArchitect\Compass\Http\Controllers\RestApi;

class ExampleController extends RestApi
{

    public function __construct(ResourceRepository $repository, ObjectTransformer $objectTransformer)
    {
        parent::__construct($repository,$objectTransformer);
    }

    public function store(ServerRequestInterface $request)
    {

        return $this->createdResponse(Fractal()
            ->item($app->version())
            ->transformWith($this->transformer)
            ->serializeWith(new ArraySerialization())
            ->toJson());
    }
}

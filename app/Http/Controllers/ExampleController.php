<?php

namespace App\Http\Controllers;

use ApiArchitect\Compass\Http\Controllers\RestApi;

class ExampleController extends RestApi
{

    public function store(ServerRequestInterface $request)
    {

        return $this->createdResponse(Fractal()
            ->item($app->version())
            ->transformWith($this->transformer)
            ->serializeWith(new ArraySerialization())
            ->toJson());
    }
}

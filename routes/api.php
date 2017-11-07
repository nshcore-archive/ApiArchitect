<?php

	$app->group(['middleware' => ['before' => 'psr7adapter', 'after' => 'apiarchitect.auth']], function () use ($app)
	{
		$app->get('example', 'Api\Http\Controllers\ExampleController@index');
		$app->get('/example/{id}', 'Api\Http\Controllers\ExampleController@show');
		$app->post('example', 'Api\Http\Controllers\ExampleController@store');
		$app->put('/example/{id}', 'Api\Http\Controllers\ExampleController@update');
		$app->delete('/example/{id}','Api\Http\Controllers\ExampleController@destroy');
	});
<?php

	$app->group(['middleware' => ['before' => 'psr7adapter', 'after' => 'apiarchitect.auth']], function () use ($app)
	{
		global $app;

		resource('example','ExampleController');

	});



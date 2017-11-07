<?php

	return [

		'fetch' => PDO::FETCH_OBJ,

		'default' => env('DB_CONNECTION', 'mysqlLocal'),

		'connections' => [

			'sqlite' => [
				'driver' => 'sqlite',
				'database' => ':memory:',
				'prefix' => '',
			],

			'mysqlLocal' => [
				'strict'    => false,
				'charset'   => 'utf8',
				'driver'    => 'mysql',
				'prefix'    => 'healer_local',
				'collation' => 'utf8_unicode_ci',
				'host'      => env('DB_HOST'),
				'port'      => env('DB_PORT'),
				'database'  => env('DB_DATABASE'),
				'username'  => env('DB_USERNAME'),
				'password'  => env('DB_PASSWORD')
			],

			'mysqlTest' => [
				'strict'    => false,
				'charset'   => 'utf8',
				'driver'    => 'mysql',
				'prefix'    => 'healer_local',
				'collation' => 'utf8_unicode_ci',
				'host'      => env('DB_HOST'),
				'port'      => env('DB_PORT'),
				'database'  => env('DB_DATABASE'),
				'username'  => env('DB_USERNAME'),
				'password'  => env('DB_PASSWORD')
			],

			'mysqlStage' => [
				'strict'    => false,
				'charset'   => 'utf8',
				'driver'    => 'mysql',
				'prefix'    => 'healer_local',
				'collation' => 'utf8_unicode_ci',
				'host'      => env('DB_HOST'),
				'port'      => env('DB_PORT'),
				'database'  => env('DB_DATABASE'),
				'username'  => env('DB_USERNAME'),
				'password'  => env('DB_PASSWORD')
			],

			'mysqlProd' => [
				'strict'    => false,
				'charset'   => 'utf8',
				'driver'    => 'mysql',
				'prefix'    => 'healer_local',
				'collation' => 'utf8_unicode_ci',
				'host'      => env('DB_HOST'),
				'port'      => env('DB_PORT'),
				'database'  => env('DB_DATABASE'),
				'username'  => env('DB_USERNAME'),
				'password'  => env('DB_PASSWORD')
			],
		],

		'migrations' => 'migrations',
	];

<?php

	namespace Healer\Api\Providers;

		use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

		/**
		 * Class EventServiceProvider
		 *
		 * @package Healer\Api\Providers
		 * @author  James Kirkby <jkirkby@protonmail.ch>
		 */
		class EventServiceProvider extends ServiceProvider
		{
			/**
			 * The event listener mappings for the application.
			 *
			 * @var array
			 */
			protected $listen = [
				'Healer\Api\Events\SomeEvent' => [
					'Healer\Api\Listeners\EventListener',
				],
			];
		}

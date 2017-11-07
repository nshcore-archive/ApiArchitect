<?php

	namespace Healer\Api\Console;

	use Illuminate\Console\Scheduling\Schedule;
	use Laravel\Lumen\Console\Kernel as ConsoleKernel;

	/**
	 * Class Kernel
	 *
	 * @package Healer\Api\Console
	 * @author  James Kirkby <jkirkby@protonmail.ch>
	 */
	class Kernel extends ConsoleKernel
	{
		/**
		 * The Artisan commands provided by your application.
		 *
		 * @var array
		 */
		protected $commands = [
			//
		];

		/**
		 * Define the application's command schedule.
		 *
		 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
		 * @return void
		 */
		protected function schedule(Schedule $schedule)
		{
			//
		}
	}

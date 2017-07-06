<?php

	namespace App\Providers;

	use Illuminate\Support\ServiceProvider;

	/**
	 * Class HelperServiceProvider
	 *
	 * @package App\Providers
	 * @author  James Kirkby <jkirkby@protonmail.ch>
	 * @TODO abstract this into its own package
	 */
	class HelperServiceProvider extends ServiceProvider
	{


		/**
		 * Bootstrap the application services.
		 */
		public function boot()
		{
			//
		}

		/**
		 * Register the application services.
		 */
		public function register()
		{
			foreach (glob(realpath(__DIR__.'/../').'/Helpers/*.php') as $filename){
				require_once($filename);
			}
		}
	}
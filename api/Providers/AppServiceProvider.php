<?php

	namespace Healer\Api\Providers;

		use Illuminate\Support\ServiceProvider;
		use Illuminate\Filesystem\FilesystemManager as Filesystem;

		/**
		 * Class AppServiceProvider
		 *
		 * @package App\Providers
		 * @author  James Kirkby <jkirkby@protonmail.ch>
		 */
		class AppServiceProvider extends ServiceProvider
		{

			/**
			 * Register any application services.
			 *
			 * @return void
			 */
			public function register()
			{
				$this->registerConfigs();
				$this->bindContracts();
				$this->loadFilesystem();
				$this->registerServiceProviders();
				$this->registerMiddleware();
				$this->injectDependenciesToControllers();
			}

			public function registerConfigs()
			{
				$this->app->configure('app');
				$this->app->configure('jwt');
				$this->app->configure('auth');
				$this->app->configure('acl');
				$this->app->configure('cache');
				$this->app->configure('database');
				$this->app->configure('services');
				$this->app->configure('doctrine');
				$this->app->configure('filesystems');
				$this->app->configure('imagesecurity');
				$this->app->configure('lumendoctrine');
			}

			public function bindContracts()
			{
				//
			}

			public function loadFilesystem()
			{
				//bind the file illuminate system
				$this->app->singleton('filesystem', function ($app) {
					return $app->loadComponent('filesystems',\Illuminate\Filesystem\FilesystemServiceProvider::class,'filesystem');
				});

				//create an alias
				$this->app->alias('filesystem', 'Illuminate\Filesystem\FilesystemManager');
			}

			/**
			 * Register service Providers
			 */
			public function registerServiceProviders()
			{
				//Core Service providers
				$this->app->register(\ApiArchitect\Compass\Providers\CompassServiceProvider::class);
				$this->app->register(\ApiArchitect\Auth\Providers\AuthServiceProvider::class);
				//$this->app->register(\ApiArchitect\Log\Providers\LogServiceProvider::class);

				//local service providers
				if(getenv('APP_ENV') === 'local') {
					$this->app->register(\Appzcoder\LumenRoutesList\RoutesCommandServiceProvider::class);
				}
			}

			public function registerMiddleware()
			{
				//
			}

			/**
			 * Inject dependencies to controllers
			 */
			public function injectDependenciesToControllers()
			{
				//inject profile controller
//				$this->app->bind(\App\Http\Controllers\Travlr\Profiles\UserProfileController::class, function($app) {
//					return new \App\Http\Controllers\Travlr\Profiles\UserProfileController(
//						$app['em']->getRepository(\App\Entities\Travlr\Profiles\User::class),
//						new \App\Http\Transformers\Travlr\Profiles\UserProfileTransformer()
//					);
//				});
			}
		}

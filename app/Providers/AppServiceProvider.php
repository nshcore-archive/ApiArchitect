<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\FilesystemManager as Filesystem;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
 * @author James Kirkby <me@jameskirkby.com>
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
        $this->registerServiceProviders();
        $this->registerMiddleware();
        $this->injectControllerDependancies();
    }

    public function registerConfigs()
    {
        $this->app->configure('app');
        $this->app->configure('auth');
        $this->app->configure('jwt');
        $this->app->configure('database');
        $this->app->configure('lumendoctrine');
        $this->app->configure('doctrine');
        $this->app->configure('acl');
        $this->app->configure('cache');
        $this->app->configure('services');
    }

    /**
     * Inject dependencies to controllers
     */
    public function injectControllerDependancies()
    {
         $this->app->bind(\App\Http\Controllers\ExampleController::class, function($app) {
             return new \App\Http\Controllers\ExampleController(
                 $app['em']->getRepository(\App\Entities\ExampleEntity::class),
                 new \App\Http\Transformers\ExampleTransformer
             );
         });
    }

    public function bindContracts()
    {
        //bind entity contracts
        $this->app->bind(
            '\Jkirkby91\Boilers\NodeEntityBoiler\EntityContract',
            '\App\Entities\ExmapleEntity'
        );
    }

    /**
     * Register service Providers
     */
    public function registerServiceProviders()
    {
        // ApiArchitect providers
        $this->app->register(\ApiArchitect\Compass\Providers\CompassServiceProvider::class);
        $this->app->register(\ApiArchitect\Auth\Providers\AuthServiceProvider::class);
        $this->app->register(\ApiArchitect\Log\Providers\LogServiceProvider::class);

        // App Providers
        $this->app->register(\App\Providers\HelperServiceProvider::class);
        $this->app->register(\App\Providers\EventServiceProvider::class);

        // Repository Providers
        $this->app->register(\App\Providers\RepositoryProviders\ExampleEntityRepositoryServiceProvider::class);

        if(getenv('APP_ENV') === 'local') {
            $this->app->register(\Appzcoder\LumenRoutesList\RoutesCommandServiceProvider::class);
        }        
    }

    /**
     * Register middleware
     */
    public function registerMiddleware()
    {
        $this->app->middleware(\App\Http\Middleware\ExampleMiddleware::class);
    }    
}

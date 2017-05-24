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
        $this->injectTransformersToControllers();
        $this->registerServiceProviders();
        $this->bindContracts();
        $this->loadFilesystem();               
    }

    public function registerConfigs()
    {
        $this->app->configure('app');
        $this->app->configure('auth');
        $this->app->configure('jwt');
        $this->app->configure('filesystems');
        $this->app->configure('database');
        $this->app->configure('lumendoctrine');
        $this->app->configure('doctrine');
        $this->app->configure('acl');
        $this->app->configure('cache');
    }

    /**
     * Inject dependencies to controllers
     */
    public function injectTransformersToControllers()
    {

    }

    public function bindContracts()
    {
        //bind entity contracts
        $this->app->bind(
            '\Jkirkby91\Boilers\NodeEntityBoiler\EntityContract',
            '\App\Entities\HairCutter'
        );

        $this->app->bind(
            '\Jkirkby91\Boilers\NodeEntityBoiler\EntityContract',
            '\App\Entities\AggregateRating'
        );
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
        $this->app->register(\ApiArchitect\Compass\Providers\CompassServiceProvider::class);
        $this->app->register(\ApiArchitect\Auth\Providers\AuthServiceProvider::class);
        $this->app->register(\ApiArchitect\Log\Providers\LogServiceProvider::class);
        $this->app->register(\App\Providers\HelperServiceProvider::class);
        $this->app->register(\App\Providers\EventServiceProvider::class);

        if(getenv('APP_ENV') === 'local') {
            $this->app->register(\Appzcoder\LumenRoutesList\RoutesCommandServiceProvider::class);
        }        
    }
}

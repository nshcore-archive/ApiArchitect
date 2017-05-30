<?php

namespace App\Providers\RepositoryProviders;

use Illuminate\Support\ServiceProvider;

/**
 * Class ProviderRepositoryServiceProvider
 *
 * @package ApiArchitect\Auth\Providers
 * @author James Kirkby <me@jameskirkby.com>
 */
class ExampleEntityRepositoryServiceProvider extends ServiceProvider
{

    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind(\App\Repositories\ExampleEntityRepository::class, function($app) {
          // This is what Doctrine's EntityRepository needs in its constructor.
          return new \App\Repositories\ExampleEntityRepository(
              $app['em'],
              $app['em']->getClassMetaData(\App\Entities\ExampleEntity::class)
          );
      });
    }

    /**
     * Get the services provided by the provider since we are deferring load.
     *
     * @return array
     */
    public function provides()
    {
      return ['App\Repositories\ExampleEntityRepository'];
    }
}
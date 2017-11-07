<?php

	namespace Tests {

		use Illuminate\Support\Facades\App;
		use Illuminate\Support\Facades\Artisan;
		use Doctrine\Common\DataFixtures\Loader;
		use Doctrine\Common\DataFixtures\Purger\ORMPurger;
		use Doctrine\Common\DataFixtures\Executor\ORMExecutor;

		/**
		 * Class TestCase
		 *
		 * @author James Kirkby <jkirkby@protonmail.ch>
		 */
		abstract class TestCase extends \Laravel\Lumen\Testing\TestCase
		{

			/**
			 * @var
			 */
			private $em;

			/**
			 * @var
			 */
			private $loader;

			/**
			 * @var
			 */
			private $executor;

			/**
			 * TestCase constructor.
			 */
			public function __construct()
			{
				parent::__construct();
			}

			/**
			 * setUp()
			 */
			public function setUp()
			{
				parent::setUp();

				$this->em = App::make('Doctrine\ORM\EntityManagerInterface');
				$this->executor = new ORMExecutor($this->em, new ORMPurger);
				$this->loader = new Loader;
				$this->loader->addFixture(new \Tests\Fixtures);
				$this->executor->execute($this->loader->getFixtures());
			}

			/**
			 * Creates the application.
			 *
			 * @return \Laravel\Lumen\Application
			 */
			public function createApplication()
			{
				$app = require __DIR__ . '/../bootstrap/app.php';

				$app->withFacades(true, ['\Illuminate\Support\Facades\Artisan' => 'Artisan']);

				$app['config']->set('database.default',env('DB_CONNECTION'));

				Artisan::call('doctrine:schema:create');
//			Artisan::call('cache:clear');
//			Artisan::call('doctrine:schema:drop');
//			Artisan::call('doctrine:clear:metadata:cache');
//			Artisan::call('doctrine:clear:query:cache');
//			Artisan::call('doctrine:clear:result:cache');
//			Artisan::call('doctrine:generate:proxies');

				return $app;
			}

			/**
			 * tearDown()
			 */
			public function tearDown()
			{
				Artisan::call('doctrine:schema:drop');
				parent::tearDown();
			}
		}
	}
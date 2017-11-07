<?php

	namespace Tests\Integration {

		use Laravel\Lumen\Testing\DatabaseMigrations;
		use Laravel\Lumen\Testing\DatabaseTransactions;

		/**
		 * Class PingTest
		 *
		 * @author James Kirkby <jkirkby@protonmail.ch>
		 */
		class PingTest extends \Tests\TestCase
		{

			/**
			 * A basic test example.
			 *
			 * @return void
			 */
			public function testPing()
			{
				$this->get('/ping');
				$this->seeJson(['version' => '0.0.1']);
				$this->assertResponseStatus(200);
			}
		}
	}
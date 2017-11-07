<?php

	namespace Tests\Integration\Auth {

		use Laravel\Lumen\Testing\DatabaseMigrations;
		use Laravel\Lumen\Testing\DatabaseTransactions;

		/**
		 * Class LoginTest
		 *
		 * @author James Kirkby <jkirkby@protonmail.ch>
		 */
		class LoginTest extends \Tests\TestCase
		{

			/**
			 * setUp()
			 *
			 * Sets up the test environment.
			 */
			public function setUp()
			{
				parent::setUp();
			}

			/**
			 * testUserLogin()
			 */
			public function testUserLogin()
			{
				$this->post('/auth/login', [
					'email'		=> 'test@user.com',
					'password'  => '123321'
				]);

				// test we get a created header code
				$this->assertResponseStatus(200);

				// test we get json
				$this->seeJson();

				// test we see a status success in json
				$this->seeJsonContains([
					'status' => 'success'
				]);

				// test we have a role array
				$this->seeJsonContains([
					'roles'	=> ['user']
				]);

				// test out response firstname is what we sent
				$this->seeJsonContains([
					'firstName' => 'John'
				]);

				// test out response lastname is what we sent
				$this->seeJsonContains([
					'lastName' => 'Smith'
				]);

				// test out response email is what we sent
				$this->seeJsonContains([
					'email' => 'test@user.com'
				]);

				// test out response username is what we sent
				$this->seeJsonContains([
					'username' => 'testUser69'

				]);

				// test we have the correct expected response structure
				$this->seeJsonStructure([
					'status',
					'data' => [
						'uid',
						'avatar',
						'firstName',
						'lastName',
						'email',
						'username',
						'roles'
					],
					'meta' => [
						'token'
					],
				]);
			}

			/**
			 * testUserLoginPasswordFail()
			 */
			public function testUserLoginPasswordFail()
			{
				$this->post('/auth/login', [
					'email'    => 'test@user.com',
					'password' => '123'
				]);

				// test we get a created header code
				$this->assertResponseStatus(403);

				// test we get json
				$this->seeJson();
			}

			/**
			 * testUserLoginPasswordFail()
			 */
//			public function testUserLoginNotFoundFail()
//			{
//				$this->post('/auth/login', [
//					'email'    => 'khakjsdhkas@user.com',
//					'password' => '123321'
//				]);
//
//				// test we get a created header code
//				$this->assertResponseStatus(403);
//
//				// test we get json
//				$this->seeJson();
//			}


		}
	}

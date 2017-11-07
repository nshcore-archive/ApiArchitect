<?php

	namespace Tests\Integration\Auth {

		use Laravel\Lumen\Testing\DatabaseMigrations;
		use Laravel\Lumen\Testing\DatabaseTransactions;

		/**
		 * Class RegisterTest
		 *
		 * @author James Kirkby <jkirkby@protonmail.ch>
		 */
		class RegisterTest extends \Tests\TestCase
		{

			/**
			 * @var
			 */
			public $testUserEmail;

			/**
			 * @var
			 */
			public $testUserPassword;

			/**
			 * @var
			 */
			public $testUserUserName;

			/**
			 * @var
			 */
			public $testUserFirstName;

			/**
			 * @var
			 */
			public $testUserLastName;

			/**
			 * @var string
			 */
			public $alphabet = 'abcdefghilklmnopqrstuvwxyz';

			/**
			 * setUp()
			 *
			 * Sets up the test environment.
			 */
			public function setUp()
			{
				parent::setUp();
				$this->testUserEmail = str_shuffle($this->alphabet);
				$this->testUserPassword = str_shuffle($this->alphabet);
				$this->testUserUserName = str_shuffle($this->alphabet);
				$this->testUserFirstName = str_shuffle($this->alphabet);
				$this->testUserLastName = str_shuffle($this->alphabet);
			}

			/**
			 * testUserRegistration()
			 *
			 * Test a user can register
			 */
			public function testUserRegistration()
			{
				$this->post('/auth/register', [
					'firstName'			=> (string)$this->testUserFirstName,
					'lastName'			=> (string)$this->testUserLastName,
					'email'				=> (string)$this->testUserEmail.'@testemailservice.com',
					'username'			=> (string)$this->testUserUserName,
					'password'			=> (string)$this->testUserPassword,
					'passwordConfirm'	=> (string)$this->testUserPassword,
					'role'				=> 'user'
				]);

				// test we get a created header code
				$this->assertResponseStatus(201);

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
					'firstName' => (string)$this->testUserFirstName
				]);

				// test out response lastname is what we sent
				$this->seeJsonContains([
					'lastName' => (string)$this->testUserLastName
				]);

				// test out response email is what we sent
				$this->seeJsonContains([
					'email' => (string)$this->testUserEmail.'@testemailservice.com'
				]);

				// test out response username is what we sent
				$this->seeJsonContains([
					'username' => (string)$this->testUserUserName

				]);

				// test we have the correct expected response structure
				$this->seeJsonStructure([
					'status',
					'data'	=> [
						'uid',
						'avatar',
						'firstName',
						'lastName',
						'email',
						'username',
						'roles'
					],
					'meta'	=> [
						'token'
					],
				]);

				// test registrations have to have unique email
				$this->post('/auth/register', [
					'firstName'			=> (string)$this->testUserFirstName,
					'lastName'			=> (string)$this->testUserLastName,
					'email'				=> (string)$this->testUserEmail.'@testemailservice.com',
					'username'			=> str_shuffle($this->alphabet),
					'password'			=> (string)$this->testUserPassword,
					'passwordConfirm'	=> (string)$this->testUserPassword,
					'role'				=> 'user'
				]);

				$this->assertResponseStatus(422);

				// test registrations have to have unique username
				$this->post('/auth/register', [
					'firstName'			=> (string)$this->testUserFirstName,
					'lastName'			=> (string)$this->testUserLastName,
					'email'				=> (string)str_shuffle($this->alphabet).'@testemailservice.com',
					'username'			=> (string)$this->testUserUserName,
					'password'			=> (string)$this->testUserPassword,
					'passwordConfirm'	=> (string)$this->testUserPassword,
					'role'				=> 'user'
				]);

				$this->assertResponseStatus(422);
			}

			/**
			 * testUserRegistrationValidation()
			 * Test the validation rules for registration
			 */
			public function testUserRegistrationValidation()
			{
				// test firstName required
				$this->post('/auth/register', [
					'firstName'			=> null,
					'lastName'			=> (string)$this->testUserLastName,
					'email'				=> (string)$this->testUserEmail.'@testemailservice.com',
					'username'			=> (string)$this->testUserUserName,
					'password'			=> (string)$this->testUserPassword,
					'passwordConfirm'	=> (string)$this->testUserPassword,
					'role'				=> 'user'
				]);

				$this->assertResponseStatus(422);

				// test lastName required
				$this->post('/auth/register', [
					'firstName'			=> (string)$this->testUserFirstName,
					'lastName'			=> null,
					'email'				=> (string)$this->testUserEmail.'@testemailservice.com',
					'username'			=> (string)$this->testUserUserName,
					'password'			=> (string)$this->testUserPassword,
					'passwordConfirm'	=> (string)$this->testUserPassword,
					'role'				=> 'user'
				]);

				$this->assertResponseStatus(422);

				// test email required
				$this->post('/auth/register', [
					'firstName'			=> (string)$this->testUserFirstName,
					'lastName'			=> (string)$this->testUserLastName,
					'email'				=> null,
					'username'			=> (string)$this->testUserUserName,
					'password'			=> (string)$this->testUserPassword,
					'passwordConfirm'	=> (string)$this->testUserPassword,
					'role'				=> 'user'
				]);

				$this->assertResponseStatus(422);

				// test email format
				$this->post('/auth/register', [
					'firstName'			=> (string)$this->testUserFirstName,
					'lastName'			=> (string)$this->testUserLastName,
					'email'				=> (string)$this->testUserEmail,
					'username'			=> (string)$this->testUserUserName,
					'password'			=> (string)$this->testUserPassword,
					'passwordConfirm'	=> (string)$this->testUserPassword,
					'role'				=> 'user'
				]);

				$this->assertResponseStatus(422);

				// test username required
				$this->post('/auth/register', [
					'firstName'			=> (string)$this->testUserFirstName,
					'lastName'			=> (string)$this->testUserLastName,
					'email'				=> (string)$this->testUserEmail.'@testemailservice.com',
					'username'			=> null,
					'password'			=> (string)$this->testUserPassword,
					'passwordConfirm'	=> (string)$this->testUserPassword,
					'role'				=> 'user'
				]);

				$this->assertResponseStatus(422);

				// test password required
				$this->post('/auth/register', [
					'firstName'			=> (string)$this->testUserFirstName,
					'lastName'			=> (string)$this->testUserLastName,
					'email'				=> (string)$this->testUserEmail.'@testemailservice.com',
					'username'			=> (string)$this->testUserUserName,
					'password'			=> null,
					'passwordConfirm'	=> (string)$this->testUserPassword,
					'role'				=> 'user'
				]);

				$this->assertResponseStatus(422);

				// test password confirm required
				$this->post('/auth/register', [
					'firstName'			=> (string)$this->testUserFirstName,
					'lastName'			=> (string)$this->testUserLastName,
					'email'				=> (string)$this->testUserEmail.'@testemailservice.com',
					'username'			=> (string)$this->testUserUserName,
					'password'			=> (string)$this->testUserPassword,
					'passwordConfirm'	=> null,
					'role'				=> 'user'
				]);

				$this->assertResponseStatus(422);

				// test passwords are the same
				$this->post('/auth/register', [
					'firstName'			=> (string)$this->testUserFirstName,
					'lastName'			=> (string)$this->testUserLastName,
					'email'				=> (string)$this->testUserEmail.'@testemailservice.com',
					'username'			=> (string)$this->testUserUserName,
					'password'			=> str_shuffle($this->alphabet),
					'passwordConfirm'	=> str_shuffle($this->alphabet),
					'role'				=> 'user'
				]);

				$this->assertResponseStatus(422);

				// test role required
				$this->post('/auth/register', [
					'firstName'			=> (string)$this->testUserFirstName,
					'lastName'			=> (string)$this->testUserLastName,
					'email'				=> (string)$this->testUserEmail.'@testemailservice.com',
					'username'			=> (string)$this->testUserUserName,
					'password'			=> (string)$this->testUserPassword,
					'passwordConfirm'	=> (string)$this->testUserPassword,
					'role'				=> null
				]);

				$this->assertResponseStatus(422);
			}

		}
	}

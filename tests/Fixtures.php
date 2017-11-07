<?php

	/**
	 * Project: healerApi
	 *
	 * @author: James Kirkby <jkirkby@protonmail.ch>
	 * Copyright: Blacksands.Network
	 * File: Fixtures.php
	 * Date: 30/10/2017
	 * Time: 23:13
	 */

	namespace Tests {

		use ApiArchitect\Auth\Entities\User;
		use ApiArchitect\Auth\Entities\Role;
		use Doctrine\Common\Persistence\ObjectManager;
		use ApiArchitect\Auth\Entities\Social\Provider;
		use Doctrine\Common\DataFixtures\AbstractFixture;
		use Doctrine\Common\DataFixtures\FixtureInterface;

		/**
		 * Class Fixtures
		 *
		 * @package Tests
		 * @author  James Kirkby <jkirkby@protonmail.ch>
		 */
		class Fixtures extends AbstractFixture implements FixtureInterface
		{

			/**
			 * load()
			 * @param \Doctrine\Common\Persistence\ObjectManager $manager
			 *
			 * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
			 */
			public function load(ObjectManager $manager)
			{
				$roleEntity = new Role('user');
				$manager->persist($roleEntity);
				$manager->flush();

				try {
					$this->addReference('roles', $roleEntity);
				} catch (\BadMethodCallException $e) {
					var_dump($e->getMessage());
				}

				$providerEntity = new Provider('facebook');
				$manager->persist($providerEntity);
				$manager->flush();

				$userEntity = new User('test@user.com', 'John', 'Smith', 'testUser69');
				$userEntity->setPassword(app()->make('hash')->make('123321'));
				$userEntity->addRoles(
					$this->getReference('roles') // load the stored reference
				);
				$manager->persist($userEntity);
				$manager->flush();
			}
		}
	}
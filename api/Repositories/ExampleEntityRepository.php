<?php

	namespace Healer\Api\Repositories;

	use Jkirkby91\LumenDoctrineComponent\Repositories\LumenDoctrineEntityRepository;
	use Jkirkby91\Boilers\RepositoryBoiler\ResourceRepositoryContract;

	/**
	 * Class ExampleEntityRepository
	 *
	 * @package Healer\Api\Repositories
	 * @author  James Kirkby <jkirkby@protonmail.ch>
	 */
	class ExampleEntityRepository extends LumenDoctrineEntityRepository implements ResourceRepositoryContract
	{
		use \Jkirkby91\DoctrineRepositories\ResourceRepositoryTrait;
	}
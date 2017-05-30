<?php

namespace App\Repositories;

use Jkirkby91\LumenDoctrineComponent\Repositories\LumenDoctrineEntityRepository;
use Jkirkby91\Boilers\RepositoryBoiler\ResourceRepositoryContract;

/**
 * Class ProviderRepository
 *
 * @package App\Repositories
 * @author James Kirkby <jkirkby91@gmail.com>
 */
class ExampleEntityRepository extends LumenDoctrineEntityRepository implements ResourceRepositoryContract
{
    use \Jkirkby91\DoctrineRepositories\ResourceRepositoryTrait;
}
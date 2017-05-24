<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;
use Jkirkby91\Boilers\RestServerBoiler\TransformerContract;

/**
 * Class ExampleTransformer
 * @package App\Http\Transformers
 */
class ExampleTransformer extends TransformerAbstract implements TransformerContract
{
    /**
     * @param $array
     * @return array
     */
    public function transform($exampleEntity)
    {
        return [
            'id'            => (int)$exampleEntity->getId(),
            'name'          => $exampleEntity->getName(),
            'field'          => $exampleEntity->getfield()
        ];
    }
}
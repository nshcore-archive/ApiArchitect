<?php

	namespace App\Http\Transformers;

	use League\Fractal\AbstractTransformer;
	use Jkirkby91\Boilers\RestServerBoiler\TransformerContract;

	/**
	 * Class ExampleTransformer
	 *
	 * @package App\Http\Transformers
	 * @author  James Kirkby <jkirkby@protonmail.ch>
	 */
	class ExampleTransformer extends AbstractTransformer implements TransformerContract
	{
		/**
		 * transform()
		 * @param $exampleEntity
		 *
		 * @return array
		 */
		public function transform($exampleEntity)
		{
			return [
				'id'            => (int)$exampleEntity->getId(),
				'name'          => $exampleEntity->getName(),
				'field'         => $exampleEntity->getfield()
			];
		}
	}
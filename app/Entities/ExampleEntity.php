<?php

	namespace App\Entities;

	use Doctrine\ORM\Mapping as ORM;
	use ApiArchitect\Compass\Entities\AbstractResourceEntity;

	/**
	 * Class ExampleEntity
	 *
	 * @package App\Entities
	 * @author  James Kirkby <jkirkby@protonmail.ch>
	 */
	class ExampleEntity extends AbstractResourceEntity
	{
		/**
		 * @ORM\Column(type="string", length=299, nullable=false)
		 */
		protected $field;

		/**
		 * @param $name
		 */
		public function __construct($name)
		{
			$this->setName($name);
		}

		/**
		 * Gets the value of field.
		 *
		 * @return mixed
		 */
		public function getField()
		{
			return $this->field;
		}

		/**
		 * Sets the value of field.
		 *
		 * @param mixed $field the field
		 *
		 * @return self
		 */
		protected function setField($field)
		{
			$this->field = $field;

			return $this;
		}
	}
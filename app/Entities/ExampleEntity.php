<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineEntity;
use jkirkby91\Boilers\SchemaBoilers\SchemaContract;
/**
 * Class Thing
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <jkirkby91@gmail.com>
 *
 */
class ExampleEntity extends LumenDoctrineEntity implements SchemaContract
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
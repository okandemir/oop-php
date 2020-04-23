<?php


namespace Fridge\Goods;


abstract class Goods
{
    protected $name;
    protected $size;

    public function __construct($name, $size = 1)
    {
        $this->name = $name;
        $this->size = $size;
    }

    abstract protected function Update();

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }
}
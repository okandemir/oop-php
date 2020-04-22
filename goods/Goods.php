<?php


namespace Fridge\Goods;


abstract class Goods
{
    protected $name;
    protected $size;

    public function __construct($name, $size)
    {
        $this->name = $name;
        $this->size = $size;
    }

    abstract protected function Update();
}
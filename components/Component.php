<?php

namespace Fridge\Component;

use Fridge\Goods\Goods;

abstract class Component
{
    protected $id;
    protected $name;
    protected $limit;
    protected $goodsList;

    /**
     * Component constructor.
     *
     * @param string $name
     * @param int $limit
     * @param array $goods
     */
    public function __construct($name, $limit, $goods = [])
    {
        $this->name = $name;
        $this->limit = $limit;
        $this->goodsList = $goods;
    }

    /**
     * @param Goods $goods
     * @param int $count
     * @return mixed
     */
    public abstract function updateDetails($name, $limit = 1, $goods = []);


    public function getId(){
        return $this->id;
    }


    public function getGoodsList(){
        return $this->goodsList;
    }

    public function setGoodsList($goodsList){
        return $this->goodsList = $goodsList;
    }


    public function pushToGoodsList($goods){
        array_push($this->goodsList, $goods);
    }


    public function getName(){
        return $this->name;
    }


    public function getLimit(){
        return $this->limit;
    }
}
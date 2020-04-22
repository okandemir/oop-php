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

    /**
     * @param Goods $goods
     * @return mixed
     */
    public abstract function takeGoods($goods);

    /**
     * @param Goods $goods
     * @return mixed
     */
    public abstract function putGoods($goods);

}
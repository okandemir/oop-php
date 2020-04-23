<?php

namespace Fridge\Component;

use Fridge\Core\Fillable;
use Fridge\Core\ResponseTrait;
use Fridge\Goods\Goods;

class Shelf extends Component implements Fillable
{
    use ComponentTrait, ResponseTrait;

    /**
     * @param $name
     * @param int $limit
     * @param array $goods
     * @return mixed|void
     */
    public function updateDetails($name, $limit = 1, $goods = [])
    {
        // TODO: Implement updateDetails() method.
    }

    /**
     * @param Goods $goods
     * @return mixed|void
     */
    public function put($goods)
    {
        return $this->insert($goods);
    }


    /**
     * @param Goods $goods
     * @return mixed|void
     */
    public function take($goods)
    {
        return $this->remove($goods);
    }
}
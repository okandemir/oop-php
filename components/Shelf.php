<?php

namespace Fridge\Component;

use Fridge\Goods\Goods;

class Shelf extends Component
{
    use ComponentTrait;

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
    public function putGoods($goods)
    {
        $this->insert($goods);
    }


    /**
     * @param Goods $goods
     * @return mixed|void
     */
    public function takeGoods($goods)
    {
        $this->remove($goods);
    }
}
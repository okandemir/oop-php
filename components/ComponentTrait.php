<?php


namespace Fridge\Component;


use Fridge\Goods\Goods;

trait ComponentTrait
{

    /**
     * @param Goods $goods
     * @param int $count
     * @return void
     */
    public function remove($goods)
    {
        if (empty(!$this->goodsList)) {
            $isFound = false;
            foreach ($this->goodsList as $k => $value) {
                if (get_class($goods) == get_class($value)) {
                    unset($this->goodsList[$k]);
                    $isFound = true;
                    break;
                }
            }

            if (!$isFound) {
                return $this->sendResponse(false, "Bu ürün " . $goods->getName() . " dolapta bulunamadı!");
            }
            return $this->sendResponse(true, "Afiyet Olsun");
        } else {
            return $this->sendResponse(false, "Yeterli Miktarda " . $goods->name . " bulunmamaktadır.");
        }
    }

    /**
     * @param $goods
     * @param int $count
     * @return void
     */
    public function insert($goods)
    {
        if(count($this->getGoodsList()) != $this->limit){
            $this->pushToGoodsList($goods);
            return $this->sendResponse();
        }

        return $this->sendResponse(false, "Raf Zaten Dolu.");
    }
}
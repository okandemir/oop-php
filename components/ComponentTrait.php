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
            foreach ($this->goodsList as $k => $k) {
                if (get_class($goods) == get_class($k)) {
                    unset($this->goodsList[$k]);
                    $isFind = true;
                    break;
                }
            }

            if (!$isFound) {
                return $this->sendResponse(false, "Bu ürün dolapta" . $goods->name . " bulunamadı!");
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
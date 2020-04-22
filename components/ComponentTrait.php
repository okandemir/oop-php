<?php


namespace Fridge\Component;


use Fridge\Goods\Goods;

trait ComponentTrait
{
    /**
     * @param $goods
     * @param int $count
     * @return void
     */
    public function insert($goods)
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
                echo "Bu ürün " . $goods->name . " bulunamadı!";
            }
            echo "Afiyet Olsun!";
        } else {
            echo "Yeterli Miktarda " . $goods->name . " bulunmamaktadır.";
        }
    }

    /**
     * @param $goods
     * @param int $count
     * @return void
     */
    public function remove($goods)
    {
        if(count($this->goods) != $this->limit){

            array_push($this->goods, $goods);

        }else{
            echo "Raf Zaten Dolu.";
        }
    }
}
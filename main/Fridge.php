<?php

namespace Fridge\Main;

use Fridge\Component\Shelf;
use Fridge\Core\Fillable;
use Fridge\Core\ResponseTrait;
use Fridge\Constants\CommonConstant;
use Fridge\Goods\Goods;

class Fridge implements Fillable
{
    use ResponseTrait;

    private $shelfs;
    private $shelfLimit;
    private $doorClosed;
    private $state;
    private $goodsCount;

    public function __construct($shelfLimit = 3)
    {
        $this->doorClosed = true;
        $this->shelfs = [];
        $this->shelfLimit = $shelfLimit;
        $this->state = CommonConstant::COMPLETELY_EMPTY;
        $this->goodsCount = 0;
    }

    /**
     * @param string $name
     * @param int $limit
     * @param array $goods
     * @return array
     */
    public function addShelf($name, $limit, $goods = [])
    {
        if (count($this->shelfs) >= $this->shelfLimit) {
            return $this->sendResponse(false, "Dolabınızda yeni raf için yeterli alan bulunmamaktadır!");
        }

        if(count($goods) > $limit){
            return $this->sendResponse(false, "Eklenmek istenen ürün sayısı raf limitinden fazla olamaz!");
        }

        array_push($this->shelfs, new Shelf($name, $limit, $goods));
        $this->goodsCount += count($goods);
        $this->updateStatus(CommonConstant::ADD_BULK_SHELF);

        return $this->sendResponse(true, "Yeni Raf Oluşturuldu");

    }

    /**
     * @param Goods $goods
     * @return array
     */
    public function take($goods)
    {
        if ($this->goodsCount > 0 && count($this->shelfs) > 0) {
            foreach ($this->shelfs as $shelf) {
                if (count($shelf->getGoodsList()) > 0) {
                    $response = $shelf->take($goods);

                    if ($response['status']) {
                        $this->updateStatus(CommonConstant::TAKE);
                    }
                    return $response;
                }
            }
        } else {
            return $this->sendResponse(false, "Dolabınızda Yeterli Miktarda Ütün Bulunmamaktadır");
        }
    }

    /**
     * @param Goods $goods
     * @return array
     */
    public function put($goods)
    {
        if($this->state == CommonConstant::FULLY){
            return $this->sendResponse(false, "Dolapda Yeterli Alan Bulunmamaktadır!");
        }

        foreach ($this->shelfs as $shelf) {
            if (count($shelf->getGoodsList()) < $shelf->getLimit()) {
                $response = $shelf->put($goods);

                if ($response['status']) {
                    $this->updateStatus(CommonConstant::PUT);
                }
                return $response;
            }
        }
    }


    /**
     * Updates total goods count and fridge status
     *
     * @param string $type
     */
    public function updateStatus($type){

       $type == CommonConstant::TAKE
           ? $this->goodsCount--
           : (
               $type==CommonConstant::PUT
                ? $this->goodsCount++
                : 0
       );


        $count = 0;
        $limitCount = 0;
        foreach ($this->shelfs as $shelf) {
            $count += count($shelf->getGoodsList());
            $limitCount += $shelf->getLimit();
        }
        $this->goodsCount = $count;
        if ($limitCount == $this->goodsCount) {
            $this->state = CommonConstant::FULLY;
        } else if($this->goodsCount == 0){
            $this->state = CommonConstant::COMPLETELY_EMPTY;
        }else{
            $this->state = CommonConstant::PARTLY;
        }


    }


    public function getShelfs(){
        return $this->shelfs;
    }

    /**
     * @return int
     */
    public function getGoodsCount()
    {
        return $this->goodsCount;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
}
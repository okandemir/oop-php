<?php

namespace Fridge\Main;

use Fridge\Component\Shelf;

class Fridge
{
    use ResponseTrait;

    private $shelfs;
    private $shelfLimit;
    private $doorClosed;

    public function __construct($shelfLimit = 1)
    {
        $this->doorClosed = true;
        $this->shelfs = [];
        $this->shelfLimit = $shelfLimit;
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
            return $this->responseMessage(false, "Dolabınızda yeni raf için yeterli alan bulunmamaktadır!");
        }

        array_push($this->shelfs, new Shelf($name, $limit, $goods));
        return $this->sendResponse();

    }
}
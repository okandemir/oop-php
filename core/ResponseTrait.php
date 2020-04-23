<?php


namespace Fridge\Core;


trait ResponseTrait
{

    public $status;
    public $responseMessage;

    public function sendResponse($status = true, $responseMessage = "OK"){
        return [
            "status" => $status,
            "message" => $responseMessage
        ];
    }
}
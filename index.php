<?php
require_once "load.php";

use Fridge\Main\Fridge;
use Fridge\Goods\Cola;

runTest();

function runTest(){
    $line = "</br>";
    if(php_sapi_name()=="cli"){
        $line = "\n";
    }

    $fridge = new Fridge();
    $mockData = json_decode(file_get_contents("data/mock.json"), true);
    foreach ($mockData["shelfs"] as $shelf){
        $goods = [];
        while($shelf["goodsCount"] > 0){
            $goods[] = new Cola("Cola".$shelf["goodsCount"]);
            $shelf["goodsCount"]--;
        }
        $response = $fridge->addShelf($shelf["name"], $shelf["limit"], $goods);
        if(!$response["status"]){
            echo $response["message"];
            exit();
        }
    }

    fridgeDetails($fridge, $line);

    $cola = new Cola("test");
    $response = $fridge->put($cola);
    if (!$response["status"]){
        echo $line.$line.$response["message"].$line;
    }else{
        fridgeDetails($fridge, $line);
    }

    $response = $fridge->put($cola);
    if (!$response["status"]){
        echo $line.$line.$response["message"].$line;
    }else{
        fridgeDetails($fridge, $line);
    }

    $response = $fridge->take($cola);
    if (!$response["status"]){
        echo $line.$line.$response["message"].$line;
    }else{
        fridgeDetails($fridge, $line);
    }


    $response = $fridge->take($cola);
    if (!$response["status"]){
        echo $line.$line.$response["message"].$line;
    }else{
        fridgeDetails($fridge, $line);
    }
}

function fridgeDetails($fridge, $line){
    echo $line."##############################".$line;
    echo $line." - DOLAP DURUMU - ".$line;
    echo $line;
    echo " # Doluluk Oranı: ".$fridge->getState();

    foreach ($fridge->getShelfs() as $shelf){
        echo $line;
        echo $line." # ".$shelf->getName();
        echo $line."Limit :".$shelf->getLimit();
        echo $line."Stok Adedi: ".count($shelf->getGoodsList());

    }
    echo $line.$line."##############################".$line;
}



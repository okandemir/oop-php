<?php
require_once "load.php";

use Fridge\Main\Fridge;
use Fridge\Goods\Cola;
/*
 *
 *
 * Tek çeşit kutu içecek (Örneğin: 33cl kutu kola) alabilen bir meşrubat dolabı dizaynı yapınız. Dolap 3 raftan oluşmakta ve her raf 20 adet kutu içecek alabilmektedir.
 *
 * Dolaptan aynı anda sadece 1 adet kutu içecek alınabilir veya koyulabilir.
 * Dolabın kapısı açık ya da kapalı olabilir.
 * Dolap tamamen boş, kısmen dolu veya tamamen dolu durumlarından birinde olabilir.
 * Dolabın boş alan kontrolünü yapabilmesi ve dolduğunda daha fazla kutu eklenmemesi gerekmektedir.
 *
 *
 * */

runTest();

function runTest(){
    $fridge = new Fridge();
    $mockData = json_decode(file_get_contents("data/mock.json"), true);
    foreach ($mockData["shelfs"] as $shelf){
        $goods = [];
        while($shelf["goodsCount"] == 0){
            $goods[] = new Cola("Cola".$shelf["goodsCount"]);
            $shelf["goodsCount"]--;
        }
        $response = $fridge->addShelf($shelf["name"], $shelf["limit"], $goods);
        if(!$response["status"]){
            echo $response["message"];
            break;
        }
    }
}




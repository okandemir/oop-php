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


$fridge = new Fridge();

$fridge->addShelf("first", 20, []);
$fridge->addShelf("second", 20, []);
$fridge->addShelf("third", 20, []);

$cola = new Cola("test");
$fridge->put($cola);

echo $fridge->getGoodsCount();
//public function runTest();


<?php

require_once "objects/Component.php";

use Fridge\Object\Component;
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
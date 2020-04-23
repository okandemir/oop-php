<?php
define('__ROOT__', dirname(__FILE__));
$indexes = [
    "constants" => [
        "CommonConstant.php"
    ],
    "core" => [
        "ResponseTrait.php",
        "Fillable.php"
    ],
    "goods" => [
        "Goods.php",
        "Cola.php"
    ],
    "components" => [
        "ComponentTrait.php",
        "Component.php",
        "Shelf.php"
    ],
    "main" => [
        "Fridge.php"
    ]
];

foreach ($indexes as $k => $subIndex) {

    foreach ($subIndex as $index) {

        $path = __ROOT__ . '/' . $k . '/' . $index;
        //echo $path."</br>";
        if (is_file($path)) {
            require_once $path;
        }
    }


}
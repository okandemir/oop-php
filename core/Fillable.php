<?php


namespace Fridge\Core;


interface Fillable
{
    public function take($object);
    public function put($object);
}
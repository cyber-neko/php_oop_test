<?php

abstract class Car
{
    //名前
    public $name;
    //価格
    private $price;
    //乗組員
    private $passenger;
    //加速力 秒メートル
    private $acceleration;

    //アクセルを踏む
    abstract public function accelerate($distance);
    //ブレーキを踏む
    abstract public function brake();
}

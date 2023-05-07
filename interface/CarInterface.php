<?php
interface CarInterface
{
    //価格
    public $price;
    //人数
    public $passenger;
    //加速力 秒メートル
    public $acceleration;
    //アクセルを踏む
    public function accelerate();
    //ブレーキを踏む
    public function brake();
}

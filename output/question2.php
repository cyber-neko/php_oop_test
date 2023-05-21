<?php
require 'Car.php';
require 'Ferrari.php';
require 'constant/CarConstants.php';

$ferrari = new Ferrari();
echo 'リフトアップ前の車高： ' . $ferrari->get_height() . 'mm, ' .
    'リフトアップ前の加速力： ' . $ferrari->get_acceleration() . "m/s\n";

$ferrari->liftDown();

$ferrari->liftUp(20);
echo  '20mmリフトアップ後の車高: ' . $ferrari->get_height() . 'mm, ' .
    '20mmリフトアップ後の加速力: ' . $ferrari->get_acceleration() . "m/s\n";

$ferrari->liftUp(20);
echo  '40mmリフトアップ後の車高: ' . $ferrari->get_height() . 'mm, ' .
    '40mmリフトアップ後の加速力: ' . $ferrari->get_acceleration() . "m/s\n";

$ferrari->liftDown();
echo 'リフトダウン後の車高： ' . $ferrari->get_height() . 'mm, ' .
    'リフトダウン後の加速力： ' . $ferrari->get_acceleration() . "m/s\n";

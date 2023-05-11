<?php
    require 'Car.php';
    require 'Ferrari.php';
    require 'constant/CarConstants.php';

    $ferrari = new Ferrari();
    echo 'リフトアップ前の加速力： ';
    print_r($ferrari->get_acceleration());
    echo PHP_EOL;
    $ferrari->liftUp();
    echo 'リフトアップ後の加速力： ';
    print_r($ferrari->get_acceleration());

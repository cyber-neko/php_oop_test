<?php
    require 'Car.php';
    require 'Honda.php';
    require 'Nissan.php';
    require 'Ferrari.php';
    require 'constant/CarConstants.php';

    $honda = new Honda();
    $nissan = new Nissan();
    $ferrari = new Ferrari();
    print_r($honda);
    print_r($nissan);
    print_r($ferrari);

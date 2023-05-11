<?php
    require 'Car.php';
    require 'Honda.php';
    require 'Nissan.php';
    require 'Ferrari.php';
    require 'constant/CarConstants.php';

    $nissan_stable = new Nissan();
    $nissan_defected = new Nissan(has_defect: true);
    $nissan_passenger_5 = new Nissan(passenger: 5);

    echo "Nissan1 良品 乗組員: " . $nissan_stable->get_passenger() .
        "\n加速力" . $nissan_stable->get_acceleration() . "\n";
    echo "Nissan2 欠陥品 乗組員: " . $nissan_defected->get_passenger() .
        "\n加速力" . $nissan_defected->get_acceleration() . "\n";
    echo "Nissan3 良品 乗組員: " . $nissan_passenger_5->get_passenger() .
        "\n加速力" . $nissan_passenger_5->get_acceleration() . "\n";

    $honda = new Honda();
    $honda_passeger_8 = new Honda(passenger: 8);

    echo "Honda1 乗組員: " . $honda->get_passenger() .
        "\n加速力" . $honda->get_acceleration() . "\n";
    echo "Honda2 乗組員: " . $honda_passeger_8->get_passenger() .
        "\n加速力" . $honda_passeger_8->get_acceleration() . "\n";

    $ferrari = new Ferrari();
    $ferrari_passenger_3 = new Ferrari(passenger: 3);

    echo "ferrari1 乗組員: " . $ferrari->get_passenger() .
        "\n加速力" . $ferrari->get_acceleration() . "\n";
    echo "ferrar2 乗組員: " . $ferrari_passenger_3->get_passenger() .
        "\n加速力" . $ferrari_passenger_3->get_acceleration() . "\n";

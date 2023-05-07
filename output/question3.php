<<?php
    require 'Car.php';
    require 'Honda.php';
    require 'Nissan.php';
    require 'Ferrari.php';
    require 'constant/CarConstants.php';


    calculate_total_and_average_car_price('Honda');
    calculate_total_and_average_car_price('Nissan');
    calculate_total_and_average_car_price('Ferrari');

    function calculate_total_and_average_car_price($car_name)
    {
        $production_number = rand(10, 50);
        $total_price = 0;
        $average_price = 0;
        for ($i = 0; $i < $production_number; $i++) {
            $total_price += calculate_car_price($car_name);
        }
        $average_price = intval($total_price / $production_number);
        echo $car_name . 'の生産台数は' . $production_number . "です。\n"
            . $car_name . "の合計金額は" . $total_price . "円です。\n"
            . $car_name . "Nissanの平均金額は" . $average_price . "円です。\n\n";
    }

    function calculate_car_price($car_name)
    {
        switch ($car_name) {
            case 'Honda':
                $price = rand(MIN_HONDA_PRICE, MAX_HONDA_PRICE);
                $honda = new Honda($price);
                return $honda->get_price();
            case 'Nissan':
                $price = rand(MIN_CAR_PRICE, MAX_NISSAN_PRICE);
                $nissan = new Nissan($price);
                return $nissan->get_price();
            case 'Ferrari':
                $price = rand(MIN_FERRARI_PRICE, MAX_CAR_PRICE);
                $ferrari = new Ferrari($price);
                return $ferrari->get_price();
        }
    }
    ?>
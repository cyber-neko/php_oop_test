<?php
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
        $total_price += get_car_price($car_name);
    }
    $average_price = intval($total_price / $production_number);
    echo $car_name . 'の生産台数は' . $production_number . "です。\n"
        . $car_name . "の合計金額は" . $total_price . "円です。\n"
        . $car_name . "Nissanの平均金額は" . $average_price . "円です。\n\n";
}

function get_car_price($car_name)
{
    $car = produce_car($car_name);
    return $car->get_price();
}

function produce_car($car_name)
{
    switch ($car_name) {
        case 'Honda':
            $price = rand(MIN_HONDA_PRICE, MAX_HONDA_PRICE);
            return new Honda(price: $price);
        case 'Nissan':
            $price = rand(MIN_CAR_PRICE, MAX_NISSAN_PRICE);
            return  new Nissan(price: $price);
        case 'Ferrari':
            $price = rand(MIN_FERRARI_PRICE, MAX_CAR_PRICE);
            return new Ferrari(price: $price);
    }
}

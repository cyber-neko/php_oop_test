<?php
require 'Car.php';
require 'Honda.php';
require 'Nissan.php';
require 'Ferrari.php';
require 'constant/CarConstants.php';

$honda = new Honda();
$nissan = new Nissan();
$ferrari = new Ferrari();

function output(Car $car)
{
    echo $car->name . 'の価格は' . $car->get_price() . '円です。定員数は' .
        $car->get_passenger() . '人です。加速力は' . $car->get_acceleration() . "m/sです。\n";
}

output($honda);
output($nissan);
output($ferrari);

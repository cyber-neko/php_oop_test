<?php

class Toyota extends Car
{
    public $name = 'Toyota';

    private $price;

    private $passenger;

    private $acceleration;

    public function __construct(
        $price = MIN_TOYOTA_PRICE,
        $passenger = MIN_TOYOTA_PASSENGER
    ) {
        $this->validate_parameter($price, $passenger);
        $this->price = $price;
        $this->passenger = $passenger;
        $this->adjust_acceleration();
    }

    private function validate_parameter($price, $passenger)
    {
        if ($price < MIN_TOYOTA_PRICE || $price > MAX_TOYOTA_PRICE) {
            throw new Exception('Toyotaの価格設定の範囲外です');
        }
        if ($passenger < MIN_TOYOTA_PASSENGER || $passenger > MAX_TOYOTA_PASSENGER) {
            throw new Exception('Toyotaの定員数の範囲外です');
        }
    }

    public function adjust_acceleration()
    {
        $this->acceleration = intVal($this->price /= 100000);
    }

    public function accelerate($distance)
    {
        return intVal($distance - $this->acceleration);
    }

    public function brake()
    {
        // blank
    }

    public function get_price()
    {
        return $this->price;
    }

    public function get_passenger()
    {
        return $this->passenger;
    }

    public function get_acceleration()
    {
        return $this->acceleration;
    }

    public function __debugInfo()
    {
        return [
            'price' => $this->price,
            'passenger' => $this->passenger,
            'acceleration' => $this->acceleration,
        ];
    }
}

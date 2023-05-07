<?php

class Honda extends Car
{
    public $name = 'Honda';

    private $price;

    private $passenger;

    private $acceleration;

    public function __construct(
        $price = MIN_HONDA_PRICE,
        $passenger = MIN_HONDA_PASSENGER,
        $acceleration = MIN_CAR_ACCELERATION
    ) {
        $this->validate_parameter($price, $passenger, $acceleration);
        $this->price = $price;
        $this->passenger = $passenger;
        $this->acceleration = $acceleration;
        $this->adjust_acceleration();
    }

    private function validate_parameter($price, $passenger, $acceleration)
    {
        if ($price < MAX_NISSAN_PRICE || $price >= MIN_FERRARI_PRICE) {
            throw new Exception('Hondaの価格設定の範囲外です');
        }
        if ($passenger < MIN_HONDA_PASSENGER || $passenger > MAX_CAR_PASSENGER) {
            throw new Exception('Hondaの定員数の範囲外です');
        }
        if ($acceleration < MIN_CAR_ACCELERATION || $acceleration >= MIN_FERRARI_ACCELERATION) {
            throw new Exception('Hondaの加速力の範囲外です');
        }
    }

    public function adjust_acceleration()
    {
        $this->acceleration -= ($this->acceleration * $this->passenger * 0.05);
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

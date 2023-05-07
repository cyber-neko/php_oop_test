<?php

class Ferrari extends Car
{
    public $name = 'Ferrari';

    private $price;

    private $passenger;

    private $acceleration;

    private $default_acceleration;

    private $height = 0;

    public function __construct(
        $price = MIN_FERRARI_PRICE,
        $passenger = MIN_CAR_PASSENGER,
        $acceleration = MIN_FERRARI_ACCELERATION
    ) {
        $this->validate_parameter($price, $passenger, $acceleration);
        $this->price = $price;
        $this->passenger = $passenger;
        $this->acceleration = $acceleration;
        $this->default_acceleration = $acceleration;
        $this->adjust_acceleration();
    }

    private function validate_parameter($price, $passenger, $acceleration)
    {
        if ($price < MIN_FERRARI_PRICE || $price >= MAX_CAR_PRICE) {
            throw new Exception('Ferrariの価格の範囲外です');
        }
        if ($passenger < MIN_CAR_PASSENGER || $passenger > MAX_FERRARI_PASSENGER) {
            throw new Exception('Ferrariの定員数の範囲外です');
        }
        if ($acceleration < MIN_FERRARI_ACCELERATION || $acceleration > MAX_CAR_ACCELERATION) {
            throw new Exception('Ferrariの加速力の範囲外です');
        }
    }

    public function adjust_acceleration()
    {
        $this->acceleration -= ($this->acceleration * $this->passenger * 0.05);
    }

    public function liftUp()
    {
        $this->height += 40;
        $this->acceleration *= 0.8;
    }

    public function liftDown()
    {
        $this->height = 0;
        $this->acceleration = $this->default_acceleration;
    }

    public function accelerate($distance)
    {
        return intVal($distance - $this->acceleration);
    }

    public function brake()
    {
        // blank
    }

    public function getFrontHeight()
    {
        return $this->height;
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

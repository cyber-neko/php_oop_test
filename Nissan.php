<?php

class Nissan extends Car
{
    public $name = 'Nissan';

    private $price;

    private $passenger;

    private $acceleration;

    private $has_defect;

    public function __construct(
        $price = MIN_CAR_PRICE,
        $passenger = MIN_NISSAN_PASSENGER,
        $acceleration = MIN_CAR_ACCELERATION,
        $has_defect = false
    ) {
        $this->validate_parameter($price, $passenger, $acceleration);
        $this->price = $price;
        $this->has_defect = $has_defect;
        $this->acceleration = $acceleration;
        $this->passenger = $passenger;
        $this->adjust_acceleration();
    }

    private function validate_parameter($price, $passenger, $acceleration)
    {
        if ($price < MIN_CAR_PRICE || $price > MAX_NISSAN_PRICE) {
            throw new Exception('NISSANの価格設定の範囲外です');
        }
        if ($passenger < MIN_NISSAN_PASSENGER || $passenger > MAX_NISSAN_PASSENGER) {
            throw new Exception('NISSANの定員数の範囲外です');
        }
        if ($acceleration < MIN_CAR_ACCELERATION || $acceleration >= MIN_FERRARI_ACCELERATION) {
            throw new Exception('NISSANの加速力の範囲外です');
        }
    }

    public function adjust_acceleration()
    {
        if ($this->has_defect) {
            $this->acceleration *= 0.6;
        }
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

    public function get_has_defect()
    {
        return $this->has_defect;
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

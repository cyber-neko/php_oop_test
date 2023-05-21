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
        $this->default_acceleration = $this->acceleration;
    }

    public function liftUp($height)
    {
        if ($height > 40) {
            echo '車高は40mmまでしか上げれません。';
            return;
        }
        switch ($newHeight = $this->height + $height) {
            case ($newHeight >= 40):
                $this->height = 40;
                $this->acceleration = $this->default_acceleration * 0.8;
                echo '車高を' . $this->height  . "mmにしました。\n";
                break;
            case ($newHeight >= 20):
                $this->height = $newHeight;
                $this->acceleration = $this->default_acceleration * 0.9;
                echo '車高を' . $this->height  . "mmにしました。\n";
                break;
            default:
                echo '車高を' . $this->height  . "mmにしました。\n";
        }
    }

    public function liftDown()
    {
        if ($this->height === 0) {
            echo "リフトアップしていないのでリフトダウンすることはできません。\n";
            return;
        }
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

    public function get_Height()
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

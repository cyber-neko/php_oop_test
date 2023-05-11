<?php
    require 'Car.php';
    require 'Honda.php';
    require 'Nissan.php';
    require 'Ferrari.php';
    require 'Toyota.php';
    require 'constant/CarConstants.php';

    start_race();

    function start_race()
    {
        $honda = new Honda();
        $nissan = new Nissan();
        $ferrari = new Ferrari();
        $toyota = new Toyota();

        $honda_result = calculate_time($honda);
        $nissan_result = calculate_time($nissan);
        $ferrari_result = calculate_time($ferrari);
        $toyota_result = calculate_time($toyota);
        $result = array(
            $honda_result,
            $nissan_result,
            $ferrari_result,
            $toyota_result
        );
        show_result($result);
    }

    function calculate_time(Car $car)
    {
        $distance = 1000;
        $seconds = 0;
        while ($distance > 0) {
            if (mt_rand() / mt_getrandmax() < 0.2) {
                $car->brake();
            } else {
                $distance = $car->accelerate($distance);
            }
            $seconds++;
        }
        echo $car->name . "のタイムは" . $seconds . "秒でした。\n";
        return [$car->name, $seconds];
    }

    function show_result($result)
    {
        /** 
         * usort() は配列をソートするための関数で、要素を比較する
         * 等しい場合には0
         * 第１引数が小さい場合は-1
         * 第2引数が大きい場合は1
         * を返却する。-1だった場合に要素を入れ替える。
         * */
        usort($result, function ($front, $behind) {
            return $front[1] - $behind[1];
        });
        echo '1位は' . $result[0][0] . "\n2位は" . $result[1][0]
            . "\n3位は" . $result[2][0] . "\n4位は" . $result[3][0];
    }

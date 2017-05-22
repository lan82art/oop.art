<?php

class CarAuto
{
    public $color = 'blue';
    public $width = 400;

    const RTY = 4;

    public function ololo($marka = 'AUDI'){

        return '<p> Это класс машина '.$marka.' Цвет: '.$this->color.' Колес: ' .self::RTY. ' </p>';
    }

    public function w($method = 'ololo'){
        return $this->$method();
    }

    public function e()
    {
        return 'Hello';
    }
}
/*Вызвать свойство класса color, статик пользовтаь нельзя*/

$car = new CarAuto;
$car->color = 'red';
echo $car->color . '<br />';
echo $car->width;

echo $car->w();

//var_dump($car);

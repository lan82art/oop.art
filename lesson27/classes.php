<?php
/*
 * Интернет-казино. Пользователь (игрок) начинает игру с суммой в 10000 $.
 * С такой же суммой начинает игру казино.
 * Игрок делает ставку (100<=n<=1000) и загадывает число в промежутке от 1 до 100.
 * Скрипт «вращает рулетку» – генерирует случайное число в промежутке от 1 до 100.
 * Если разница между числом игрока и случайным числом меньше либо равна 10, то игрок
 *  получает сумму, равную удвоенной ставке.
 * Если разница больше 10, но меньше либо равна 20, то игрок получает сумму, равную ставке.
 * Во всех остальных случаях игрок проигрывает сумму, равную ставке.
 * Игра продолжается до тех пор, пока у игрока или казино не закончатся деньги.
 * Вся игра происходит в пределах одной страницы.
 * На странице должны быть предусмотрены поля ввода ставки и числа, кнопка «вращения рулетки».
 * Также должны отображаться текущие суммы игрока и казино.
 * После нажатия кнопки на страницу выводится случайное число и сообщение о проигрыше или выигрыше
 * игрока, либо сообщение о некорректном вводе числа или ставки.
 * */

Class Casino {

    public $min_rate = 100;
    public $max_rate = 1000;

    public $min_number = 1;
    public $max_number = 100;

    public function startGame($amounts){
        if(!isset($amounts) ){
            return array('player'=>10000,'casino'=>10000);
        }
    }

    public function validate_input($rate,$number){
        if($rate>=$this->min_rate && $rate<=$this->max_rate && $number>=$this->min_number && $number<=$this->max_number){
           return true;
        } else return false;
    }

    public function rate($amounts,$rate){
        $amounts['player'] = $amounts['player'] - $rate;
        return $amounts;
    }

    public function generate($min,$max){

        return rand($min,$max);
    }

    public function deside($amounts,$genNumber,$rate,$number){

        if (abs($genNumber - $number) <= 10){
            $amounts['player'] = $amounts['player'] + $rate * 2;
            $amounts['casino'] = $amounts['casino'] - $rate;
        } elseif (abs($genNumber - $number) <= 20){
            $amounts['player'] = $amounts['player']  + $rate;
        } else {$amounts['casino'] = $amounts['casino'] + $rate;}
        return $amounts;
    }

    public function spectrator($amounts){
        if($amounts['player'] < 0) {
            return 'Casino';
        } elseif ($amounts['casino'] < 0) {
            return 'Player';
        } else return '';
    }
}
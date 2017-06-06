<?php
date_default_timezone_set('UTC'+2);

/*Сделайте класс для работы с датами.
Класс должен уметь находить разницу между двумя датами, принимать дату в sql-формате, а возвращать
в заданном, принимать дату в формате '31.12.2013', а возвращать в заданном.

Также класс должен должен определять текущий день недели и месяц (словом, по-русски)
и иметь для этого соответствующие методы.

Класс должен иметь public свойство today,
в котором хранится текущая дата (заполняется в __construct).

Класс должен иметь public свойство weekday, в котором хранится текущий
день недели (по-русски).

Класс должен иметь public свойство month, в котором хранится текущий месяц
(по-русски). Класс должен иметь и использовать private метод, который принимает количество секунд $num,
а возращает массив, в котором содержится количество лет, месяцев, дней, часов, минут, секунд в $num.
Добавьте также несколько методов на свой вкус.
*/
class Datawork{

    public $days = array('Понедельник','Вторник','Среда','Четверг','Пятница','Суббота','Воскресенье');
    public $months = array('Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек');

    public $today;
    public $weekday;
    public $month;

    public function __construct(){
        $this->today = date('d-m-Y');
        $this->weekday = $this->weekDay();
        $this->month = $this->month();
    }

    public function convert($data){

        $str = str_replace(".","-",$data);
        $str = str_replace("/","-",$str);

        return $str;

    }

    public function weekDay(){
        return 'Сегодня день недели:&nbsp;&nbsp;'.$this->days[date('w')-1];

    }
    public function month(){
        return 'Сегодня месяц:&nbsp;&nbsp;'.$this->months[(int)date('m')-1];

    }

    function time_elapsed($secs){

        $bit = array(
            'year' => $secs / 31556926 % 12,
            'week' => $secs / 604800 % 52,
            'day'  => $secs / 86400 % 7,
            'hour' => $secs / 3600 % 24,
            'minute' => $secs / 60 % 60,
            'second' => $secs % 60
        );

        return $bit;
    }

}

$data = new Datawork();
echo $data->today.'<br/>';
echo $data->weekday.'<br/>';
echo $data->month.'<br/>';

echo $data->convert('31.12.2005').'<br />';
//$nowtime = time();
//echo $data->time_elapsed($nowtime -1496423699).'<br />';
//$dat = $data->time_elapsed(1496423699);
//var_dump($dat);
echo date('U','31.12.2005');




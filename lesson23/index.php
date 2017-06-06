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
(по-русски).

Класс должен иметь и использовать private метод, который принимает количество секунд $num,
а возращает массив, в котором содержится количество лет, месяцев, дней, часов, минут, секунд в $num.

Добавьте также несколько методов на свой вкус.
*/
class Datawork{

    protected $days = array('Понедельник','Вторник','Среда','Четверг','Пятница','Суббота','Воскресенье');
    protected $months = array('Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек');

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

        //list($date, $time) = explode(" ", $str);
        list($day, $month, $year) = explode("-", $str);
        //list($hour, $minute, $second) = explode(":", $time);
        //$dat = mktime($hour, $minute, $second, $month, $day, $year);
        $dat = mktime(0,0,0,$month, $day, $year);

        return $dat;
    }

    public function weekDay(){
        return 'Сегодня день недели:&nbsp;&nbsp;'.$this->days[date('w')-1];

    }
    public function month(){
        return 'Сегодня месяц:&nbsp;&nbsp;'.$this->months[(int)date('m')-1];

    }

    function time_elapsed($secs){

        $bit = array(
            'year' => ($secs / 31536000) + 1970,
            'month' => ($secs / 2592000 % 12),
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

echo $dat = $data->convert('02.03.2016').'<br />';


$datasec = $data ->time_elapsed('1457009620');
echo 'year '.(int)$datasec['year'].'<br />';
echo 'month '.(int)$datasec['month'].'<br />';
echo 'week '.(int)$datasec['week'].'<br />';
echo 'day '.(int)$datasec['day'].'<br />';
echo 'hour '.(int)$datasec['hour'].'<br />';
echo 'minute '.(int)$datasec['minute'].'<br />';
echo 'seconds '.(int)$datasec['seconds'].'<br />';



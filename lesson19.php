<?php
/*
class Transport {
    public $body;
    public $helm;
    public $wheels;
    public $speed;
    const QWE = 23;

    function __construct(){
        echo 'This is class '. __CLASS__.'<br />';
    }

    public function easytime($distance){
        $time = $distance / $this->speed;
        return $time;
    }
}

class Auto extends Transport{
    /*function __construct(){
        echo 'This is class '. __CLASS__.'<br />';
    }

}

class Velo extends Auto{
    public $num = 5;

    function __construct(){
        echo 'This is class '. __CLASS__.'<br />';
    }

    public function easytime($distance){
        return parent::easytime($distance) * 1.3;
    }
    public function q(){
        return 'Hello'.$this->num;
    }

    public function w(){
        return $this->q();
    }
}*/

/*$transport = new Transport;
echo '<br />';
//echo $transport->easytime(100);
echo '<br />';
$transport2 = new Transport;
echo '<br />';
//echo $transport2->easytime(100);*/
//$auto = new Auto();
//$auto->speed = 80;
//echo $auto->easytime(320);
//echo '<br />';
//$velo = new Velo();
//$velo->speed = 10;
//echo $velo->easytime(50);
//echo '<br />';
//echo $velo->w();
/*
$tr = new Transport();
$au = new Auto();
$vel = new Velo();*/


class Incap{
    public $a = 'public';// доступно везде
    protected $b = 'protected'; //доступен в своем классе и в наследниках
    private $c = 'private'; //доступен только в своем классе, не наследуется

    /**
 * @return string
 */
    public function b()
    {
        return $this->b;
    }
    public function c()
    {
        return $this->c;
    }
}
class A extends Incap{

}
$incap = new Incap();
echo $incap->a;
echo '<br/>';
echo $incap->b();
echo '<br/>';
echo $incap->c();
echo '<br/>';
<?php
require_once 'db.php';

class City extends Db {

    public $cities = array();

    public function cityList(){

        $result = $this->sql("SELECT * FROM towns");
        while ($cit[]=mysqli_fetch_assoc($result)){
            $this->cities = $cit;
        }
        return $this->cities;
    }

    public function deleteCity($session,$id){
        foreach ($session as $value){
            if($value['id'] != $id){
                $new_session[] = $value;
            }
        }
        $_SESSION['cities'] = $new_session;
    return true;
    }
}

class Validation {

    protected $letters = array('ь','ъ','ы','й');
    protected $encoding = 'utf-8';

    public function getCityName($session,$selected){
        foreach ($session as $value){
            if($value['id'] == $selected){
                $word = $value['city'];
            }
        }
        return $word;
    }

    protected function findFirstLetter($word){

        $first_letter = mb_substr($word,0,1,$this->encoding);
        return mb_strtolower($first_letter);
    }

    protected function findLastLetter ($word){

        $last_letter = mb_substr($word,-1,1,$this->encoding);

        if (in_array($last_letter, $this->letters)){
            $last_letter = mb_substr($word,-2,1,$this->encoding);
        }
        return $last_letter;
    }

    public function validateAnswer($session,$answer){

        $selectedCity = $this->getCityName($session,$answer);
        $first_letter = $this->findFirstLetter($selectedCity);

        echo $selectedCity.'<br />'; echo $first_letter.'<br />'; echo $_SESSION['last_letter'].'<br />';

        if((!empty($_SESSION['last_letter']))) {
            if ($first_letter == $_SESSION['last_letter']) {
                $_SESSION['last_letter'] = $this->findLastLetter($selectedCity);
                return true;
            } else { return false;}
        } else { $_SESSION['last_letter'] = $this->findLastLetter($selectedCity); }

        return true;
    }

    public function findAnswer($session, $last_letter){

        foreach ($session as $value){
            if($this->findFirstLetter($value['city'])== $last_letter){
                    $answer = $value;
                    $_SESSION['last_letter'] = $this->findLastLetter($answer['city']);
                }
            }
    return isset($answer)?$answer:false;
    }
}



















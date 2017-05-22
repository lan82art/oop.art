<?php
session_start();
require_once 'config.php';

//var_dump($_SESSION);
function getCities(){

    $link = mysqli_connect(HOST,USER,PASS,DATABASE) or die('Connection error');
    mysqli_query($link,"SET NAMES utf8");

    $cities = array();

    $result = mysqli_query($link,"SELECT * FROM towns");
    while ($cit[]=mysqli_fetch_assoc($result)){
        $cities = $cit;
    }
    return $cities;
}

function selectAnswer($session){
    if (isset($_POST['enter'])){
        $selected = $_POST['city'];
        echo $selected;
        //var_dump($session);

        foreach ($session as $value){
            if($value['id'] != $selected){
                $new_session[] = $value;
            }
        }
    }
    return $new_session;
}

$variable[] = selectAnswer($_SESSION['cities']);

$_SESSION['cities'] = $variable;


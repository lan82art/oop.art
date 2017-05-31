<?php

if($_POST['enter']){
    $validator = new Validate();

    if (!$validator->valid('email',$_POST['email'])){
        $error['error']['email'] = 'Ошибка в электронной почте';
    }

    if(!$validator->valid('text',$_POST['text'])){
        $error['error']['text'] = 'Должен быть больше 4 и меньше 20';
    }

    if(!$validator->valid('number',$_POST['number'])){
        $error['error']['number'] = 'Не число';
    }
}
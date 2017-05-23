<?php
session_start();
//session_destroy();
require_once 'db.php';

function getCities(){

    $link = mysqli_connect('192.168.100.100','root','KcR33sQjTAwagKh','easycode') or die('Connection error');
    mysqli_query($link,"SET NAMES utf8");

    $cities = array();

    $result = mysqli_query($link,"SELECT * FROM towns");
    while ($cit[]=mysqli_fetch_assoc($result)){
        $cities = $cit;
    }
    mysqli_close($link);

    return $cities;
}

function findLastLetter ($word){

    $letters = array('ь','ъ','ы','й');

    $last_letter = mb_substr($word,-1,1,'utf-8');

    if (in_array($last_letter, $letters)){
        $last_letter = mb_substr($word,-2,1,'utf-8');
    }
    return $last_letter;
}

function findFirstLetter($word){

    $first_letter = mb_substr($word,0,1,'utf-8');
    return mb_strtolower($first_letter);
}

function findSelectedWord($session, $selected){

    foreach ($session as $value){
        if($value['id'] == $selected){
            $word = $value['city'];
        }
    }
    return $word;
}

function getAnswer($session, $post, $prev_ans = NULL){

    if ($prev_ans != NULL){
        echo $prev_ans;
        echo $last_letter = findLastLetter($prev_ans);
        echo $first_letter = findFirstLetter(findSelectedWord($session, $post));

        if($last_letter != $first_letter){
            $_SESSION['error'] = 'Вы проиграли'; return false;
        }
    }

    foreach ($session as $value){
            if($value['id'] != $post){
                $new_session[] = $value;
            }
        }
    return $new_session;
}

function findAnswer($session, $selected){

    $word = findSelectedWord($session, $selected);

    $last_letter = findLastLetter($word);

    foreach ($session as $value){

        if( findFirstLetter($value['city'])== $last_letter){
            $answer_city = $value;
        }
    }

    if(!empty($answer_city)){
        $_SESSION['prev_ans'] = $answer_city['city'];
        return $answer_city;
    } else {
        $_SESSION['prev_ans'] = NULL;
        return false;
    }
}

if($_SESSION['start'] != 'start' || empty($_SESSION['cities'])){
    $_SESSION['start'] = 'start';
    $_SESSION['cities'] = getCities();
}

if ($_POST['enter']){

    $answer = findAnswer($_SESSION['cities'], $_POST['city']);
    $variable = getAnswer($_SESSION['cities'], $_POST['city'],$_SESSION['prev_ans']);
    $_SESSION['cities'] = $variable;

    $variable =getAnswer($_SESSION['cities'],$answer['id']);
    $_SESSION['cities'] = $variable;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
    <meta charset="UTF-8">
</head>
<body>
<div style="background: lightgray; margin: 0 auto; width: 400px; padding: 20px;">
    <form method="post" action="">
        <p>
            <?php  if (empty($_SESSION['error'])){ ?>
            <label> Select City <select name="city">
                    <?php
                    foreach ($_SESSION['cities'] as $value){
                        ?><option value="<?php echo $value['id']?>"><?php echo $value['city']?></option><?php
                    }
                    ?>
                </select></label>
            <?php } else {?>
                <p><?php echo $_SESSION['error'];?></p>
            <?php }?>
        </p>
        <p><?php if($_POST['enter']) if($answer) echo 'Ответ: '. $answer['city']; else echo 'Игра окончена'?></p>
        <p>
            <input type="submit" name="enter" value="Select"/>
        </p>
    </form>
</div>

</body>
</html>

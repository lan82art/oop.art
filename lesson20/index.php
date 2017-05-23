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

function getAnswer($session, $post){

    //$first_letter = mb_substr($post,1,1,'utf-8');

        foreach ($session as $value){
            if($value['id'] != $post){
                $new_session[] = $value;
            }
        }
    return $new_session;
}


function findAnswer($session, $selected){

    $letters = array('ь','ъ','ы');

    echo $selected.'<br />';

    foreach ($session as $value){
        if($value['id'] == $selected){
            $word = $value['city'];
        }
    }

    echo $word;

    $last_letter = mb_substr($word,-1,1,'utf-8');

    if (in_array($last_letter, $letters)){
        $last_letter = mb_substr($word,-2,1,'utf-8');
    }

    $link = mysqli_connect('192.168.100.100','root','KcR33sQjTAwagKh','easycode') or die('Connection error');
    $sql = 'SELECT * FROM `towns` WHERE LOWER(city) LIKE LOWER("'.$last_letter.'%")';

    $result = mysqli_query($link,$sql);
    $answer_city = mysqli_fetch_assoc($result);

    mysqli_close($link);
    echo $answer_city['city'];

    return $answer_city;
}




if($_SESSION['start'] != 'start' || empty($_SESSION['cities'])){
    $_SESSION['start'] = 'start';
    $_SESSION['cities'] = getCities();
}


if ($_POST['enter']){

    $answer = findAnswer($_SESSION['cities'], $_POST['city']);

    $variable = getAnswer($_SESSION['cities'], $_POST['city']);
//  var_dump($variable); echo '<br />';
    $_SESSION['cities'] = $variable;
    //var_dump($_SESSION['cities']);
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
            <label> Select City <select name="city">
                    <?php
                    foreach ($_SESSION['cities'] as $value){
                        ?><option value="<?php echo $value['id']?>"><?php echo $value['city']?></option><?php
                    }
                    ?>
                </select></label>
        </p>
        <p><?php if($_POST['enter']) echo 'Ответ: '. $answer; ?></p>
        <p>
            <input type="submit" name="enter" value="Select"/>
        </p>
    </form>
</div>

</body>
</html>

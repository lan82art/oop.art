<?php
session_start();
//session_destroy();
//require_once 'db.php';

//var_dump($_SESSION);

function getCities(){

    $link = mysqli_connect('192.168.100.100','root','KcR33sQjTAwagKh','easycode') or die('Connection error');
    mysqli_query($link,"SET NAMES utf8");

    $cities = array();

    $result = mysqli_query($link,"SELECT * FROM towns");
    while ($cit[]=mysqli_fetch_assoc($result)){
        $cities = $cit;
    }
    return $cities;
}

function findAnswer($selected){

    $letters = array('ь','ъ','Ы');
    $last_letter = mb_substr($selected,-1,1,'utf-8');
    echo $last_letter;

    if (in_array($last_letter, $letters)){
        $last_letter = mb_substr($selected,-1,1,'utf-8');
    }

    $link = mysqli_connect('192.168.100.100','root','KcR33sQjTAwagKh','easycode') or die('Connection error');
    $result = mysqli_query($link,'SELECT * FROM `towns` WHERE LOWER(city) LIKE LOWER("'.$last_letter.'%")');
    $city = mysqli_fetch_assoc($result);

    return $city;
}

function deleteTown($session, $post){
    if (isset($_POST['enter'])){
        $selected = $post;

        foreach ($session as $value){
            if($value['id'] != $selected){
                $new_session[] = $value;
            }
        }
    }
    return $new_session;
}

if($_SESSION['start'] != 'start' || empty($_SESSION['cities'])){
    $_SESSION['start'] = 'start';
    $_SESSION['cities'] = getCities();
}

if ($_POST['enter']){

    $variable = deleteTown($_SESSION['cities'],$_POST['city']);
//  var_dump($variable); echo '<br />';
    $_SESSION['cities'] = $variable;
//    var_dump($_SESSION['cities']);
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
        <p><?php if($_POST['enter']) echo findAnswer($_POST['city'])?></p>
        <p>
            <label> Select City <select name="city">
                    <?php
                    foreach ($_SESSION['cities'] as $value){
                        ?><option value="<?php echo $value['id']?>"><?php echo $value['city']?></option><?php
                    }
                    ?>
                </select></label>
        </p>
        <p>
            <input type="submit" name="enter" value="Select"/>
        </p>
    </form>
</div>

</body>
</html>

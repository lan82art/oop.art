<?php
session_start();

require_once 'classes.php';

$cityList = new City();
$validate = new Validation();


if($_SESSION['start'] != 'start' || empty($_SESSION['cities'])) {

    $_SESSION['start'] = 'start';
    $_SESSION['cities'] = $cityList->cityList();
}

if(isset($_POST['enter'])){

    if($validate->validateAnswer($_SESSION['cities'],$_POST['city'])){

        $cityList->deleteCity($_SESSION['cities'],$_POST['city']);

        $answer = $validate->findAnswer($_SESSION['cities'],$_SESSION['last_letter']);
            if (!empty($answer)){

                $cityList->deleteCity($_SESSION['cities'],$answer['id']);

            } else {$_SESSION['error'] = 'Вы победили';}

    } else {$_SESSION['error'] = 'Вы проиграли';}
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
    <meta charset="UTF-8" />
</head>

<body>
<div style="background: lightgray; margin: 0 auto; width: 400px; padding: 20px;">
    <?php if(empty($_SESSION['error'])) {?>
    <form method="post" action="" name="selectcity">
            <?php  if (empty($_SESSION['error'])){ ?>
        <label>Выберите город: <select name="city">
            <?php
            foreach ($_SESSION['cities'] as $value){?>
                <option value="<?php echo $value['id']?>"><?php echo $value['city']?></option><?php } ?>
            </select></label>
        <?php }?>
        <p>
            <input type="submit" name="enter" value="Select"/>
        </p>
    </form>
        <p><?php echo $_SESSION['last_letter']?></p>
    <?php } else {?><p><?php echo $_SESSION['error'];?></p><?php }?>
    <p><?php  if (isset($_POST['enter'])) echo $answer['city']; ?></p>
    <form name="reset_form" method="post" action="reset.php">
        <input type="submit" name="reset" value="ResetGame" />
    </form>
</div>
</body>
</html>
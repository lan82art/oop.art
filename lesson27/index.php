<?php
session_start();
require_once 'classes.php';
$casino_number = 0;
$casino = new Casino();

$_SESSION['amounts'] = $casino->startGame($_SESSION['amounts']);

if(isset($_POST['enter'])){
    $casino_number = $casino->generate($casino->min_number,$casino->max_number);

    if($casino->validate_input($_POST['rate'], $_POST['number'])){

        $_SESSION['amounts'] = $casino->rate($_SESSION['amounts'],$_POST['rate']);
        $_SESSION['amounts'] = $casino->deside($_SESSION['amounts'],$casino_number,$_POST['rate'],$_POST['number']);
        $spectrate = $casino->spectrator($_SESSION['amounts']);
    }
}
?>
<!DOCTYPE html>
<html lang="ru_RU">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div style="width: 300px; margin: 0 auto;">
    <?php if($casino_number!=0) echo $casino_number;?>
</div>
<div style="width: 300px; margin: 0 auto;">
    <div style="float: left;">
        <?php if(isset($_SESSION['amounts']['player'])) echo 'Player = '. $_SESSION['amounts']['player']?>
    </div>
    <div style="float:left;">
        <?php if(isset($_SESSION['amounts']['casino'])) echo 'Casino = '. $_SESSION['amounts']['casino']?>
    </div>
    <div style="clear:both;"></div>
</div>

<div style="width: 300px; margin: 100px auto;">
<form action="" method="post" name="form">
    <p><input type="text" name="rate" placeholder="Ставка от 100 до 1000" value="200" /></p>
    <p><input type="text" name="number" placeholder="Число от 1 до 100" value="10" /></p>

    <input type="submit" name="enter" value="Отправить"/>
</form>
    <div><?= $spectrate?></div>
    <div><a href="reset.php">RESET</a></div>
</div>
</body>
</html>
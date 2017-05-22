<?php
session_start();
//session_destroy();
require_once 'index.php';
if($_SESSION['start'] != 'start'){
    $_SESSION['start'] = 'start';

    $_SESSION['cities'] = getCities();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
    <meta charset="UTF-8">
</head>
<body>
<div style="background: lightgray; margin: 0 auto; width: 400px;">
    <form method="post" action="index.php">
        <p><?php echo $_SESSION['start'];?></p>
        <p>
            <label> Select City <select name="city">
                    <?php
                        foreach ($_SESSION['cities'] as $value){
                            ?><option value="<?php echo $value['id']?>"><?php echo $value['city']?></option><?php
                        }
                    ?>
            </select> </label>
        </p>
        <p>
            <input type="submit" name="enter"/>
        </p>
    </form>
</div>

</body>
</html>
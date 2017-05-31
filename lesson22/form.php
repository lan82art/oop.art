<?php
session_start();
require_once 'classes.php';
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="ru_RU">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if(!isset($_POST['enter1']) && !isset($_POST['enter2'])){ ?>
<form action="" method="post" name="form2">
    <input type="text" name="form_name" placeholder="Имя формы" />
    <input type="text" name="form_action" placeholder="Обработчик формы" />

    <label>Метод<select name="form_method">
        <option value="post">POST</option>
        <option value="get">GET</option>
        </select></label>

    <input type="text" name="qty" placeholder="Количество полей формы" />
    <input type="submit" name="enter1" value="Отправить"/>
</form>
<?php } ?>
<?php if(isset($_POST['enter1']) && !isset($_POST['enter2'])){
    $_SESSION['form_name'] = $_POST['form_name'];
    $_SESSION['form_action'] = $_POST['form_action'];
    $_SESSION['form_method'] = $_POST['form_method'];
    ?>
<form action="" method="post" name="form2">
    <?php for($i=1;$i<=$_POST['qty'];$i++){ ?>

        <p><label>Выберите тип поля: <select name="type<?= $i?>">
                <option value="email">email</option>
                <option value="text">text</option>
                <option value="number">number</option>
                </select></label></p>
    <?php } ?>
    <input type="submit" name="enter2" value="Отправить">
</form>
<?php } ?>

<?php
if(isset($_POST['enter2'])){
   //var_dump($_POST);

$formFields = array();
$i=1;
while(isset($_POST['type'.$i])){
    $formFields[] = $_POST['type'.$i++];
}

$form = new Form();
$i = 1;

    $generatedForm = $form->beginForm($_SESSION['form_name'],$_SESSION['form_action'],$_SESSION['form_method']);

    foreach ($formFields as $value) {
        $generatedForm .= $form->input($value.$i++,$value);
    }
    $generatedForm .= $form->endForm();

    $db = new Db2();
    $db->sql("INSERT INTO forms VALUES(NULL,'".$_SESSION['form_name']."','".$generatedForm."')");

    unset($_SESSION['form_name']);
    unset($_SESSION['form_action']);
    unset($_SESSION['form_method']);
}
?>
</body>
</html>
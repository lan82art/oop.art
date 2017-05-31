<?php
require_once 'classes.php';
$form = new Form();
?>

<!DOCTYPE html>
<html lang="ru_RU">
<head>
    <meta charset="UTF-8">
    <title>FormGenerator</title>
</head>
<body>

<?php

if($_POST['enter']){
    $validator = new Validate();

    if ($validator->valid('email',$_POST['email'])){
        echo 'Email is valid';
    } else echo 'Email invalid';
}

$select = array('one','two','three');

echo $form->beginForm('myform','""','post');
echo $form->input('email','text').'<br />';
echo $form->input('input2','textarea').'<br />';
echo $form->select('select1',$select).'<br />';
echo $form->input('input3','textarea','oieuroiqeroiejrt').'<br />';
echo $form->input('enter','submit');
echo $form->endForm();

?>

</body>
</html>

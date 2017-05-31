<?php
require_once 'classes.php';

$form = new Form();
$error = array();
$select = array('one','two','three');

require_once 'validator.php';
?>

<!DOCTYPE html>
<html lang="ru_RU">
<head>
    <meta charset="UTF-8">
    <title>FormGenerator</title>
</head>
<body>

<div style="margin: 0 auto; width: 500px;">
<?php echo $form->beginForm('myform','"validator.php"','post');?>

<p> <?php echo $form->input('email','text'); if(isset($error['error']['email'])){ echo $error['error']['email']; } else echo'&nbsp;'; echo '';?></p>
<p> <?php echo $form->input('text','text'); if(isset($error['error']['text'])){ echo $error['error']['text']; } else echo'&nbsp;'; echo '';?></p>
<p> <?php echo $form->input('number','text'); if(isset($error['error']['number'])){ echo $error['error']['number']; } else echo'&nbsp;'; echo ''; ?></p>
<p> <?php echo $form->select('select1',$select); ?></p>
<p> <?php echo $form->textarea('input3','oieuroiqeroiejrt'); ?></p>
<p> <?php echo $form->input('enter','submit'); ?></p>

    <?php echo $form->endForm();?>

</div>

</body>
</html>

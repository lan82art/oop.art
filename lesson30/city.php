<?php
/*
if($_GET['country'] == 1){
    echo json_encode(array('1' => 'Kharkiv','2' => 'Kiev','3' => 'dfgdfgdf'));
} elseif($_GET['country'] == 2){
    echo json_encode(array('1' => 'Tbilisy','2' => 'Batumi'));
}*/
if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['other'])){

    echo json_encode(array('1' => $_POST['name'],'2' => $_POST['phone'],'3' => $_POST['other']));

}
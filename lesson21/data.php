<?php
require_once 'classes.php';

$publications = array();

$link = mysqli_connect('localhost', 'root', '', 'easycode');

mysqli_query($link,"SET NAMES utf8");

$result = mysqli_query($link, "SELECT * FROM news");

while ($row = mysqli_fetch_array($result)){
    $publications[] = new $row['type']($row);
}
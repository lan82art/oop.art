<?php
session_start();
session_destroy();
if(isset($_POST['reset'])){
    unset ($_SESSION['start']);
    unset ($_SESSION['last_letter']);
    unset ($_SESSION['error']);
    header('Location:index.php');
}
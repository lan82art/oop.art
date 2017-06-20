<?php
session_start();
unset($_SESSION['amounts']);
header('Location:index.php');
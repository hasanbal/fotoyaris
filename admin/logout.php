<?php 
session_start();

unset($_SESSION['giris']);

session_destroy();

header("location: ../index.php");

?>
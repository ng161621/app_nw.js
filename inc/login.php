<?php 

session_start();

$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['nom'] = "Nicolas GARNIER";

var_dump($_SESSION);
header("location: ../Dark/index.php");

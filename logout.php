<?php 
session_start();
require_once('functions.php');

logout();
$_SESSION['flash'] = "You Logged Out";
header('location: index.php');    
?>
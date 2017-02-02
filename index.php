<?php 
session_start();
require_once('functions.php');
include('header.php');
$crumbs = array("Home" => "index.php");
printHeader("Home", "Home", $crumbs);
?>
<img src="Images/logo.png" alt="My Pic">
	<h1>Welcome to The Association!</h1>
	<img src="http://archive.sltrib.com/images/2012/0529/byuhawaii_052112~3.jpg" alt="My Pic"><br>
<?php	
include('footer.php');
?>
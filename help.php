<?php 
require_once('functions.php');
include('header.php');
$crumbs = array("Home" => "index.php",
		"Help" => "help.php");
printHeader("Help", "Help", $crumbs);
?>
	<h1 class="deepshadow">Contact Us!</h1>
	<br><br>
	<p3>
		<?php
		    $text = "Please tell us how we can help and make our site better. We would love to get feedback from you on our service website. If you have any questions or suggestions, please email our support group at support.association.com or contact us immediately at 808-555-1234.";
		    $newtext = wordwrap($text, 100, "<br />\n");
		    echo $newtext;
		?>
		</p3>
		<br><br>
		<img src="Images/logo.png" WIDTH=300px Height=175px />
                <br><br><br>
<?php	
include('footer.php');
?>
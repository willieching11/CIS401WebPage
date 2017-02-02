<?php 
require_once('functions.php');
include('header.php');
$crumbs = array("Home" => "index.php",
		"About Us" => "about.php");
printHeader("Home", "About Us", $crumbs);
?>
	<h1 class="deepshadow">About Us!</h1>
	<p>
	<img src="Images/logo.png" />
	<br><br>
		<?php
		    $text = "If you like College Basketball here in Hawaii, the is the site for you. Welcome to the Association. Once you register for a free account you will be granted to unlimited access to team and player stats and highlights from Hawaii-based College Basketball teams. You will also be about to check out their latet news and updates keeping you informed all through one site. Register today to be a part of the Association.";
		    $newtext = wordwrap($text, 100, "<br />\n");
		    echo $newtext;
		?>
		<br><br>
		<img src="Images/islands.png" WIDTH=300px Height=175px />
	</p>
	<br><br>
		<img src="http://www.warriorinsider.com/wp-content/uploads/2010/11/pic-thomasdunk.jpg" alt="My Pic"><br>
                <h1>Visit the team websites here:</h1>
                <?php
                    echo "<a href=http://www.hawaiiathletics.com/index.aspx?path=mbball>University of Hawaii</a>\n<br>";
                    echo "<a href=http://byuhawaiisports.com/sports/mbkb/index>Brigham Young University-Hawaii</a>\n<br>";
                    echo "<a href=http://www.hpusharks.com/index.aspx?path=mbball&>Hawaii Pacific University</a>\n<br>";
                    echo "<a href=http://www.goswords.com/index.aspx?path=mbball>Chaminade University</a>\n<br>";
                    echo "<a href=http://hiloathletics.com/index.aspx?path=mbball>University of Hawaii-Hilo</a>\n<br>";
                    
                ?>
                <br><br><br>
<?php	
include('footer.php');
?>
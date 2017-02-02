<?php 
require_once('functions.php');
include('header.php');
$crumbs = array("Home" => "index.php",
		"Teams" => "teamloggoff.php");
printHeader("Teams", "Teams", $crumbs);
?>
	<h1 class="deepshadow">Teams!</h1>
	<h2 class="deepshadow">(register for more info!)</h2>
	<p2>
	<br>
	<h4>University of Hawaii</h4>
	<?php $text = "The Hawaii Rainbow Warriors basketball team represents the University of Hawaii at Manoa in NCAA men's competition. The team currently competes in the Big West Conference after leaving its longtime home of the Western Athletic Conference in July 2012. The team's most recent appearance in the NCAA Division I Men's Basketball Tournament was in 2002. The Rainbow Warriors are currently coached by Eran Ganot.";
	$newtext = wordwrap($text, 100, "<br />\n");
		    echo $newtext;
		    ?>
	<h4>Brigham Young University-Hawaii</h4>
	<?php $text = "The BYU–Hawaii Seasiders men's basketball team represents Brigham Young University–Hawaii in NCAA D2 college basketball play. The team has attended 6 NAIA Tournaments and attended 11 NCAA D2 Tournaments. The Seasiders participate as members of the Pacific West Conference. The Seasiders are coached by Ken Wagner.";
	$newtext = wordwrap($text, 100, "<br />\n");
		    echo $newtext;
		    ?>
	<h4>Hawaii Pacific University</h4>
	<?php $text = "The Hawaii Pacific Sharks are the 13 varsity athletic teams that represent Hawaii Pacific University, located in Honolulu, Hawaii, in NCAA Division II intercollegiate sports. The Sharks compete as members of the Pacific West Conference. Hawai`i Pacific University's first venture into intercollegiate athletics came with the formation of the men's basketball team. The university previously competed in the NAIA before joining the NCAA in the mid-1990s.";
	$newtext = wordwrap($text, 100, "<br />\n");
		    echo $newtext;
		    ?>
	<h4>Chaminade University</h4>
	<?php $text = "The Chaminade Silverswords represent Chaminade University of Honolulu, located in Honolulu, Hawaii, in NCAA Division II intercollegiate sports. The Silverswords compete as members of the Pacific West Conference. Chaminade University of Honolulu's team name is the 'Silverswords,' a reference to a Hawaiian plant prized for its beauty and ability to withstand harsh conditions.";
	$newtext = wordwrap($text, 100, "<br />\n");
		    echo $newtext;
		    ?>
	<h4>University of Hawaii-Hilo</h4>
	<?php $text = "Until 1994 UH Hilo belonged to the National Association of Intercollegiate Athletics or NAIA. Since 2004 it has been a member of the NCAA Division II, Pacific West Conference. It fields teams in baseball, basketball, cross country, golf, soccer, softball, tennis and volleyball. The team name for the school is the Vulcans.";
	$newtext = wordwrap($text, 100, "<br />\n");
		    echo $newtext;
		    ?>
	</p2>
	<br><br>
		<img src="http://2.bp.blogspot.com/-v7P22qd8cS8/UsLbg0zInVI/AAAAAAAA3no/M2LwgBG0InI/s1600/University-of-Hawaii-Warriors-logo.gif" alt="UH" Width = 150px Height = 150px><br><br>
		<img src="https://upload.wikimedia.org/wikipedia/en/thumb/0/0b/BYU-Hawaii_Seasiders_logo.svg/1280px-BYU-Hawaii_Seasiders_logo.svg.png" alt="BYUH" Width = 250px Height = 150px><br><br>
		<img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/cd/HPU_Sharks_logo.png/263px-HPU_Sharks_logo.png" alt="HPU" Width = 150px Height = 150px><br><br>
		<img src="http://vignette1.wikia.nocookie.net/nba/images/9/9d/Chaminade_Silverswords.jpg/revision/latest?cb=20110504160246" alt="CHA" Width = 150px Height = 150px><br><br>
		<img src="http://2.bp.blogspot.com/-pJJwSmRVHbk/UkzLn19AjRI/AAAAAAAAKv0/VVjEFOSo3Wk/s1600/vulcans.png" alt="UHH" Width = 200px Height = 150px><br>
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
<?php 
require_once('functions.php');
include('header.php');
$crumbs = array("Home" => "index.php",
		"Teams" => "teamlogin.php");
printHeader("Teams", "Teams", $crumbs);
connectDB();

$sql_query = "SELECT * FROM players WHERE team='" . $_GET['team'] . "'";
$results = mysql_query($sql_query);
?>
	<h1 class="deepshadow">Meet the Squad!</h1>
	<h2>Choose a Team</h2>
		<a href="teamlogin.php?team=UH"><img src="http://2.bp.blogspot.com/-v7P22qd8cS8/UsLbg0zInVI/AAAAAAAA3no/M2LwgBG0InI/s1600/University-of-Hawaii-Warriors-logo.gif" alt="UH" Width = 150px Height = 150px></a>
		<a href="teamlogin.php?team=BYUH"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/0/0b/BYU-Hawaii_Seasiders_logo.svg/1280px-BYU-Hawaii_Seasiders_logo.svg.png" alt="BYUH" Width = 250px Height = 150px></a>
		<a href="teamlogin.php?team=HPU"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/cd/HPU_Sharks_logo.png/263px-HPU_Sharks_logo.png" alt="HPU" Width = 150px Height = 150px></a>
		<a href="teamlogin.php?team=CHA"><img src="http://vignette1.wikia.nocookie.net/nba/images/9/9d/Chaminade_Silverswords.jpg/revision/latest?cb=20110504160246" alt="CHA" Width = 150px Height = 150px></a>
		<a href="teamlogin.php?team=UHH"><img src="http://2.bp.blogspot.com/-pJJwSmRVHbk/UkzLn19AjRI/AAAAAAAAKv0/VVjEFOSo3Wk/s1600/vulcans.png" alt="UHH" Width = 200px Height = 150px></a><br><br>
<?php if (is_admin()) { ?>
<form action="addplayer.php" method="post">
	<input type="Submit" value="Add Player">
</form>
<?php } ?>
	<table class="center">
	    <tr><th>Player ID</th><th>First Name</th><th>Last Name</th><th>Position</th><th>Height</th><th>Weight</th><th>Year</th></tr>
	    <?php
	        while($player = mysql_fetch_assoc($results)) { ?>
	        <tr>
	            <td><?php print $player['player_id'] ?></td>
	            <td><a href="player.php?id=<?php print $player['player_id'] ?>"><?php print $player['fname'] ?></a></td>
	            <td><?php print $player['lname'] ?></td>
	            <td><?php print $player['position'] ?></td>
	            <td><?php print $player["height"] ?></td>
	            <td><?php print $player["weight"] ?></td>
	            <td><?php print $player['year'] ?></td>
	    <?php
	        }
	    ?>
	</table>
    <br>
<?php	

include('footer.php');
?>
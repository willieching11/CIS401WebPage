<?php 
session_start();
require_once('functions.php');
include('header.php');
$crumbs = array("Teams" => "teamlogin.php",
		"Add Stats" => "addstats.php");
connectDB();
$valid_post = true;
$opponent_error = false;
$error_string = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (strlen($_POST["opponent"]) < 1) {
		$valid_post = false;
		$error_string .= "Enter Valid Opponent!<br/>";
		$opponent_error = true;
	}
	if ($valid_post) {
        	$sql_query = "INSERT INTO stats(opponent,points,rebounds,assists,steals,blocks,turnovers,player_id) VALUES (";
        	$sql_query .= "'".$_POST['opponent']."',";
	        $sql_query .= "'".$_POST['points']."',";
	        $sql_query .= "'".$_POST['rebounds']."',";
	        $sql_query .= "'".$_POST['assists']."',";
	        $sql_query .= "'".$_POST['steals']."',";
	        $sql_query .= "'".$_POST['blocks']."',";
	        $sql_query .= "'".$_POST['turnovers']."',";
	        $sql_query .= "'".$_POST['player_id']."');";
	        echo $sql_query."<br/>";
	        $result = mysql_query($sql_query);
	        if (!result) {
        		print "<br/>MYSQL Error: ".mysql_error();
        	}
	}
} else {
	$valid_post = false;
}

printHeader("Add Stats", "Teams", $crumbs);
?>
<?php 
if ($valid_post) { ?>
	<h1 class="deepshadow">Stats Added!</h1>
	<a href="teamlogin.php">Teams Page</a> <?php
} else {
?>
	<h1 class="deepshadow">Add Stats!</h1>
	<?php 
	if ($error_string) { ?>
		<a class="highlighted"><?php echo $error_string ?></a>
	<?php } ?>
	
	<form action="addstats.php?id=<?php print $_GET['id'] ?>" method="post">
		Opponent: <input type="text" name="opponent"><br/>
 		Points: <input type="number" name="points" min="0" max="1000"><br/>
 		Rebounds: <input type="number" name="rebounds" min="0" max="1000"><br/>
 		Assists: <input type="number" name="assists" min="0" max="1000"><br/>
 		Steals: <input type="number" name="steals" min="0" max="1000"><br/>
 		Blocks: <input type="number" name="blocks" min="0" max="1000"><br/>
 		Turnovers: <input type="number" name="turnovers" min="0" max="1000"><br/>
 		Player ID: <input type="number" name="player_id" min="0" max="1000"><br/>
		<input type="submit" value="Add Stat">
	</form>
<?php 
}
include('footer.php');
?>
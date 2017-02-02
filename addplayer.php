<?php 
session_start();
require_once('functions.php');
include('header.php');
$crumbs = array("Teams" => "teamlogin.php",
		"Add Player" => "addplayer.php");
connectDB();
$valid_post = true;
$fname_error = false;
$lname_error = false;
$error_string = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (strlen($_POST["fname"]) < 1) {
		$valid_post = false;
		$error_string .= "First Name too short!<br/>";
		$fname_error = true;
	}
	if (strlen($_POST["lname"]) < 1) {
		$valid_post = false;
		$error_string .= "Last Name too short!<br/>";
		$lname_error = true;
	}
	if ($valid_post) {
        	$sql_query = "INSERT INTO players(fname,lname,position,height,weight,team,year) VALUES (";
        	$sql_query .= "'".$_POST['fname']."',";
	        $sql_query .= "'".$_POST['lname']."',";
	        $sql_query .= "'".$_POST['position']."',";
	        $sql_query .= "'".$_POST['height']."',";
	        $sql_query .= "'".$_POST['weight']."',";
	        $sql_query .= "'".$_POST['team']."',";
	        $sql_query .= "'".$_POST['year']."');";
	        $result = mysql_query($sql_query);
	        if (!result) {
        		print "<br/>MYSQL Error: ".mysql_error();
        	}
	}
} else {
	$valid_post = false;
}

printHeader("Add Player", "Teams", $crumbs);
?>
<?php 
if ($valid_post) { ?>
	<h1 class="deepshadow">Player Added!</h1>
	<a href="teamlogin.php">Teams Page</a> <?php
} else {
?>
	<h1 class="deepshadow">Add a Player!</h1>
	<?php 
	if ($error_string) { ?>
		<a class="highlighted"><?php echo $error_string ?></a>
	<?php } ?>
	
	<form action="addplayer.php" method="post">
		<?php
		if ($fname_error) { ?>
			<span class="error">First Name:</span><input type="text" name="fname"><br/>
		<?php } 
		else { ?>
		 	First Name: <input type="text" name="fname"><br/>
		<?php } 
		if ($lname_error) { ?>
			<span class="error">Last Name:</span><input type="text" name="lname"><br/>
		<?php } 
		else { ?>
		 	Last Name: <input type="text" name="lname"><br/>?>
		<?php }
		?>
 		Position: <select name="position">
			<option value="G"<?php echo ($_POST["position"]=="G")?"selected":"";?>>Guard</option>
			<option value="G/F"<?php echo ($_POST["position"]=="G/F")?"selected":"";?>>Guard/Forward</option>
			<option value="F"<?php echo ($_POST["position"]=="F")?"selected":"";?>>Forward</option>
			<option value="C"<?php echo ($_POST["position"]=="C")?"selected":"";?>>Center</option>
		</select><br/>
 		Height: <input type="text" name="height"><br/>
 		Weight: <input type="text" name="weight"><br/>
 		Year: <select name="year">
			<option value="Sr"<?php echo ($_POST["year"]=="Sr")?"selected":"";?>>Senior</option>
			<option value="Jr"<?php echo ($_POST["year"]=="Jr")?"selected":"";?>>Junior</option>
			<option value="So"<?php echo ($_POST["year"]=="So")?"selected":"";?>>Sophmore</option>
			<option value="Fr"<?php echo ($_POST["year"]=="Fr")?"selected":"";?>>Freshman</option>
		</select><br/>
	 	Team: <select name="team">
			<option value="BYUH"<?php echo ($_POST["team"]=="BYUH")?"selected":"";?>>BYU-Hawaii</option>
			<option value="CHA"<?php echo ($_POST["team"]=="CHA")?"selected":"";?>>Chaminade</option>
			<option value="HPU"<?php echo ($_POST["team"]=="HPU")?"selected":"";?>>Hawaii Pacific University</option>
			<option value="UHH"<?php echo ($_POST["team"]=="UHH")?"selected":"";?>>UH-Hilo</option>
			<option value="UH"<?php echo ($_POST["team"]=="UH")?"selected":"";?>>University of Hawaii</option>
		</select> 
		<br>
		<input type="submit" value="Add Player">
	</form>
<?php 
}
include('footer.php');
?>
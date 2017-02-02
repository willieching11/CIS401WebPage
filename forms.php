<?php 
session_start();
require_once('functions.php');
include('header.php');
$crumbs = array("Home" => "index.php",
		"Register" => "forms.php");
connectDB();
$valid_post = true;
$error_string = "";
$password_error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_POST["password"] != $_POST["confirm_password"]) {
		$valid_post = false;
		$error_string .= "Passwords did not match<br/>";
		$password_error = true;
	}
	if (strlen($_POST["name"]) < 3) {
		$valid_post = false;
		$error_string .= "Name too short!<br/>";
		$name_error = true;
	}
	$email = $_POST["email"];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$valid_post = false;
		$email_error = true;
  		$error_string .= "Enter a valid email.<br/>";
	}
	if (strlen($_POST["password"]) < 3) {
		$valid_post = false;
		$error_string .= "Password too short!<br/>";
		$password_error = true;
	}
	if ($valid_post) {
        	$hashed_password = sha1($_POST['password']);
        	$sql_query = "INSERT INTO users(email,name,hashed_password,school,type) VALUES (";
        	$sql_query .= "'".$_POST['email']."',";
	        $sql_query .= "'".$_POST['name']."',";
	        $sql_query .= "'$hashed_password',";
	        $sql_query .= "'".$_POST['school']."',";
	        $sql_query .= "'".$_POST['type']."');";
	        $result = mysql_query($sql_query);
	        if (!result) {
        		print "<br/>MYSQL Error: ".mysql_error();
        	}
	}
	if (!$valid_post) {
		$name = $_POST["name"];
		$email = $_POST["email"];
	}
} else {
	$valid_post = false;
}

printHeader("Register", "Home", $crumbs);
?>
<?php 
if ($valid_post) { 
	header('location: index.php');  
	exit();
} else {
?>
	<h1 class="deepshadow">Welcome! Please Register!</h1>
	<?php 
	if ($error_string) { ?>
		<a class="highlighted"><?php echo $error_string ?></a>
	<?php } ?>
	
	<form action="forms.php" method="post">
		<?php
		if ($name_error) { ?>
			<span class="error">Name:</span><input type="text" name="name"><br/>
		<?php } 
		else { ?>
		 	Name: <input type="text" name="name"><br/>
		<?php } ?>
		<?php
		if ($email_error) { ?>
			<span class="error">Email:</span> <input type="text" name="email"><br/>
		<?php } 
		else { ?>
		 	Email: <input type="text" name="email"><br/>
		<?php
		} ?>
		<?php
		if ($password_error) { ?>
			<span class="error">Password:</span> <input type="password" name="password"><br/>
			<span class="error">Confirm Password:</span> <input type="password" name="confirm_password"><br/>
		<?php } 
		else { ?>
		 	Password: <input type="password" name="password"><br/>
			Confirm Password: <input type="password" name="confirm_password"><br/>
		<?php
		} ?>
 		Job:	<input type="radio" name="type" value="Player"<?php echo ($_POST["type"]=="Player")?"checked":"";?>> Player 
			<input type="radio" name="type" value="Coach"<?php echo ($_POST["type"]=="Coach")?"checked":"";?>> Coach
			<input type="radio" name="type" value="Fan"<?php echo ($_POST["type"]=="Fan")?"checked":"";?>> Fan <br/>
	 	School: <select name="school">
			<option value="BYUH"<?php echo ($_POST["school"]=="BYUH")?"selected":"";?>>BYU-Hawaii</option>
			<option value="CHA"<?php echo ($_POST["school"]=="CHA")?"selected":"";?>>Chaminade</option>
			<option value="HPU"<?php echo ($_POST["school"]=="HPU")?"selected":"";?>>Hawaii Pacific University</option>
			<option value="UHH"<?php echo ($_POST["school"]=="UHH")?"selected":"";?>>UH-Hilo</option>
			<option value="UH"<?php echo ($_POST["school"]=="UH")?"selected":"";?>>University of Hawaii</option>
		</select> 
		<br>
		<input type="submit" value="Register">
	</form>
<?php 
}
include('footer.php');
?>
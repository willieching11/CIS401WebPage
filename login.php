<?php 
session_start();
require_once('functions.php');
include('header.php');
$crumbs = array("Home" => "index.php",
		"Login" => "login.php");
connectDB();
$errorstring = "";
printHeader("Login", "Login", $crumbs);
$valid_post = true;
$error_string = "";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $hashed_password = sha1($_POST['password']);
    $sql = "SELECT * FROM users WHERE ";
    $sql .= "email='" .$_POST['email']. "' AND ";
    $sql .= "hashed_password='$hashed_password'";
    echo $sql."<br/>";
    $result = mysql_query($sql);
  
    if (!result) {
    	print mysql_error();
        exit();
    }
    
    if (mysql_num_rows($result) != 1) {
        $error_string = true;
        $valid_post = false;
    } else  {
        $user = mysql_fetch_assoc($result);
        login($user['user_id'], $user['email'], $user['role']);
    }
} else {
    $valid_post = false;
}
if ($valid_post) { ?>
	$_SESSION['user_id'] = $_GET['user_id']; 
        <strong>User ID:</strong><?php print $_SESSION['user_id'] ?><br/>
	<strong>Email:</strong><?php print $_SESSION['email'] ?><br/> <?php
	header('location: index.php');  
	exit();
} else {
?>
	<h1 class="deepshadow">Welcome! Please Login</h1>
	<?php 
	if ($error_string) { ?>
		<a class="highlighted">Invalid Email/password</a>
	<?php } ?>
	<form action="login.php" method="post">
		Email: <input type="text" name="email"><br/>
		Password: <input type="password" name="password"><br/>
		<input type = "submit" value="Login">
	</form>
	<br>
	Not a member? Register <a href="forms.php">here</a>
<?php 
}
include('footer.php');
?>
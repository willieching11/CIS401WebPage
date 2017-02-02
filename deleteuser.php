<?php 
require_once('functions.php');
authenticate();
include('header.php');
$crumbs = array("Home" => "index.php",
		"Assignments" => "assignments.php",
		"Delete" => "deleteuser.php");
connectDB();
if ($_SESSION['user_id'] != $_POST['id'] && !is_admin()) {
	$_SESSION['flash'] = "Invalid Request.";
	header("location: members.php");
	exit();
}

$sql_query = "DELETE FROM users WHERE user_id='" . $_POST['id'] . "'";
$result = mysql_query($sql_query);
if (!result) {
	print "<br/>MYSQL Error: ".mysql_error();
	exit();
}
printHeader("Members Deleted", "Members", $crumbs);
?>
<h1>Member Deleted</h1>
<a href="members.php">Members Page</a>
<?php 
include('footer.php');
?>
<?php 
require_once('functions.php');
authenticate();
include('header.php');
$crumbs = array("Home" => "index.php",
		"Teams" => "teamlogin.php",
		"Delete" => "deleteplayer.php");
connectDB();

$sql_query = "DELETE FROM players WHERE player_id='" . $_POST['id'] . "'";
$result = mysql_query($sql_query);
if (!result) {
	print "<br/>MYSQL Error: ".mysql_error();
	exit();
}
printHeader("Player Deleted", "Teams", $crumbs);
?>
<h1>Player Deleted</h1>
<a href="teamlogin.php">Teams Page</a>
<?php 
include('footer.php');
?>
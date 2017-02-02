<?php 
session_start();
require_once('functions.php');
authenticate();
include('header.php');
$crumbs = array("Home" => "index.php",
		"Members" => "members.php",
		"Member" => "member.php");
connectDB();
$member = getUser($_GET['id']);
printHeader($member['name'], "Members", $crumbs);
?>
<h1 class="deepshadow">Member!</h1>
<table class="center">
    <tr><th>ID</th><th>Email</th><th>Name</th><th>School</th><th>Type</th><th>Role</th></tr>
    <tr>
            <td><?php print $member['user_id'] ?></td>
            <td><?php print $member['email'] ?></a></td>
            <td><?php print $member['name'] ?></td>
            <td><?php print $member['school'] ?></td>
            <td><?php print $member['type'] ?></td>
            <td><?php print $member['role'] ?></td>
    </tr>
<?php if (is_admin() || $_SESSION['user_id'] == $_GET['id']) { ?> 
<a href="updateusers.php?id=<?php print $member['user_id'] ?>"> Update </a>
<form action="deleteuser.php" method="post">
	<input type="hidden" name="id" value="<?php print $_GET['id'] ?>">
	<input type="Submit" value="Delete">
</form>
<?php
} 
include('footer.php');
?>
<?php 
require_once('functions.php');
include('header.php');
$crumbs = array("Home" => "index.php",
		"Members" => "members.php");
connectDB();
$sql_query = "SELECT * FROM users";
$results = mysql_query($sql_query);
if (!$results) {
	print "MYSQL_ERROR: ".mysql_error();
	exit();
}
printHeader("Members", "Members", $crumbs);
?>

<h1 class="deepshadow">Members!</h1>
<h2 class="deepshadow">There are <?php print mysql_num_rows($results)?> members</h2>
<br>
<table class="center">
    <tr><th>ID</th><th>Email</th><th>Name</th><th>School</th><th>Type</th><th>Role</th></tr>
    <?php
        while($member = mysql_fetch_assoc($results)) { ?>
        <tr>
            <td><?php print $member['user_id'] ?></td>
            <td><a href="member.php?id=<?php print $member['user_id'] ?>"><?php print $member['email'] ?></a></td>
            <td><?php print $member['name'] ?></td>
            <td><?php print $member['school'] ?></td>
            <td><?php print $member['type'] ?></td>
            <td><?php print $member['role'] ?></td>
        </tr>
    <?php
        }
    ?>
<?php 
include('footer.php');
?>
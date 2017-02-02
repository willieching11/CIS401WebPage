<?php 
require_once('functions.php');
include('header.php');
$crumbs = array("Home" => "index.php",
		"Teams" => "teamlogin.php",
		"Player" => "player.php");
connectDB();
$sql_query = "SELECT * FROM stats WHERE player_id='" . $_GET['id'] . "'";
$results = mysql_query($sql_query);
if (!$results) {
	print "MYSQL_ERROR: ".mysql_error();
	exit();
}
printHeader("Members", "Members", $crumbs);
?>

<h1 class="deepshadow">Player Stats!</h1>
<h2 class="deepshadow">There are <?php print mysql_num_rows($results)?> game stats</h2>
<br>
<?php if (is_admin()) { ?>
<form action="addstats.php?id=<?php print $_GET['id'] ?>" method="post">
	<input type="Submit" value="Add Stats">
</form>
<form action="deleteplayer.php" method="post">
	<input type="hidden" name="id" value="<?php print $_GET['id'] ?>">
	<input type="Submit" value="Delete Player">
</form>
<?php } ?>
<table class="center">
    <tr><th>Stat ID</th><th>Opponent</th><th>Pts</th><th>Rebs</th><th>Asts</th><th>Stls</th><th>Blks</th><th>TOs</th><th>Player ID</th></tr>
    <?php
        while($stats = mysql_fetch_assoc($results)) { ?>
        <tr>
            <td><?php print $stats['stat_id'] ?></td>
            <td><?php print $stats['opponent'] ?></td>
	    <td><?php print $stats['points'] ?></td>
	    <td><?php print $stats["rebounds"] ?></td>
	    <td><?php print $stats["assists"] ?></td>
	    <td><?php print $stats['steals'] ?></td>
	    <td><?php print $stats['blocks'] ?></td>
	    <td><?php print $stats['turnovers'] ?></td>
	    <td><?php print $stats['player_id'] ?></td>
        </tr>
    <?php
        }
    ?>
<?php 
include('footer.php');
?>
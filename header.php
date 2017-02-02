<?php 
ob_start();
session_start();
require_once('functions.php');
function printHeader($subtitle, $highlighted, $crumbs) { 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CIS401 Final | <?php print $subtitle ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>
	<br>
	<body>
		<br>
		<?php
		$n = 0;
		$max = sizeof($crumbs);
		foreach ($crumbs as $text => $url) { 
			if ($n < $max) {
			?>
			<a class="highlighted" href="<?php print $url ?>"><?php print $text ?>--></a>
			<?php
			}
			else { ?>
				<a class="highlighted" href="<?php print $url ?>"><?php print $text ?></a>
				<?php }
		}
		print "You are Here";
		?>
		<br><br>
		<br>
		<?php navbar($highlighted); ?>
		<span class="error">
			<?php
				if (isset($_SESSION['flash'])) {
					print $_SESSION['flash'];
					unset($_SESSION['flash']);
				}
			?>
		</span> 
		<div>
<?php
}
?>
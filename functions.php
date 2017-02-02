<?php
	session_start();
	function login($user_id,$email,$role) {
		$_SESSION['user_id'] = $user_id;
		$_SESSION['email'] = $email;
		$_SESSION['role'] = $role;
	}
	function logout() {
	        unset($_SESSION['user_id']);
	        unset($_SESSION['email']);
	        unset($_SESSION['role']);
	}
	function is_admin() {
		return $_SESSION['role'] == 'admin';
	}
        function is_loggedin() {
        	if (isset($_SESSION['email'])) {
        		return true;
        	} else {
        		return false;
        	}
	}
	function authenticate() {
		if (!is_loggedin()) {
			$_SESSION['flash'] = "Invalid Request";
			header('location: index.php');  
			exit();
		}
	}
	function navbar($highlighted) { ?>
		<nav>
			<?php
			nav_link("Home", "index.php", $highlighted);
			nav_link("About Us", "about.php", $highlighted);
			if (is_loggedin()) {
				nav_link("Teams", "teamlogin.php", $highlighted);
			} else {
				nav_link("Teams", "teamlogoff.php", $highlighted);
			}
			nav_link("Help/Contact Us", "help.php", $highlighted);
			if (is_loggedin()) {
				nav_link("Members", "members.php", $highlighted);
				nav_link("Logout", "logout.php", $highlighted); ?>
				<a class="highlighted"> <?php print "Logged in as (".$_SESSION['email'].")"; ?></a><?php 
			} else {
				nav_link("Login", "login.php", $highlighted);
			}
			?>
		</nav>
		<?php
	}
	function connectDB() {
		mysql_connect("localhost","wching_storage","U]GXrgDGGDM_");
		mysql_select_db("wching_storage");
	}
	
	function nav_link($name, $url, $highlighted) { 
		if ($name == $highlighted) { ?>
			<a href="<?php print $url ?>" class="button-link1"><?php print $name ?></a>
		<?php } else  {?>
			<a href="<?php print $url ?>" class="button-link2"><?php print $name ?></a>
		<?php }
	}
	
	function assignment_link($name, $url) { ?>
		<a href="<?php print $url ?>"><?php print $name ?></a>
	<?php
	}
	function factorial($number) { 
    		if ($number < 2) { 
        		return 1; 
    		} else { 
        		return ($number * factorial($number-1)); 
    		} 
    	}
    	
    	function getUser($user_id) {
    		$sql_query = "SELECT * FROM users WHERE user_id = '". $user_id . "'";
		print $sql_query . "<br/>";    
		$result = mysql_query($sql_query);
		    
		if (!result) {
			print "Error ".mysql_error();
		        exit();
		}  
		if (mysql_num_rows($result) != 1) {
		        print "User is not in the table " . mysql_num_rows($result);
		        exit();
		}
		$player = mysql_fetch_assoc($result);
		return $player;
    	}
?>
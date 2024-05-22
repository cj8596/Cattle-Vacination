<?php
	session_start();
	session_destroy();
	session_unset();

	echo '<script type="text/javascript">alert("You are successfully logged out");
	window.location.replace("login.php")</script>';

?>
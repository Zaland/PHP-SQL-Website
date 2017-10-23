<?php
	// starts session
	session_start();

	// destroy all the sessions
	session_destroy();

	// redirects the page to the home page
	header("Location: ../index.php");
?>

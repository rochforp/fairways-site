<?
	session_start();
	session_unset();
	session_destroy();

	header("location: http://www.google.com");
	exit();
?>
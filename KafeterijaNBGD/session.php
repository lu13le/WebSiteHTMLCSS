<?php

	include('dbh.php');
	session_start();

	$user_check = $_SESSION['username'];
	$ses_sql = mysqli_query($conn, "SELECT username from korisnici where username = '$user_check'");
	$row = msqli_fetch_array($ses_sql, MYSQLI_ASSOC);
	$login_session = $row['username'];

	if(!isset($_SESSION['username']))
	{
		header("Location:login.php");
		die();
	}

?>
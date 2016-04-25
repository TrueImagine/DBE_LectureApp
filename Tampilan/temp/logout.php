<?php
	//logout.php
	session_start();
	$_SESSION['login'] = null;
	$_SESSION['user'] = null;
	$_SESSION['role'] = null;
	header("Location:../index.php");
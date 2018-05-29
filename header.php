<!DOCTYPE html>
<html>
<head>
	<title>Portal randkowy Dominik Mika</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/fav.png" type="image/x-icon"/>
	<meta name="keywords" content="randki,sympatia">
	<link rel="stylesheet" href="css/style.css?v=1" type="text/css" media="screen"/>
	<script src="js/myscript.js"></script>
<?php
	$conn = null;	
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	//session_destroy();
	include('./login-logoff.php');
?>
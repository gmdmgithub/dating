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
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");	
	$conn = null;
	
	
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	//session_destroy();


	function replace_bad_expr($input){
		$output = preg_replace("/[^a-zA-Z0-9_-]/","",$input); //replace bad character form GET request
		return $output; 
	}

	$message = $_SESSION["message"];
	
	//user data
	$name = $pass =  "";
	///search results
	$gender = $gender_search = $purpose = $year_range = $live = $photos = "";
	$userId =  $_SESSION["userId"];
	$userAge =  $_SESSION["userAge"];
	
	if($_SESSION["logged"] == null){
		$_SESSION["logged"] = "NO";
	}

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		// clear the values - do something
		// if(isset($_GET['some_'])){}
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name =checkPostData('login');
		$pass = checkPostData('pass');
		$gender = checkPostData('gender');
		$gender_search = checkPostData('gender_search');
		$purpose = checkPostData('purpose');
		$year_range = checkPostData('year_range');
		$live = checkPostData('live');
		$photos = checkPostData('photos');
		$logoff = checkPostData('logoff');
		
		if(strlen($name) >0 && strlen($pass) >0){
			
			$pass =  sha1($pass);
			//011c945f30ce2cbafc452f39840f025693339c42  -1111
			//d033e22ae348aeb5660fc2140aec35850c4da997 - admin
			//d2d8ca0d198d7ec784d31f99088715933364b1ac  - adam12345
			//połączenie do bazy danych
			
			$sql = "SELECT ID, ROK_URODZENIA FROM uzytkownicy WHERE HASLO =\"".$pass."\" AND LOGIN=\"".$name."\" AND STATUS=\"A\"";
			//echo $sql;
			include('./db.php');
			$results = $conn->query($sql);
			if($results->num_rows > 0){
				$row = $results->fetch_assoc();
				$userId = $row['ID'];
				$userAge = date("Y") - $row['ROK_URODZENIA'];
				//echo "Age: ".$userAge."<br>";
				$_SESSION["name"] = $name;
				$_SESSION["userId"] = $userId;
				$_SESSION["logged"] = "YES";
				$_SESSION["userAge"] = $userAge;
				//header("Location: ./"); /* Redirect to main page */
				//exit();
			
			}else{
				$_SESSION["message"] = 'Nieprawidłowy login lub hsało, proszę spróbować ponownie';  
			}

		}else if($logoff == "YES"){
			$_SESSION["logged"] = "NO";
			$_SESSION["name"] = "";
			$_POST["logoff"] = "";
		}
	}	
	$name = $_SESSION["name"];
	

	function checkPostData($postdata){
		return array_key_exists($postdata, $_POST) ? trim($_POST[$postdata]) : "";
	}
?>
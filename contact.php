<?php
	include('./header.php');
	$page = "contact";
	$access = 'REGISTRED';
	if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['contact_form'] == 'true' ) {

		$temat =checkPostData('subject');
		$tresc = checkPostData('content');
		
		//wysyłania maila nie robimy
		
		//echo 'Request posted';
		$sql = "INSERT INTO pytania set temat='$temat', tresc='$tresc', USR_ID ='$userId' " ;
		
		include('./db.php');
		if($conn->query($sql)){
			$_SESSION["message"] = 'Dziękujemy, twoje pytanie zostało przesłane do administraora!';  
		}else{
			//echo 'Błąd bazy danych'.mysqli_error($conn);
			$_SESSION["message"] = 'Wyspąpił błąd podczas rejestracji - użytkonik istniejw w bazie danych';  
		}
	}
?>
	</head>

	<body>
		<?php include('./navi.php'); ?>

		<?php if(strlen($name) > 0){?>
		<div class="title">
			<h1>Czekamy na twoje opinie, straramy się ulepszać naszą stronę</h1>
		</div>

		<div class="register">
			<!-- dodac obsluge wpisania do bazy danych -->
			<form action="#" method="post">
				<fieldset>
					<legend>Proszę wypełnić formularz kontaktowy</legend>

					<div class="register_row">
						<label for="subject">Temat o który pytasz</label>
						<input type="text" id="subject" name="subject" placeholder="Wpisz temat w jakim piszesz..">
					</div>
					<div class="register_row">
						<label for="content">Wpisz co możemy dla Ciebie zrobić</label>
						<textarea id="content" name="content" placeholder="Wpisz treść.." style="height:200px"></textarea>
					</div>
					<input type="hidden" name="contact_form" value="true">
					<div class="register_row">
						<input type="checkbox" name="acc" value="" class="checkbox" />
						<label>Wyślij mi kopię</label>
					</div>
					<div class="register_row">
						<input type="submit" value="Wyślij">
					</div>
				</fieldset>
			</form>
		</div>

		<?php }else{ ?>
		<div class="title">
			<h2>Opcja jest dostępna tylko dla zalogowanych użytkowników</h2>
		</div>
		<?php } ?>

		<div class="gd_info">
			<?php           $gdInfoArray = gd_info();
                     $version = $gdInfoArray["GD Version"];
                     echo "Your GD version is:".$version;?>
		</div>

		<div class="main_content">
			<h2>Pytanie od Pana Krzystofa z Kielc:</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
				irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
				irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<h2>Pytanie od Pani Krysi z Wrocławia:</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
				irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
				irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

		</div>

		<div class="footer">
			<?php include("./footer.php");?>
		</div>

	</body>

</html>
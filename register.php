<?php
	include('./header.php');
	$page = "register";
	$access = 'UNREGISTRED';
	if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['registration_form'] == 'true' ) {

		$imie =checkPostData('imie');
		$nazwisko = checkPostData('nazwisko');
		$email = checkPostData('email');
		$login = checkPostData('login');
		$haslo = checkPostData('pass1');
		$haslo =  sha1($haslo);

		$wielkosc_miasta = checkPostData('miasto');
		$plec = checkPostData('plec');
		$rok_urodzenia = checkPostData('rok_urodzenia');
		$opis = checkPostData('opis');
		
		//echo 'Registration posted';
		$sql = "INSERT INTO uzytkownicy set imie='$imie', nazwisko='$nazwisko', email ='$email', plec='$plsec',
			login='$login', haslo='$haslo', wielkosc_miasta='$wielkosc_miasta', rok_urodzenia='$rok_urodzenia',opis='$opis'" ;
		include('./db.php');
		if($conn->query($sql)){
			$_SESSION["message"] = 'Gratulacje! Nastąpiła poprawna rejestracja użytkownika proszę zalogować się do systemu'; 
			// $_SESSION["name"] = $login;
			// $_SESSION["logged"] = "YES";
			// $name = $login;
			// header("Location: ./"); /* Redirect to main page */
			// exit();
		}else{
			//echo 'Błąd bazy danych'.mysqli_error($conn);
			$_SESSION["message"] = 'Wyspąpił błąd podczas rejestracji - użytkonik istniejw w bazie danych';  
		}
	}	
?>

</head>

<body>
	<?php include('./navi.php'); ?>

	<div class="title">
		<h1>Rejestracja do portalu oznacza, że zaapoznałeś się i akceptujesz
			<a style="text-decoration:none;color:red;" href="./regulamin.php">regulamin</a>
		</h1>
		<h3>Pola oznaczone
			<span class="asterisk">*</span> są obowiązkowe </h3>
	</div>

	<?php if(strlen($name) == 0){?>

	<div class="register">
		<!-- dodac obsluge wpisania do bazy danych -->

		<form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="post" onsubmit="return checkRegulamin(this)">
			<fieldset>
				<legend>Proszę wypełnić formularz rejestracyjny</legend>
				<div class="register_row">
					<label for="imie">Imię
						<span class="asterisk">*</span>
					</label>
					<input type="text" id="imie" name="imie" placeholder="Wpisz imię..">
				</div>
				<div class="register_row">
					<label for="nazwisko">Twoje nazwisko
						<span class="asterisk">*</span>
					</label>
					<input type="text" id="nazwisko" name="nazwisko" placeholder="Wpisz nazwisko..">
				</div>
				<div class="register_row">
					<label for="email">Podaj adres mail
						<span class="asterisk">*</span>
					</label>
					<input type="email" id="email" name="email" placeholder="Wpisz adres mailowy..">
				</div>
				<div class="register_row">
					<label for="login">Nazwa użytkownika (login twojego konta)
						<span class="asterisk">*</span>
					</label>
					<input type="text" id="login" name="login" placeholder="Wpisz nazwę użytkownika..">
				</div>
				<div class="register_row">
					<label for="pas1">Podaj hasło (minimum 6 znaków)
						<span class="asterisk">*</span>
					</label>
					<input type="password" id="pas1" name="pass1" placeholder="Wpisz hasło">
				</div>
				<div class="register_row">
					<label for="pas2">Powtórz hasło
						<span class="asterisk">*</span>
					</label>
					<input type="password" id="pas2" name="pass2" placeholder="Powtórz hasło">
				</div>
				<div class="register_row">
					<label for="miasto">Miejscowość
						<span class="asterisk">*</span>
					</label>
					<select id="miasto" name="miasto">
						<option value="1">Miasto</option>
						<option value="2">Małe miasto (mniej niż 20 tys mieszkańców)</option>
						<option value="3">Wieś</option>
					</select>
				</div>
				<div class="register_row">
					<label>Jakiej jesteś płci
						<span class="asterisk">*</span>
					</label>
					<br>
					<select name="plec" class="gender">
						<option value="K">Kobietą</option>
						<option value="M">Mezczyzna</option>
						<option value="N">brak odpowiedzi</option>
					</select>
				</div>
				<div class="register_row">
					<label for="rok_urodzenia">Rok urodzenia
						<span class="asterisk">*</span>
					</label>
					<input type="number" id="rok_urodzenia" name="rok_urodzenia">
				</div>


				<div class="register_row">
					<label for="opis">Wpisz proszę kilka słów o sobie</label>
					<textarea id="content" name="opis" placeholder="Wpisz treść.." style="height:100px"></textarea>
				</div>

				<div class="register_row">
					<input type="checkbox" id="regulamin_akceptacja" name="regulamin" value="Y" class="checkbox" />
					<label>Akceptuję regulamin
						<span class="asterisk">*</span>
					</label>
				</div>
				<div class="register_row">
					<input type="hidden" name="registration_form" value="true">
					<input type="submit" value="Rejetracja">
				</div>
			</fieldset>
		</form>
	</div>

	<?php }else{ ?>
	<div class="title">
		<h2>Drogi
			<?php echo $name?> jesteś już zarejestrowany, naprawdę chcesz to zrobić jeszcze raz ;-)</h2>
	</div>
	<?php } ?>

	<div class="footer">
		<?php include("./footer.php");?>
	</div>

</body>

</html>
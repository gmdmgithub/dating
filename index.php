<!DOCTYPE html>
<html>

<head>
	<?php
	include('./header.php');
	$page = "home";
	$access = 'ALL';
?>
</head>

<body>
	<?php include('./navi.php'); ?>

	<div class="title">
		<h1>Najlepszy portal gdzie spotkasz, przyjaciela, kolegę/koleżankę a może kogoś więcej :)</h1>
	</div>

	<center>
		<img src="img/couple.jpg" size="400px"></img>
	</center>

	<div class="main">

		<div class="search_box">

			<form action="search_results.php" method="post">
				<fieldset>
					<legend>Wyszukaj swoją sympatię</legend>

					<div class="search_row">
						<div class="search_column_1">
							<label>Plec szukam</label>
							<br>
							<select name="gender_search" class="gender">
								<option value="K">Kobiety</option>
								<option value="M">Mezczyzna</option>
								<option value="">bez znaczenia</option>
							</select>
						</div>
						<div class="search_column_2">
							<label>Cel przyjażni</label>
							<br>
							<select name="purpose" class="date">
								<option value="friend">Przyjaciela</option>
								<option value="coleage">Kolegi/koleżanki</option>
								<option value="mariage">Żony/Meża</option>
								<option value="someone">Towarzystwa</option>
							</select>
						</div>
					</div>

					<div class="search_row">
						<div class="search_column_1">
							<label>Mieszka</label>
							<select name="live" class="date">
								<option value="">Bez znaczenia</option>
								<option value="1">Miasto</option>
								<option value="2">Małe miasto</option>
								<option value="3">Wieś</option>
							</select>
						</div>
						<div class="search_column_2">
							<label>Oczekiwany wiek</label>
							<br>
							<select name="year_range" class="date">
								<option value="< <?php echo date(" Y ")-19?> AND ROK_URODZENIA > <?php echo date("Y ")-25?>)">19 - 24 lata</option>
								<option value="< <?php echo date(" Y ")-24?> AND ROK_URODZENIA > <?php echo date("Y ")-35?>)">25 - 34 lata</option>
								<option value="< <?php echo date(" Y ")-34?> AND ROK_URODZENIA > <?php echo date("Y ")-45?>)">35 - 44 lata</option>
								<option value="< <?php echo date(" Y ")-44?> AND ROK_URODZENIA > <?php echo date("Y ")-61?>)">45 - 60 lata</option>
								<option value="< <?php echo date(" Y ")-61?>)">powyżej 60 lat</option>
							</select>
						</div>

					</div>
					<div class="photos_only">
						<label>
							<input type="checkbox" name="photos" value="YES" class="checkbox" />Przeszukaj tylko ze zdjęciem</label>
					</div>

					<div class="search">
						<input type="submit" class="submitSearch" value="Szukaj">
					</div>
				</fieldset>
			</form>
		</div>

		<div class="content">
			<h1>Lorem ipsum</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
				irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
				irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>

	</div>
	</div>

	<div class="footer">
		<?php include("./footer.php");?>
	</div>

</body>

</html>
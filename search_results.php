<?php
	include('./header.php');
	$page = "search";
	$access = 'REGISTRED';
?>
</head>
<body>
<?php include('./navi.php'); ?>

<?php if(strlen($name) > 0){
		include('./db.php');
?>

<div class="title">
  <h1>Poniżej prezentujemy rezultaty wyszukiwania</h1>
  <br>
  <?php //echo "Dane płeć: ".$gender_search; //mozna wypisać wszystkie parametry wyszukiwania
  ?> 
  
</div>

<div class="results_list">
	<?php
		$sql = "SELECT 	ogloszenia.ID, KOLEGA,MAZ_ZONA, wielkosc_miasta,NICK,ogloszenia.OPIS,TEMAT, PLEC,PRZYJACIEL,TOWARZYSZ,".
						"ROK_URODZENIA,ZDJECIE,ZDJECIE_WIELKOSC FROM OGLOSZENIA, uzytkownicy ".
						"WHERE ogloszenia.USR_ID = uzytkownicy.ID AND uzytkownicy.ID !=". $userId;
		
		//$gender_search $purpose $year_range $live 
		///*
		if($gender_search != "" || $year_range != "" || $purpose != "" || $live != ""){
			$sql .= " AND ";
			$end = false;
			if($gender_search != ""){
				$sql .=  " PLEC = \"".$gender_search."\" ";
				$end = true;
			}
			if($year_range != ""){

				if($end) {
					$sql .= " AND ";

				}
				$sql .= " (ROK_URODZENIA ". $year_range . " ";
				$end = true;
			}
			if($photos == "YES"){
				if($end) {
					$sql .= " AND ";

				}
				$sql .= " ZDJECIE_WIELKOSC > 0 ";
				$end = true;
			}
		}
		//*/
		//echo $sql;
		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {  
			while($row = $result->fetch_assoc()) { ?>
				<div class="results_box">
					
				<h3><?php echo $row['NICK'];?></h3>
					<div class="res_row">
						<div class="result_1">Temat: </div>
						<div class="result_2"><?php echo $row['TEMAT']?></div>
					</div>

					<div class="res_row">
						<div class="result_1">Opis: </div>
						<div class="result_2"><?php echo $row['OPIS']?></div>
					</div>
					
					<div class="res_row">
						<div class="result_1">Urodzony: </div>
						<div class="result_2"><?php echo $row['ROK_URODZENIA']?></div>
					</div>
					
					<div class="res_row">
						<div class="result_1">Prośba o spotkanie: </div>
						<div class="result_delete_meet_me">
							<a href="./delete_meeting.php?ogl_id=<?php echo $row['ID'];?>" onclick="return confirm('Jetsteś pewnien, że chcesz usunąć ogłoszenie?')">Usuń</a>
						</div>
						<div class="result_meet_me">
							<a href="./newMeeting.php?ogl_id=<?php echo $row['ID'];?>">Spotkanie</a>
						</div>
						
					</div>

					<?php if($row['ZDJECIE_WIELKOSC'] >0){ ?>
						<div class="res_row last_row">
								<div class="result_1">Zdjecie: </div>
								<div class="result_2">
									<img src="data:image/jpeg;base64,<?php echo base64_encode($row['ZDJECIE'])?>" width="300" />
								</div>
						</div>
				
				<?php } ?>
				<div class="end_row"></div>	
				</div> 
				<!-- end of resultsbox -->
			<?php }
		} else {
			echo "<h2> Wprowadzone przez Ciebie kryteria nie zwróciły żadnych rezultatów</h2>";
		}
	 ?>
</div>

<?php }else{ ?>
	<div class="title">
	<h2>Opcja jest dostępna tylko dla zalogowanych użytkowników</h2>
	</div>
<?php } ?>

<div class="footer">
  <?php include("./footer.php");?>
</div>


</body>
</html>
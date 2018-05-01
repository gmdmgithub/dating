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
		$sql = "SELECT 	KOLEGA,MAZ_ZONA, wielkosc_miasta,NICK,ogloszenia.OPIS,PLEC,PRZYJACIEL,TOWARZYSZ,".
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
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<h3 style=\"clear: both;padding-top:20px;\">". $row['NICK']. "</h3>";
				
				echo "<div class=\"result_1\">Opis: </div>";
				echo "<div class=\"result_2\">". $row['OPIS']. "</div>";
				
				echo "<div class=\"result_1\">Urodzony: </div>";
				echo "<div class=\"result_2\">". $row['ROK_URODZENIA']. "</div>";
				if($row['ZDJECIE_WIELKOSC'] >0){
                    echo "<div class=\"result_1\">Zdjecie: </div>";
                    echo "<div class=\"result_2\"><img src=\"data:image/jpeg;base64,".base64_encode($row['ZDJECIE'])."\" width=\"300\" /> </div>";
                }
				
				$true = false;
			}
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
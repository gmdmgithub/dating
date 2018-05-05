<?php
	include('./header.php');
	$page = "invitations";
	$access = 'REGISTRED';
?>
</head>
<body>
<?php include('./navi.php'); ?>

<?php if(strlen($name) > 0){
		include('./db.php');
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['knt_id']) > 0){
		$kntId = $_GET['knt_id'];
        $sql = "DELETE FROM prosba_kontaktu WHERE USR_ID ='$userId' AND ID='$kntId' ";
		if ($conn->query($sql) != TRUE) {
            $_SESSION["message"] = "Wykryto próbę naruszenia zasad bezpieczeństwa, 
                      incydent zostanie zgłoszony administratowori wraz z IP i innymi danymi niezbędnymi do twojej identyfikacji!";        
            header("Location: ./invitations.php");
        }else {
			$_SESSION["message"] = " Spotkanie zostało usunięte :(";
			header("Location: ./invitations.php");
		}
    }
    ?>

<div class="title">
  <h1>Poniżej prezentujemy listę ogłoszeń, gdzie wysłałeś zaporoszenia</h1>
  <br>
  <?php //echo "Dane płeć: ".$gender_search; //mozna wypisać wszystkie parametry wyszukiwania
  ?> 
  
</div>

<div class="results_list">
	<?php

		$sql = " SELECT
		ogloszenia.id OGL_ID,
		ogloszenia.USR_ID,
		KOLEGA,
		MAZ_ZONA,
		wielkosc_miasta,
		NICK,
		ogloszenia.OPIS,
		TEMAT,
		PLEC,
		PRZYJACIEL,
		TOWARZYSZ,
		ROK_URODZENIA,
		ZDJECIE,
		ZDJECIE_WIELKOSC,
		wielkosc_miasta,
        prosba_kontaktu.id KNT_ID
	FROM
		ogloszenia,
		uzytkownicy,
        prosba_kontaktu
	WHERE
        prosba_kontaktu.USR_ID = '$userId' AND prosba_kontaktu.OGL_ID = ogloszenia.id 
        AND ogloszenia.USR_ID = uzytkownicy.ID AND ogloszenia.USR_ID !='$userId' ";
        //*/
		$qSql =$sql." ORDER BY 1";
		//do poprawy sql - unia nie jest dobrym pomysłem
		//echo $qSql;
		
		$result = $conn->query($qSql);
		
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
			<div class="result_1"> <?php if($row['KNT_ID'] >0) { ?> Prośba o spotkanie została przez Ciebie już wysłana <?php } else{ ?> Poproś o spotaknie <?php } ?></div>
						<?php if($row['KNT_ID'] >0){ ?>
							<div class="result_delete_meet_me">
							<a href="./invitations.php?knt_id=<?php echo $row['KNT_ID'];?>" onclick="return confirm('Jetsteś pewnien, że chcesz usunąć ogłoszenie?')">Usuń spotkanie</a>
							</div>
						<?php }else { ?>
						<div class="result_meet_me">
							<a href="./newMeeting.php?ogl_id=<?php echo $row['OGL_ID'];?>">Umów spotkanie</a>
						</div>
						<?php } ?>
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
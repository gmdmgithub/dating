<?php
	include('./header.php');
	$page = "new_meeting";
	$access = 'REGISTRED';
    
    if(!empty($_GET['ogl_id'])){
        $_SESSION["ogl_id"] = $_GET['ogl_id'];
    }
    $ogloszenieId = !empty($_SESSION["ogl_id"])?$_SESSION["ogl_id"]:-1;
    
    $nick = '';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && $ogloszenieId > 0){
        $sql = "SELECT * FROM OGLOSZENIA WHERE USR_ID !='$userId' AND ID='$ogloszenieId' "; //dodać jeszcze status ogłoszenia
        include('./db.php');
        $result = $conn->query($sql);
		
		if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $nick= trim($row['NICK']);
        }else{
            //echo $sql;
            $_SESSION["message"] = "Wykryto próbę naruszenia zasad bezpieczeństwa, 
                      incydent zostanie zgłoszony administratowori wraz z IP i innymi danymi niezbędnymi do twojej identyfikacji!";
            
            header("Location: ./search_results.php");
        }
    }
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['meeting_form'] == 'true' ) {

		$wiadomosc =checkPostData('content');
		
		//wysyłania maila nie robimy
		
		//echo 'Request posted';
		$sql = "INSERT INTO prosba_kontaktu set WIADOMOSC='$wiadomosc', USR_ID ='$userId', OGL_ID = '$ogloszenieId' " ;
		echo $sql;
		include('./db.php');
		if($conn->query($sql)){
            $_SESSION["message"] = 'Dziękujemy, twoja prośba została przesłana do użytkownika, czekaj na kontakt!';
            header("Location: ./search_results.php"); 
		}else{
			//echo 'Błąd bazy danych'.mysqli_error($conn);
            $_SESSION["message"] = 'Wyspąpił błąd podczas planowania spotkania '.mysqli_error($conn).$sql;  
            header("Location: ./search_results.php"); 
		}
	}
?>
	</head>

	<body>
		<?php include('./navi.php'); ?>

		<?php if(strlen($name) > 0){?>
        <div class="back"><a href="./search_results.php">Wróć do listy</a></div>
        <div class="title"> 
           
            <h1>Chcesz zaproponować spotkanie <?php echo $nick;?></h1>
            <h3>Pola oznaczone <span class="asterisk">*</span> są obowiązkowe </h3>
		</div>

		<div class="register">
			<!-- dodac obsluge wpisania do bazy danych -->
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return checkMeeting(this)">
				<fieldset>
					<div class="register_row">
						<label for="content">Napisz proszę wiadomość o spotkaniu<span class="asterisk">*</span></label>
						<textarea id="content" name="content" placeholder="Wpisz treść.." style="height:200px"></textarea>
					</div>
					<input type="hidden" name="meeting_form" value="true">
					<div class="register_row">
						<input type="submit" value="Wyślij prośbę">
					</div>
				</fieldset>
			</form>
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
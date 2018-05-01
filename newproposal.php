<?php
	include('./header.php');
	$page = "new_proposal";
	$access = 'REGISTRED';
	if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['new_proposal_form'] == 'true' ) {

		include('./collectProposalForm.php');
         
		$sql = "INSERT INTO ogloszenia set nick='$nick', opis='$opis', przyjaciel='$przyjaciel', 
            kolega='$kolega', maz_zona='$maz_zona', towarzysz='$towarzysz', wiek='$userAge', USR_ID='$userId', temat='$temat' " ;
        
        $check = getimagesize($_FILES["image_upload"]["tmp_name"]);
        if($check !== false){
            //echo 'Adding image...';
            $size = $_FILES['image_upload']['size'];
            $nazwa = addslashes($_FILES['image_upload']['name']);
            $image =addslashes(file_get_contents($_FILES['image_upload']['tmp_name']));
            $sql .=", ZDJECIE='$image', ZDJECIE_WIELKOSC='$size', ZDJECIE_NAZWA='$nazwa' ";
        }
        //echo $sql;
        include('./db.php');
		if($conn->query($sql)){
            $_SESSION["message"] = 'Twoje ogłoszenie trafiło do administratora, który po sprawdzeniu treści opublikuje je na portalu';
            header("Location: ./proposals.php"); 
		}else{
			//echo 'Błąd bazy danych'.mysqli_error($conn);
			$_SESSION["message"] = 'Wyspąpił błąd podczas zapisu ogłoszenia'.mysqli_error($conn);  
		}
    }
?>

<body>
	<?php include('./navi.php'); ?>

<div class="title">
  <h1>Dodajesz właśnie nowe ogłoszenie</h1>
  <h3>Pola oznaczone <span class="asterisk">*</span> są obowiązkowe </h3>
</div>

<?php if(strlen($name) > 0){?>

<div class="register">

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" onsubmit="return checkProposal(this)"> 
    <?php include('./proposalForm.php'); ?>
	</form>
</div>

<?php }else{ ?>
	<div class="title">
	<h2>Opcja dostępna tylko dla zalogowanych użytkowników</h2>
	</div>
<?php } ?>

<div class="footer">
   <?php include("./footer.php");?>
</div>

</body>
</html>
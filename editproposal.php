<?php
	include('./header.php');
	$page = "edit_proposal";
    $access = 'REGISTRED';

    $formData= array(
        'przyjaciel'        =>'',
        'kolega'            =>'',
        'maz_zona'          =>'',
        'towarzysz'         =>'',
        'nick'              =>'',
        'opis'              =>'',
        'temat'             =>''
    );
    
    if(!empty($_GET['prop_id'])){
        $_SESSION["prop_id"] = $_GET['prop_id'];
    }
    $proposalId = !empty($_SESSION["prop_id"])?$_SESSION["prop_id"]:-1;
    

    if ($_SERVER["REQUEST_METHOD"] == "GET" && $proposalId > 0){
        $sql = "SELECT * FROM OGLOSZENIA WHERE USR_ID='$userId' AND ID='$proposalId' ";
        include('./db.php');
        $result = $conn->query($sql);
		
		if ($result->num_rows) {
            $row = $result->fetch_assoc();

            $formData['nick']= trim($row['NICK']);
            $formData['opis']= trim($row['OPIS']);
            $formData['temat']= trim($row['TEMAT']);
            $formData['przyjaciel']= $row['PRZYJACIEL']==1?'checked':'';
            $formData['kolega']= $row['KOLEGA']=='1'?'checked':'';
            $formData['maz_zona']= $row['MAZ_ZONA']=='1'?'checked':'';
            $formData['towarzysz']= $row['TOWARZYSZ']=='1'?'checked':'';
        }else{
            $_SESSION["message"] = "Wykryto próbę naruszenia zasad bezpieczeństwa, 
                      incydent zostanie zgłoszony administratowori wraz z IP i innymi danymi niezbędnymi do twojej identyfikacji!";
        }
    }


	if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['edit_proposal_form'] == 'true' ) {
        
        //data from the form
        include('./collectProposalForm.php'); 
        
        $sql = "UPDATE ogloszenia set nick='$nick', opis='$opis', przyjaciel='$przyjaciel', 
            kolega='$kolega', maz_zona='$maz_zona', towarzysz='$towarzysz', wiek='$userAge', 
            status = 'N', temat='$temat' ";
        
        $check = getimagesize($_FILES["image_upload"]["tmp_name"]);
        if($check !== false){
            //echo 'Adding image...';
            $size = $_FILES['image_upload']['size'];
            $nazwa = addslashes($_FILES['image_upload']['name']);
            $image = addslashes(file_get_contents($_FILES['image_upload']['tmp_name']));
            $sql .=", ZDJECIE='$image', ZDJECIE_WIELKOSC='$size', ZDJECIE_NAZWA='$nazwa' ";
        }
        $sql .=" WHERE ID = '$proposalId' AND USR_ID='$userId' ";
        //echo $sql;
        include('./db.php');
		if($conn->query($sql)){
            $_SESSION["message"] = 'Twoje ogłoszenie trafiło do administratora, który po sprawdzeniu treści opublikuje je na portalu'; 
            header("Location: ./proposals.php");
            //exit;
            
		}else{
			//echo 'Błąd bazy danych'.mysqli_error($conn);
			$_SESSION["message"] = 'Wyspąpił błąd podczas zapisu ogłoszenia'.mysqli_error($conn);  
		}
    }
?>

<body>
	<?php include('./navi.php'); ?>

<div class="title">
  <h1>Edycja ogłoszenia</h1>
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
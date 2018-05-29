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
        $sql = "SELECT * FROM ogloszenia WHERE USR_ID='$userId' AND ID='$proposalId' ";
        include('./db.php');
        $result = $conn->query($sql);
		
		if (!$result->num_rows) {
            $_SESSION["message"] = "Wykryto próbę naruszenia zasad bezpieczeństwa, 
                      incydent zostanie zgłoszony administratowori wraz z IP i innymi danymi niezbędnymi do twojej identyfikacji!";
            header("Location: ./proposals.php");
            exit;
        }

        $sql = "UPDATE ogloszenia set status = 'D' WHERE ID = '$proposalId' AND USR_ID='$userId' ";
        //echo $sql;
		if($conn->query($sql)){
            $_SESSION["message"] = 'Twoje ogłoszenie zostało pomyślnie usunięte!'; 
            header("Location: ./proposals.php");
            //exit; 
		}else{
			//echo 'Błąd bazy danych'.mysqli_error($conn);
			$_SESSION["message"] = 'Wyspąpił błąd podczas usuwania ogłoszenia'.mysqli_error($conn);  
		}
    }
?>
<body>
	<?php include('./navi.php'); ?>

<div class="title">
  <h1>UWAGA - usuwamy ogłoszenie</h1>
  
</div>

<?php if(strlen($name) > 0){?>
    <h3>Czy jesteś pewien, że tołoje ogłosznie <i><b><?php echo  $formData['temat'];?></b></i> ma zostać skasowane?</h3>
    <div class="delete_section">
        <form action="remove_"
        <div class="skasuj"><button type="submit">Skasuj</button></div>
        <div class="powrot"><button type="submit">Powrót</button></div>
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
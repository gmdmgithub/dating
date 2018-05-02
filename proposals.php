<?php
	include('./header.php');
	$page = "proposals";
	$access = 'REGISTRED';
?>
</head>

<body>
    <?php include('./navi.php'); ?>

    <?php if(strlen($name) > 0){
		include('./db.php');
?>
    <div class="title">
        <h1>Lista twoich ogłoszeń</h1>
        
    </div>
    <br>

    <div class="results_list">
        <?php
		$sql = "SELECT * FROM OGLOSZENIA WHERE USR_ID='$userId' AND STATUS <>'D'";
		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
            while($row = $result->fetch_assoc()) {?>

            <div class="res_row">
                <div class="result_nick">
                    <?php echo $row['NICK'];?>
                </div>
                <div class="result_edit">
                    <a href="./editproposal.php?prop_id=<?php echo $row['ID'];?>">Edytuj</a>
                </div>
                <div class="result_delete">
                    <a href="./deleteproposal.php?prop_id=<?php echo $row['ID'];?>" onclick="return confirm('Jetsteś pewnien, że chcesz usunąć ogłoszenie?')">Usuń</a>
                </div>
            </div>
            
            <div class="res_row">
                <div class="result_1">Temat: </div>
                <div class="result_2">
                    <?php echo $row['TEMAT']?>
                </div>
            </div>

            <div class="res_row">
                <div class="result_1">Opis: </div>
                <div class="result_2">
                    <?php echo $row['OPIS']?>
                </div>
            </div>

            <?php
                    $kogo_szukam = '';
                    if($row['PRZYJACIEL'])
                        $kogo_szukam .=" Przyjaciela,";
                    if($row['KOLEGA'])
                        $kogo_szukam .=" Kolegi, ";
                    if($row['MAZ_ZONA'])
                        $kogo_szukam .=" Męża/Żony, ";
                    if($row['TOWARZYSZ'])
                        $kogo_szukam .=" Toważysza, ";
                ?>
                <div class="res_row">
                    <div class="result_1">Szukam: 
                    </div>
                    <div class="result_2">
                        <?php echo $kogo_szukam?>
                    </div>
                </div>

                <?php
                    $status = 'Nowe - oczekuje na akceptacje';
                    if($row['STATUS'] == 'A')  $status ='Aktywne';
                    if($row['STATUS'] == 'O')  $status ='Archiwalne';
                ?>
                <div class="res_row">
                    <div class="result_1">Status: </div>
                    <div class='result_2'>
                        <?php echo $status?>
                    </div>
            </div>
                    <?php if($row['ZDJECIE_WIELKOSC'] >0){?>
                        <div class="res_row last_row">
                            <div class="result_1">Zdjecie: </div>
                            <div class="result_2">
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['ZDJECIE'])?>" width="300" />
                            </div>
                    </div>
                   
                    <?php }?>
             <div class="end_row"></div>
            <?php }
		} else {
			echo "<h2> Nie masz jeszcze żadnych ogłoszeń zapraszamy do zamieszczenia!!</h2>";
		}
	 ?>
    </div>
    <div class="title">
        <div class="newproposal">
            <p class="pproposal">Chcesz dodać nowe ogłoszenie?</p>
            <a href="./newproposal.php">Nowe ogłoszenie</a>
        </div>
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
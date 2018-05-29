<?php
	include('./header.php');
	$page = "admin";
	$access = 'ADMIN';
	if($_SERVER["REQUEST_METHOD"] == "POST" ) {
        //zrob coś jak przyjdzie post
    }
?>
    <link rel="stylesheet" href="css/admin.css">
	</head>

	<body>
		<?php include('./navi.php'); 

		if($admin == 'ADMIN'){
            include('./db.php');
            $a_users = 0;
            $n_users = 0;
            
            //zapytania o użytkowników
            $sql = "SELECT count(*) A_USERS FROM uzytkownicy";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { 
                $row = $result->fetch_assoc();
                $a_users =  $row['A_USERS'];
            }   
            $sql = "SELECT count(*) N_USERS FROM uzytkownicy WHERE STATUS = 'T' "; 
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { 
                $row = $result->fetch_assoc();
                $n_users =  $row['N_USERS'];
            }

            $a_proposals = 0;
            $n_proposals = 0;
            //zapytania o ogłoszenia
            $sql = "SELECT count(*) A_PROP FROM ogloszenia";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { 
                $row = $result->fetch_assoc();
                $a_proposals =  $row['A_PROP'];
            }
            $sql = "SELECT count(*) N_PROP FROM ogloszenia WHERE STATUS = 'N'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { 
                $row = $result->fetch_assoc();
                $n_proposals =  $row['N_PROP'];
            }   
            
            $a_questions = 0;
            $n_questions = 0;
            //zapytania o pytania
            $sql = "SELECT count(*) A_QUEST FROM pytania";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { 
                $row = $result->fetch_assoc();
                $a_questions =  $row['A_QUEST'];
            }
            $sql = "SELECT count(*) N_QUEST FROM pytania WHERE STATUS = 'N'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { 
                $row = $result->fetch_assoc();
                $n_questions =  $row['N_QUEST'];
            }
            
            
            $a_invitations = 0;
            //zapytania o zaproszenia
            $sql = "SELECT count(*) A_INV FROM prosba_kontaktu";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { 
                $row = $result->fetch_assoc();
                $a_invitations =  $row['A_INV'];
            }
        ?>
        
        <div class="title">
			<h1>Strona administratora</h1>
		</div>
        
        <div class="admin_panel">
            <div class="admin_box users">
                <p class="title">Użytkownicy</p>
                <div class="all name">Wszyscy</div>
                <div class="all value"><?php echo $a_users; ?></div>
                <div class="confirm name"> Do potwierdzenia</div>
                <div id="u_value" class="confirm value"><a href="./usersManagement.php"><?php echo $n_users; ?></a> </div>
            </div>
            <div class="admin_box proposals">
                <p class="title">Ogłoszenia</p>
                <div class="all name">Wszystkich ogłoszeń</div>
                <div class="all value"><?php echo $a_proposals; ?></div>
                <div class="confirm name"> Do potwierdzenia</div>
                <div id="p_value" class="confirm value"> <a href="#"><?php echo $n_proposals; ?></a></div>
            </div>
            <div class="space"></div>
            <div class="admin_box questions">
                <p class="title">Pytania</p>
                <div class="all name">Wszystkich</div>
                <div class="all value"><?php echo $a_questions; ?></div>
                <div class="confirm name"> Do odpowiedzi</div>
                <div id="q_value" class="confirm value"> <a href="#"><?php echo $n_questions; ?></a></div>
            </div>

            <div class="admin_box meetings">
                <p class="title">Zaproszeń</p>
                <div class="all mcontent name">Całkowita liczba</div>
                <div id="m_value" class="all mcontent value"><?php echo $a_invitations; ?></div>
            </div>
        
        </div>
        
        

		<?php }else{ 
            $_SESSION["message"] = "Wykryto próbę naruszenia zasad bezpieczeństwa, 
                      incydent zostanie zgłoszony administratowori wraz z IP i innymi danymi niezbędnymi do twojej identyfikacji!";        
            header("Location: ./");
            
		 } ?>


		

		<div class="footer">
			<?php include("./footer.php");?>
		</div>

	</body>

</html>
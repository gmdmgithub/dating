<?php
	include('./header.php');
	$page = "userManagement";
    $access = 'ADMIN';
    if($admin != 'ADMIN'){
        $_SESSION["message"] = "Wykryto próbę naruszenia zasad bezpieczeństwa, 
        incydent zostanie zgłoszony administratowori wraz z IP i innymi danymi niezbędnymi do twojej identyfikacji!";        
        header("Location: ./");
        exit;
    }
    include('./db.php');

    if(!empty($_GET['id']) && !empty($_GET['activate'])){
        //echo 'Dodać akcję aktywowania używtkonika';
        $id = $_GET['id'];
        $sql = " UPDATE uzytkownicy  SET STATUS = 'A' where ID ='$id' ";
        //echo $sql;
        $result = $conn->query($sql);
    }
?>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<?php include('./navi.php'); ?>
<div class="u-wrapper">
<div class="title">
  <h1>Poniżej lista użytkowników</h1>
</div>

<div class="user-row header">
    <div class="u-name">Imię Nazwisko</div>
    <div class="u-email">emai</div>
    <div class="u-login">login</div>
    <div class="u-reg-date">Data rejestracji</div>
    <div class="u-desc">Opis</div>
    <div class="u-status">Status</div>
    <div class="a-activate">Aktywuj</div>
    <div class="a-desactivate">Deaktywuj</div>
</div>

<?php



$sql = " SELECT * FROM uzytkownicy  where ID !='$userId' ORDER BY ID DESC ";
//echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {  
    while($row = $result->fetch_assoc()) {
        //echo $row['LOGIN']."<br>";
    ?>
    
    <div class="user-row">
    <div class="u-name"><?php echo $row['IMIE']?> <?php echo $row['NAZWISKO']?></div>
    <div class="u-email"><?php echo $row['EMAIL']?></div>
    <div class="u-login"><?php echo $row['LOGIN']?></div>
    <div class="u-reg-date"><?php echo $row['DATA_REJESTRACJI']?></div>
    <div class="u-desc"><?php echo $row['OPIS']?></div>
    <div class="u-status"><?php echo $row['STATUS']?></div>
    <div>
        <div class="d-activate">
            <a href="./usersManagement.php?activate=y&id=<?php echo $row['ID'];?>" >Aktywuj</a>
        </div>
    </div>
    <div class="a-desactivate">Deaktywuj</div>
</div>


   <?php }
}
?>

</div>
<div class="footer">
  <?php include("./footer.php");?>
</div>
<?php

$message = $_SESSION["message"];

//user data
$name = $pass =  $admin =  "";
///search results
$gender = checkSessiontData("gender");	
$gender_search = checkSessiontData("gender_search");
$purpose = checkSessiontData("purpose");
$year_range = checkSessiontData("year_range");
$live = checkSessiontData("live");
$photos = checkSessiontData("photos");

$userId =  checkSessiontData("userId");
$userAge =  checkSessiontData("userAge");

if($_SESSION["logged"] == null){
    $_SESSION["logged"] = "NO";
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // clear the values - do something
    // if(isset($_GET['some_'])){}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name =checkPostData('login');
    $pass = checkPostData('pass');
    $gender = checkPostData('gender');
    $gender_search = checkPostData('gender_search');
    $purpose = checkPostData('purpose');
    $year_range = checkPostData('year_range');
    $live = checkPostData('live');
    $photos = checkPostData('photos');
    $logoff = checkPostData('logoff');

    
    if(strlen($name) >0 && strlen($pass) >0 ){
        //echo 'logujemy uzytkownika';
        $pass =  sha1($pass);
        //011c945f30ce2cbafc452f39840f025693339c42  -1111 - domino
        //d033e22ae348aeb5660fc2140aec35850c4da997 - admin - adamn
        //d2d8ca0d198d7ec784d31f99088715933364b1ac  - adam12345 - adamn
        // - jankowalski
        //połączenie do bazy danych
        
        $sql = "SELECT ID, ROK_URODZENIA, TYP FROM uzytkownicy WHERE HASLO =\"".$pass."\" AND LOGIN=\"".$name."\" AND STATUS=\"A\"";
        //echo $sql;
        include('./db.php');
        $results = $conn->query($sql);
        if($results->num_rows > 0){
            $row = $results->fetch_assoc();
            $userId = $row['ID'];
            $admin = $row['TYP']=='A'?'ADMIN':'';
            $userAge = date("Y") - $row['ROK_URODZENIA'];
            //echo "Age: ".$userAge."<br>";
            $_SESSION["name"] = $name;
            $_SESSION["userId"] = $userId;
            $_SESSION["logged"] = "YES";
            $_SESSION["userAge"] = $userAge;
            $_SESSION['admin']= $admin;
            $_POST["logoff"] = "";
            $logoff ='';

            //header("Location: ./"); /* Redirect to main page */
            //exit();
        
        }else{
            $_SESSION["message"] = 'Nieprawidłowy login lub hsało, proszę spróbować ponownie';
            header("Location: ./index.php");
        }

    } 
    //error_log("sprawdzam logoff: najważniejszy ".$logoff);
    // foreach ($_POST as $key => $value) {
    // 	error_log( "key: ".$key);
    // 	error_log( "value: ".$value);
    // }
    if($logoff == "YES" && $_POST['logoff'] == 'YES'){

        error_log("header metoda logoff  serwera: ".$_SERVER["REQUEST_METHOD"]);

        $_SESSION["logged"] = "NO";
        $_SESSION["name"] = "";
        $_SESSION["pass"] = "";
        $_SESSION["admin"] = "";
        $_POST["logoff"] = "";
        $_POST["pass"] = "";
        $logoff = "";
        header("Location: ./index.php");
        exit; 
    }
}	
$name = $_SESSION["name"];
$admin = $_SESSION["admin"];
//echo $admin;


function checkPostData($postdata){
    
    if(array_key_exists($postdata, $_POST)){
        if( strlen(trim($_POST[$postdata])) == 0)
            return "";
        $_SESSION[$postdata] = trim($_POST[$postdata]);
        //echo "session: ".$_SESSION[$postdata]." co to jest? <br>";
        return trim($_POST[$postdata]); 
    }
    return array_key_exists($postdata, $_SESSION) ? trim($_SESSION[$postdata]) : "";
}

function checkSessiontData($sessiondata){
    if(array_key_exists($sessiondata, $_SESSION)){
        return trim($_SESSION[$sessiondata]); 
    }
    return "";
}
function replace_bad_expr($input){
    $output = preg_replace("/[^a-zA-Z0-9_-]/","",$input); //replace bad character form GET request
    return $output; 
}
?>
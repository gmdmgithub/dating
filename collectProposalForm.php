<?php
$nick =checkPostData('nick');
$opis = checkPostData('opis');

$przyjaciel = "0";
$kolega = "0";
$maz_zona = "0";
$towarzysz = "0";
if(!empty($_POST['szukam'])) {
    foreach($_POST['szukam'] as $check) {
        if($check == "przyjaciela" )
            $przyjaciel = "1"; 
        if($check == "kolega" )
            $kolega = "1";
        if($check == "maz_zona" )
            $maz_zona = "1";
        if($check == "towazysza" )
            $towarzysz = "1";  
    }
}
?>
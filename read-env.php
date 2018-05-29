
<?php
    $db_username = "root";
    $db_passward = "root";
    $db_host = "localhost";
    $db_database = "dating_db";

    $handle = fopen(".env", "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $line = trim(str_replace("\n", "", $line));
            if(strpos($line,'DB_USERNAME') === 0 )
                $db_username = getValueFromDotenv($line);
            if(strpos($line,'DB_PASSWORD') === 0 )
                $db_passward = getValueFromDotenv($line);
            if(strpos($line,'DB_HOST') === 0 )
                $db_host = getValueFromDotenv($line);
            if(strpos($line,'DB_DATABASE') === 0 )
                $db_database = getValueFromDotenv($line);
        }
        fclose($handle);
    } else {
        error_log("FATAL ERROR - brak danych o środowisku");
    } 

    function getValueFromDotenv($envLine){
        //echo $envLine."<br>";
        return trim(substr($envLine,stripos($envLine,"=")+1));
    }
?>
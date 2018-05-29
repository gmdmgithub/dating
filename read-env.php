
<?php
    $db_username = "root";
    $db_passward = "root";
    $db_host = "localhost";
    $db_database = "dating_db";

    $handle = fopen(".env", "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $line = str_replace("\n", "", $line);
            if(strpos($line,'DB_USERNAME') !== false )
                $db_username = getValueFromDotenv($line);
            if(strpos($line,'DB_PASSWORD') !== false )
                $db_passward = getValueFromDotenv($line);
            if(strpos($line,'DB_HOST') !== false )
                $db_host = getValueFromDotenv($line);
            if(strpos($line,'DB_DATABASE') !== false )
                $db_database = getValueFromDotenv($line);
        }
        fclose($handle);
    } else {
        error_log("FATAL ERROR - brak danych o środowisku");
    } 

    function getValueFromDotenv($envLine){
        return trim(substr($envLine,stripos($envLine,"=")+1));
    }
?>
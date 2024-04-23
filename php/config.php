<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/Assignment6_WP/php/cors.php");
    $env = parse_ini_file('.env');

    $host = $env["DB_HOST"];
    $user = $env["DB_USER"];
    $password = $env["DB_PASSWORD"];
    $database = $env["DB_NAME"];

    try{
        $conn = mysqli_connect($host, $user, $password, $database);
    }
    catch(Exception $e){
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
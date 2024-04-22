<?php
    $env = parse_ini_file('.env');

    $host = $env["DB_HOST"];
    $user = $env["DB_USER"];
    $password = $env["DB_PASSWORD"];
    $database = $env["DB_NAME"];

    try{
        $conn = mysqli_connect($host, $user, $password, $database);
        //try to print the whole content of the row with id = 2
        $sql = "SELECT * FROM File WHERE id = 2";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo "id: " . $row["id"] . "<br>";
        echo "title: " . $row["title"] . "<br>";

    }
    catch(Exception $e){
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
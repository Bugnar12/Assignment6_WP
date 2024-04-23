<?php

    include($_SERVER["DOCUMENT_ROOT"] . "/Assignment6_WP/php/config.php");
    header('Content-Type: application/json; charset=UTF-8');

    if($_SERVER["REQUEST_METHOD"] != "GET"){
        header("HTTP 1.1/ 405 Method not allowed");
        http_response_code(405);
        die();
    }

    $sql = "SELECT SQL_CACHE * FROM `File`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }

    //important to free any used resources
    $stmt->free_result();
    $stmt->close();
    $conn->close();

    $json = json_encode($data);
    if($json === false)
    {
        echo json_last_error_msg();
    }
    else
    {
        echo $json;
    }
    http_response_code(200); //we have a successfult http request
    exit();

?>
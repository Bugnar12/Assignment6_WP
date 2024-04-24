<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/Assignment6_WP/php/config.php");
    header('Content-Type: application/json; charset=UTF-8');

    if($_SERVER["REQUEST_METHOD"] != "POST"){
        echo json_encode(array("error" => "Invalid request method"));
        http_response_code(405);
        die();
    }

    $data = json_decode(file_get_contents('php://input'), true);
    $genre = $data["genre"] ?? null;

    if($genre !== null){
        $stmt = $conn->prepare("SELECT title FROM File WHERE genre = ?");
        $stmt->bind_param("s", $genre);
    } else {
        $stmt = $conn->prepare("SELECT title FROM File");
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while($row = $result->fetch_assoc()){
        $data[] = $row['title'];
    }

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
    http_response_code(200);
    exit();
?>
<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/Assignment6_WP/php/config.php");
    header('Content-Type: application/json');

    if($_SERVER["REQUEST_METHOD"] != "PUT"){
        header("HTTP 1.1/ 405 Method not allowed");
        http_response_code(405);
        die();
    }

    parse_str(file_get_contents("php://input"),$_PUT);

    if(isset($_PUT['id']) && !empty(trim($_PUT['id'])))
    {
        $id = $_PUT['id'];
        $title = $_PUT['title'];
        $format_type = $_PUT['format_type'];
        $genre = $_PUT['genre'];
        $path = $_PUT['path'];

        $stmt = $conn->prepare("UPDATE File SET title = ?, format_type = ?, genre = ?, path = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $title, $format_type, $genre, $path, $id);

        if($stmt->execute()){
            echo json_encode(array("message" => "The file was successfully updated!"));
        } else {
            echo json_encode(array("message" => "The file could not be updated!"));
        }

        $stmt->close();
    }
    $conn->close();
?>
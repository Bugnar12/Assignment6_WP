<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/Assignment6_WP/php/config.php");
    header('Content-Type: application/json');

    if($_SERVER["REQUEST_METHOD"] != "PUT"){
        echo json_encode(array("error" => "Invalid request method"));
        http_response_code(405);
        die();
    }

    $data = json_decode(file_get_contents('php://input'), true);

    if(isset($data['id']) && !empty(trim($data['id'])))
    {
        $id = $data['id'];
        $title = $data['title'];
        $format_type = $data['format_type'];
        $genre = $data['genre'];
        $path = $data['path'];

        $stmt = $conn->prepare("UPDATE File SET title = ?, format_type = ?, genre = ?, path = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $title, $format_type, $genre, $path, $id);

        if($stmt->execute()){
            echo json_encode(array("message" => "The file was successfully updated!"));
        } else {
            echo json_encode(array("message" => "The file could not be updated!"));
        }

        $stmt->close();
    } else {
        echo json_encode(array("error" => "Missing or empty 'id' parameter"));
    }
    $conn->close();
?>
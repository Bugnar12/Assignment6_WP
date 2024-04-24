<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/Assignment6_WP/php/config.php");
    header('Content-Type: application/json');

    if($_SERVER["REQUEST_METHOD"] != "DELETE"){
        echo json_encode(array("error" => "Invalid request method"));
        http_response_code(405);
        die();
    }

    $data = json_decode(file_get_contents('php://input'), true);

    if(isset($data['id']) && !empty(trim($data['id'])))
    {
        $id = $data['id'];
        $stmt = $conn->prepare("DELETE FROM File WHERE id = ?");
        $stmt->bind_param("i", $id);

        if($stmt->execute()){
            if($conn->affected_rows > 0){
                echo json_encode(array("message" => "The file was successfully deleted!"));
            } else {
                echo json_encode(array("message" => "The file could not be deleted!"));
            }
        } else {
            echo json_encode(array("message" => "Error executing the SQL statement: " . $stmt->error));
        }

        $stmt->close();
    } else {
        echo json_encode(array("error" => "Missing or empty 'id' parameter"));
    }
    $conn->close();
?>
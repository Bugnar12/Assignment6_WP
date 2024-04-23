<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/Assignment6_WP/php/config.php");
    header('Content-Type: application/json');

    if($_SERVER["REQUEST_METHOD"] != "DELETE"){
        header("HTTP 1.1/ 405 Method not allowed");
        http_response_code(405);
        die();
    }

    parse_str(file_get_contents("php://input"),$_DELETE);

    if(isset($_DELETE['id']) && !empty(trim($_DELETE['id'])))
    {
        $id = $_DELETE['id'];
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
    }
    $conn->close();
?>
<?php
    include($_SERVER['DOCUMENT_ROOT'].  "/Assignment6_WP/php/config.php");
    header('Content-Type: application/json');

    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        header("HTTP 1.1/ 405 Method not allowed");
        http_response_code(405);
        die();
    }

    // Check if the $_POST variables are set
    if(isset($_POST['title']) &&
       isset($_POST['format_type']) &&
       isset($_POST['genre']) &&
       isset($_POST['path']))
    {
        $title = $_POST['title'];
        $format_type = $_POST['format_type'];
        $genre = $_POST['genre'];
        $path = $_POST['path'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO file (title, format_type, genre, path) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            // An error occurred, display it
            echo json_encode(array("error" => "Error preparing the SQL statement: " . $conn->error));
            die();
        }

        // Bind the parameters
        $stmt->bind_param("ssss", $title, $format_type, $genre, $path);

        // Execute the statement
        if($stmt->execute()){
            echo json_encode(array("message" => "File was created successfully"));
        } else {
            echo json_encode(array("error" => "Error executing the SQL statement: " . $stmt->error));
        }

        // Close the statement
        $stmt->close();
    } else {
        error_log(var_export($_POST, true));
        echo json_encode(array("error" => "Not all required POST parameters were provided."));
    }

    // Close the connection
    $conn->close();
?>
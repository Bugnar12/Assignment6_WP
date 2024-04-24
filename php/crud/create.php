<?php
    include($_SERVER['DOCUMENT_ROOT'].  "/Assignment6_WP/php/config.php");
    header('Content-Type: application/json');

    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        header("HTTP 1.1/ 405 Method not allowed");
        http_response_code(405);
        die();
    }

    $data = json_decode(file_get_contents('php://input'), true);

    //log the json version of the data

    // Check if the data variables are set
    if(isset($data['title']) &&
       isset($data['format_type']) &&
       isset($data['genre']) &&
       isset($data['path']))
    {
    //below log any json so that I see it passes the if
        $title = $data['title'];
        $format_type = $data['format_type'];
        $genre = $data['genre'];
        $path = $data['path'];

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
        error_log(var_export($data, true));
        echo json_encode(array("error" => "Not all required POST parameters were provided."));
    }

    // Close the connection
    $conn->close();
?>
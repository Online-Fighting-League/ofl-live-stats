<?php
    $heardData = file_get_contents("php://input");
    if(!json_decode($heardData, true)) {
        // is not valid json
        return http_response_code(400);
    }

    $conn = new mysqli('{servername}', '{username}', '{password}', '{dbname}');

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // construct query
    $sql = "INSERT INTO loggy (logWhen, logWhat) VALUES (now(), '$heardData')";
    if ($conn->query($sql) === TRUE) {
        return http_response_code(201);
    } else {
        print "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>

<?php

// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'rmmcdatabase';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM goal_and_objective";

    $statement = $conn->prepare($sql);

    if (!$statement) {
        throw new Exception("Database prepare failed: " . $conn->error);
    }

    $statement->execute();
    $result = $statement->get_result();

    $courseData = array();

    while ($row = $result->fetch_assoc()) {
        $courseData[] = array(
            "id" => $row["id"],
            "text" => $row["text"],
            "college_id" => $row["college_id"],
            "department_id" => $row["department_id"],
            "date_added" => $row["date_added"],
            "date_updated" => $row["date_updated"],
        
        );
    }

    header('Content-Type: application/json');
    echo json_encode($courseData);

    $statement->close();
    $conn->close();

} catch (Exception $error) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(array("error" => $error -> getMessage()));
}

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

    if ($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }

    // Get the table name from the query parameter
    if (!isset($_GET['table'])) {
        throw new Exception("Table name not provided");
    }

    $table = $_GET['table'];

    // Validate the table name to prevent SQL injection
    $allowedTables = [
        "admin",
        "college",
        "contactnumber",
        "course",
        "coursecurriculum",
        "coursereview",
        "department",
        "examdate",
        "goal",
        "goal_and_objective",
        "instructor",
        "news",
        "newsauthor",
        "scholarship",
        "school",
        "student"
    ];

    if (!in_array($table, $allowedTables)) {
        throw new Exception("Invalid table name");
    }

    $sql = "SHOW COLUMNS FROM $table";
    $statement = $conn -> prepare($sql);

    if (!$statement) {
        throw new Exception("Database prepare failed: " . $conn -> error);
    }

    $statement -> execute();
    $result = $statement -> get_result();

    $attributes = array();

    while ($row = $result -> fetch_assoc()) {
        $attributes[] = $row["Field"];
    }

    header('Content-Type: application/json');
    echo json_encode($attributes);

    $statement -> close();
    $conn -> close();

} catch (Exception $error) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(array("error" => $error -> getMessage()));
}

?>

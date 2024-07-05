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

    $sql = "SELECT * FROM college";
    $statement = $conn->prepare($sql);

    if (!$statement) {
        throw new Exception("Database prepare failed: " . $conn->error);
    }

    $statement->execute();
    $result = $statement->get_result();

    $collegeData = array();

    while ($row = $result->fetch_assoc()) {
        $collegeData[] = array(
            "id" => $row["id"],
            "name" => $row["name"],
            "banner_file_path" => $row["banner_file_path"],
            "logo_file_path" => $row["logo_file_path"],
            "organizational_chart_file_path" => $row["organizational_chart_file_path"],
            "secretary" => $row["secretary"],
            "email" => $row["email"],
            "mission" => $row["mission"],
            "vission" => $row["vission"],
            "program_educational_objectives" => $row["program_educational_objectives"]
        );
    }

    header('Content-Type: application/json');
    echo json_encode($collegeData);

    $statement->close();
    $conn->close();

} catch (Exception $error) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(array("error" => $error -> getMessage()));
}

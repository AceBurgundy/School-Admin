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

    $sql = "SELECT * FROM student";

    $statement = $conn->prepare($sql);

    if (!$statement) {
        throw new Exception("Database prepare failed: " . $conn->error);
    }

    $statement->execute();
    $result = $statement->get_result();

    $courseData = array();

    while ($row = $result->fetch_assoc()) {
        $courseData[] = array(
            "title" => $row["title"],
            "image" => $row["image"],
            "date_added" => $row["date_added"],
            "date_updated" => $row["date_updated"],
            "rating" => $row["rating"],
            "language_used" => $row["language_used"],
            "number_of_lessons" => $row["number_of_lessons"],
            "number_of_quizes" => $row["number_of_quizes"],
            "course_level" => $row["course_level"],
            "duration" => $row["duration"],
            "description" => $row["description"],
            "what_will_you_learn" => $row["what_will_you_learn"],
            "instructorFirstName" => $row["instructorFirstName"],
            "instructorLastName" => $row["instructorLastName"],
            "departmentName" => $row["departmentName"]
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

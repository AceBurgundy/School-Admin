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

    $sql = "SELECT Course.title, Course.image, Course.date_added, Course.date_updated, Course.rating, Course.language_used,
                   Course.number_of_lessons, Course.number_of_quizes, Course.course_level, Course.duration,
                   Course.description, Course.what_will_you_learn,
                   Instructor.first_name AS instructorFirstName, Instructor.last_name AS instructorLastName,
                   Department.name AS departmentName
            FROM Course
            LEFT JOIN Instructor ON Course.instructor_id = Instructor.id
            LEFT JOIN Department ON Course.department_id = Department.id";

    $statement = $conn->prepare($sql);

    if (!$statement) {
        throw new Exception("Database prepare failed: " . $conn->error);
    }

    $statement->execute();
    $result = $statement->get_result();

    $courseData = array();

    while ($row = $result->fetch_assoc()) {
        $courseData[] = array(
            "name" => $row["name"],
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

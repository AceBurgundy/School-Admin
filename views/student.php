<?php

require_once './Route.php';

$student = new Route();

$student -> get('students', function() {
    try {
        $sql = "SELECT * FROM student";

        $statement = Route::$conn -> prepare($sql);

        if (!$statement) {
            throw new Exception("Database prepare failed: " . Route::$conn -> error);
        }

        $statement -> execute();
        $result = $statement -> get_result();

        $courseData = array();

        while ($row = $result -> fetch_assoc()) {
            $courseData[] = array(
                "id" => $row["id"],
                "first_name" => $row["first_name"],
                "middle_initial" => $row["middle_initial"],
                "last_name" => $row["last_name"],
                "extension" => $row["extension"],
                "exam_date_id" => $row["exam_date_id"],
                "school_id" => $row["school_id"],
                "scholarship_id" => $row["scholarship_id"],
                "date_added" => $row["date_added"],
                "date_updated" => $row["date_updated"]
            );
        }

        header('Content-Type: application/json');
        Route::echoJSON($courseData);

        $statement -> close();

    } catch (Exception $error) {
        http_response_code(500);
        header('Content-Type: application/json');
        Route::echoJSON(array("error" => $error -> getMessage()));
    }
});

$student -> post('create', function($data) {
    $first_name = $_POST['first_name'];
    $middle_initial = $_POST['middle_initial'];
    $last_name = $_POST['last_name'];
    $extension = $_POST['extension'];
    $exam_date_id = $_POST['exam_date_id'];
    $school_id = $_POST['school_id'];
    $scholarship_id = $_POST['scholarship_id'];

    $errorMessages = array();

    // Validation checks
    if (empty($first_name)) {
        $errorMessages[] = 'First name is required';
    }

    if (strlen($first_name) > 255) {
        $errorMessages[] = 'First name should not exceed 255 characters';
    }

    if (!empty($middle_initial) && strlen($middle_initial) > 2) {
        $errorMessages[] = 'Middle initial should not exceed 2 characters';
    }

    if (empty($last_name)) {
        $errorMessages[] = 'Last name is required';
    }

    if (strlen($last_name) > 255) {
        $errorMessages[] = 'Middle initial should not exceed 2 characters';
    }

    if (!empty($extension) && strlen($extension) > 255) {
        $errorMessages[] = 'Last name should not exceed 255 characters';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "INSERT INTO student (first_name, middle_initial, last_name, extension, exam_date_id, school_id, scholarship_id)
         VALUES (?, ?, ?, ?, ?, ?, ?)"
    );

    $statement -> bind_param("ssssiis", $first_name, $middle_initial, $last_name, $extension, $exam_date_id, $school_id, $scholarship_id);

    if ($statement -> execute()) {
        Route::respondSuccess('Student record has been created successfully');
    } else {
        Route::respondError('Failed to create student record');
    }

    $statement -> close();
});

$student -> post('update', function($data) {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $middle_initial = $_POST['middle_initial'];
    $last_name = $_POST['last_name'];
    $extension = $_POST['extension'];
    $exam_date_id = $_POST['exam_date_id'];
    $school_id = $_POST['school_id'];
    $scholarship_id = $_POST['scholarship_id'];

    $errorMessages = array();

    // Validation checks
    if (empty($first_name)) {
        $errorMessages[] = 'First name is required';
    }

    if (strlen($first_name) > 255) {
        $errorMessages[] = 'First name should not exceed 255 characters';
    }

    if (!empty($middle_initial) && strlen($middle_initial) > 2) {
        $errorMessages[] = 'Middle initial should not exceed 2 characters';
    }

    if (empty($last_name)) {
        $errorMessages[] = 'Last name is required';
    }

    if (strlen($last_name) > 255) {
        $errorMessages[] = 'Middle initial should not exceed 2 characters';
    }

    if (!empty($extension) && strlen($extension) > 255) {
        $errorMessages[] = 'Last name should not exceed 255 characters';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "UPDATE student
         SET first_name = ?, middle_initial = ?, last_name = ?, extension = ?, exam_date_id = ?, school_id = ?, scholarship_id = ?
         WHERE id = ?;"
    );

    $statement -> bind_param("ssssiisi", $first_name, $middle_initial, $last_name, $extension, $exam_date_id, $school_id, $scholarship_id, $student_id);

    if ($statement -> execute()) {
        Route::respondSuccess('Student record has been updated successfully');
    } else {
        Route::respondError('Failed to update student record');
    }

    $statement -> close();
});

$student -> post('delete', function($data) {
    $student_id = $_POST['id'];

    $errorMessages = array();

    // Validation checks
    if (empty($student_id)) {
        $errorMessages[] = 'Student ID is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    $statement = Route::$conn -> prepare(
        "DELETE FROM student
         WHERE id = ?"
    );

    $statement -> bind_param("i", $student_id);

    if ($statement -> execute()) {
        Route::respondSuccess('Student record has been updated successfully');
    } else {
        Route::respondError('Failed to update student record');
    }

    $statement -> close();
});

Route::handleRequest();
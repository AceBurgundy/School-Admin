<?php

require_once './Route.php';

$coursecurriculum = new Route();

$coursecurriculum->get('coursecurriculums', function() {
    try {
    
        $sql = "SELECT * FROM coursecurriculum";
    
        $statement = Route::$conn->prepare($sql);
    
        if (!$statement) {
            throw new Exception("Database prepare failed: " . Route::$conn->error);
        }
    
        $statement->execute();
        $result = $statement->get_result();
    
        $courseData = array();
    
        while ($row = $result->fetch_assoc()) {
            $courseData[] = array(
                "id" => $row["id"],
                "text" => $row["text"],
                "course_id" => $row["course_id"],
                "data_added" => $row["date_added"],
                "data_updated" => $row["date_updated"]
            );
        }
    
        header('Content-Type: application/json');
        Route::echoJSON($courseData);
    
        $statement->close();
    
    } catch (Exception $error) {
        http_response_code(500);
        header('Content-Type: application/json');
        Route::echoJSON(array("error" => $error -> getMessage()));
    }
});

$coursecurriculum->post('create', function($data) {
    
    $text = $_POST['input_text'];
    $course_id = $_POST['course_id'];
    
    $errorMessages = array();
    
    // Validation checks
    if (empty($text)) {
        $errorMessages[] = 'Text is required';
    }
    
    if (empty($course_id)) {
        $errorMessages[] = 'Course ID is required';
    }
    
    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }
    
    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "INSERT INTO coursecurriculum (text, course_id)
         VALUES (?, ?)"
    );
    
    $statement -> bind_param("si", $text, $course_id);
    
    if ($statement -> execute()) {
        Route::respondSuccess('Course curriculum record has been created successfully');
    } else {
        Route::respondError('Failed to create course curriculum record');
    }

    $statement -> close();
});

$coursecurriculum->post('update', function($data) {
    
    $text = $_POST['input_text'];
    $course_id = $_POST['course_id'];
    
    $errorMessages = array();
    
    // Validation checks
    if (empty($text)) {
        $errorMessages[] = 'Text is required';
    }
    
    if (empty($course_id)) {
        $errorMessages[] = 'Course ID is required';
    }
    
    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }
    
    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "UPDATE coursecurriculum
         SET text = ?, course_id = ?
         WHERE id = ?;"
    );
    
    $statement -> bind_param("si", $text, $course_id);
    
    if ($statement -> execute()) {
        Route::respondSuccess('Course curriculum record has been created successfully');
    } else {
        Route::respondError('Failed to create course curriculum record');
    }

    $statement -> close();
});

$coursecurriculum->post('delete', function($data) {
    
    $id = $_POST['id'];
    
    $errorMessages = array();
    
    // Validation checks
    if (empty($student_id)) {
        $errorMessages[] = 'ID is required';
    }
    
    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }
    
    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "DELETE FROM coursecurriculum
         WHERE id = ?"
    );
    
    $statement -> bind_param("i", $id);
    
    if ($statement -> execute()) {
        Route::respondSuccess('Course curriculum record has been created successfully');
    } else {
        Route::respondError('Failed to create course curriculum record');
    }

    $statement -> close();
    
});

Route::handleRequest();
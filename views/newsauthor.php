<?php

require_once './Route.php';

$coursecurriculum = new Route();

$coursecurriculum -> get('newsauthor', function() {
    try {

        $sql = "SELECT * FROM newsauthor";

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
                "name" => $row["name"],
                "avatarPath" => $row["avatarPath"],
                "news_id" => $row["news_id"]
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

$coursecurriculum -> post('create', function($data) {

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

$coursecurriculum -> post('update', function($data) {

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
        Route::respondSuccess('Course curriculum record has been updated successfully');
    } else {
        Route::respondError('Failed to update course curriculum record');
    }

    $statement -> close();
});

$coursecurriculum -> post('delete', function($data) {

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
        Route::respondSuccess('Course curriculum record has been deleted successfully');
    } else {
        Route::respondError('Failed to delete course curriculum record');
    }

    $statement -> close();

});

Route::handleRequest();
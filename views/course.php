<?php

require_once './Route.php';

$course = new Route();

$course -> get('courses', function() {
    try {

        $sql = "SELECT * FROM course";

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
                "instructor_id" => $row["instructor_id"],
                "department_id" => $row["department_id"]
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

$course -> post('create', function($data) {

    $title = $_POST["title"];
    $image = $_POST["image"];
    $rating = $_POST["rating"];
    $language_used = $_POST["language_used"];
    $number_of_lessons = $_POST["number_of_lessons"];
    $number_of_quizes = $_POST["number_of_quizes"];
    $course_level = $_POST["course_level"];
    $duration = $_POST["duration"];
    $description = $_POST["description"];
    $what_will_you_learn = $_POST["what_will_you_learn"];
    $instructor_id = $_POST["instructor_id"];
    $department_id = $_POST["department_id"];


    $errorMessages = array();

    if (empty($title)) {
        $errorMessages[] = 'Course title is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    $statement = Route::$conn -> prepare(
        "INSERT INTO course (title, image, rating, language_used, number_of_lessons, number_of_quizes, course_level, duration, description, what_will_you_learn, instructor_id, department_id)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $statement -> bind_param("ssdsiissssii", $title, $image, $rating, $language_used, $number_of_lessons, $number_of_quizes, $course_level, $duration, $description, $what_will_you_learn, $instructor_id, $department_id);

    if ($statement -> execute()) {
        Route::respondSuccess('Course record has been created successfully');
    } else {
        Route::respondError('Failed to create course record');
    }

    $statement -> close();
});

$course -> post('update', function($data) {

    $course_id = $_POST["id"];
    $title = $_POST["title"];
    $image = $_POST["image"];
    $rating = $_POST["rating"];
    $language_used = $_POST["language_used"];
    $number_of_lessons = $_POST["number_of_lessons"];
    $number_of_quizes = $_POST["number_of_quizes"];
    $course_level = $_POST["course_level"];
    $duration = $_POST["duration"];
    $description = $_POST["description"];
    $what_will_you_learn = $_POST["what_will_you_learn"];
    $instructor_id = $_POST["instructor_id"];
    $department_id = $_POST["department_id"];

    $errorMessages = array();

    if (empty($course_id)) {
        $errorMessages[] = 'Course ID is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    $statement = Route::$conn -> prepare(
        "UPDATE course
         SET title = ?, image = ?, rating = ?, language_used = ?, number_of_lessons = ?, number_of_quizes = ?, course_level = ?, duration = ?, description = ?, what_will_you_learn = ?, instructor_id = ?, department_id = ?
         WHERE id = ?;"
    );

    $statement -> bind_param("ssdsiissssii", $title, $image, $rating, $language_used, $number_of_lessons, $number_of_quizes, $course_level, $duration, $description, $what_will_you_learn, $instructor_id, $department_id, $course_id);

    if ($statement -> execute()) {
        Route::respondSuccess('Course record has been updated successfully');
    } else {
        Route::respondError('Failed to update course record');
    }

    $statement -> close();
});

$course -> post('delete', function($data) {

    $course_id = $_POST['id'];

    $errorMessages = array();

    if (empty($course_id)) {
        $errorMessages[] = 'Course ID is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    $statement = Route::$conn -> prepare(
        "DELETE FROM course
         WHERE id = ?"
    );

    $statement -> bind_param("i", $id);

    if ($statement -> execute()) {
        Route::respondSuccess('Course record has been created successfully');
    } else {
        Route::respondError('Failed to delete course record');
    }

    $statement -> close();

});

Route::handleRequest();
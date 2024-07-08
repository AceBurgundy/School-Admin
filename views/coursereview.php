<?php

require_once './Route.php';

$coursereview = new Route();

$coursereview -> get('coursereviews', function() {
    try {
        $sql = "SELECT * FROM coursereview";

        $statement = Route::$conn -> prepare($sql);

        if (!$statement) {
            throw new Exception("Database prepare failed: " . Route::$conn -> error);
        }

        $statement -> execute();
        $result = $statement -> get_result();

        $courseData = array();

        while ($row = $result -> fetch_assoc()) {
            $courseData[] = array(
                "name" => $row["name"],
                "review" => $row["review"],
                "rating" => $row["rating"],
                "course_id" => $row["course_id"]
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

$coursereview -> post('create', function($data) {
    $name = $_POST['input_name'];
    $review = $_POST['course_review'];
    $rating = $_POST['course_rating'];
    $course_id = $_POST['course_id'];

    $errorMessages = array();

    // Validation checks
    if (empty($name)) {
        $errorMessages[] = 'name is required';
    }

    if (empty($review)) {
        $errorMessages[] = 'review is required';
    }

    if (empty($rating)) {
        $errorMessages[] = 'rating is required';
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
        "INSERT INTO coursereview (name, review, rating, course_id)
         VALUES (?, ?, ?, ?)"
    );

    $statement -> bind_param("ssdi", $name, $review, $rating, $course_id);

    if ($statement -> execute()) {
        Route::respondSuccess('Course review record has been created successfully');
    } else {
        Route::respondError('Failed to create course review record');
    }

    $statement -> close();
});

$coursereview -> post('update', function($data) {
    $name = $_POST['input_name'];
    $review = $_POST['course_review'];
    $rating = $_POST['course_rating'];
    $course_id = $_POST['course_id'];

    $errorMessages = array();

    // Validation checks
    if (empty($name)) {
        $errorMessages[] = 'name is required';
    }

    if (empty($review)) {
        $errorMessages[] = 'review is required';
    }

    if (empty($rating)) {
        $errorMessages[] = 'rating is required';
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
        "UPDATE coursereview
         SET name = ?, review = ?, rating = ?, course_id = ?
         WHERE id = ?;"
    );

    $statement -> bind_param("ssssiisi", $name, $review, $rating, $course_id );

    if ($statement -> execute()) {
        Route::respondSuccess('Course review record has been updated successfully');
    } else {
        Route::respondError('Failed to update course review record');
    }

    $statement -> close();
});

$coursereview -> post('delete', function($data) {
    $id = $_POST['id'];

    $errorMessages = array();

    // Validation checks
    if (empty($id)) {
        $errorMessages[] = 'ID is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "DELETE FROM coursereview
         WHERE id = ?"
    );

    $statement -> bind_param("i", $id);

    if ($statement -> execute()) {
        Route::respondSuccess('Course review record has been deleted successfully');
    } else {
        Route::respondError('Failed to delete course review record');
    }

    $statement -> close();
});

Route::handleRequest();
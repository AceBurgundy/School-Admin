<?php

require_once './Route.php';

$instructor = new Route();

$instructor -> get('instructors', function() {
    try {

        $sql = "SELECT * FROM instructor";
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
                "middle_name" => $row["middle_name"],
                "last_name" => $row["last_name"],
                "extension" => $row["extension"],
                "facebook_link" => $row["facebook_link"],
                "twitter_link" => $row["twitter_link"],
                "linkedin_link" => $row["linkedin_link"],
                "instagram_link" => $row["instagram_link"],
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

$instructor -> post('create', function($data) {

    $first_name= $_POST['first_name'];
    $middle_initial= $_POST['middle_initial'];
    $last_name= $_POST['last_name'];
    $extension= $_POST['extension'];
    $facebook_link_id= $_POST['facebook_link_id'];
    $twitter_link_id= $_POST['twitter_link_id'];
    $linkedin_link_id= $_POST['linkedin_link_id'];
    $instagran_link_id= $_POST['instagran_link_id'];

    $errorMessages = array();

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
        "INSERT INTO instructor (first_name, middle_initial, last_name, extension, facebook_link_id, twitter_link_id, linkedin_link_id, instagran_link_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $statement -> bind_param("ssssiis", $first_name, $middle_initial, $last_name, $extension, $facebook_link_id, $twitter_link_id, $linkedin_link_id, $instagran_link_id);


    if ($statement -> execute()) {
        Route::respondSuccess('instructor record has been created successfully');
    } else {
        Route::respondError('Failed to create instructor record');
    }

    $statement -> close();

});

$instructor -> post('update', function($data) {
    $first_name= $_POST['first_name'];
    $middle_initial= $_POST['middle_initial'];
    $last_name= $_POST['last_name'];
    $extension= $_POST['extension'];
    $facebook_link_id= $_POST['facebook_link_id'];
    $twitter_link_id= $_POST['twitter_link_id'];
    $linkedin_link_id= $_POST['linkedin_link_id'];
    $instagran_link_id= $_POST['instagran_link_id'];

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
        "UPDATE instructor
         SET first_name = ?, middle_initial = ?, last_name = ?, extension = ?, facebook_link_id = ?, twitter_link_id = ?, linkedin_link_id = ?, instagran_link_id = ?
         WHERE id = ?;"
    );

    $statement -> bind_param("ssssiisi", $first_name, $middle_initial, $last_name, $extension, $facebook_link_id, $twitter_link_id, $linkedin_link_id, $instagran_link_id);

    if ($statement -> execute()) {
        Route::respondSuccess('Instructor record has been created successfully');
    } else {
        Route::respondError('Failed to create Course instructor record');
    }

    $statement -> close();
});

$instructor -> post('delete', function($data) {


    $instructor_id = $_POST['id'];

    $errorMessages = array();

    // Validation checks
    if (empty($instructor_id)) {
        $errorMessages[] = 'Instructor ID is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "DELETE FROM instructor
         WHERE id = ?"
    );

    $statement -> bind_param("i", $instructor_id);

    if ($statement -> execute()) {
        Route::respondSuccess('Instructor record has been created successfully');
    } else {
        Route::respondError('Failed to create snstructor record');
    }

    $statement -> close();
});

Route::handleRequest();
<?php

require_once './Route.php';

$contactnumber = new Route();

$contactnumber -> get('contactnumbers', function() {
    try {

        $sql = "SELECT * FROM contactnumber";

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
                "number" => $row["number"],
                "college_id" => $row["college_id"],
                "department_id" => $row["department_id"],
                "date_added" => $row["date_added"],
                "date_updated" => $row["date_updated"],

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

$contactnumber -> post('create', function($data) {

    $number= $_POST['number'];
    $college_id = $_POST['college_id'];
    $department_id = $_POST['department_id'];

    $errorMessages = array();

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    $statement = Route::$conn -> prepare(
        "INSERT INTO contactnumber (number, college_id, department_id)
         VALUES (?, ?, ?)"
    );

    $statement -> bind_param("sii", $number, $college_id, $department_id);

    if ($statement -> execute()) {
        Route::respondSuccess('Contact number record has been created successfully');
    } else {
        Route::respondError('Failed to create contact number record');
    }

    $statement -> close();

});

$contactnumber -> post('update', function($data) {
    $number= $_POST['number'];
    $college_id = $_POST['college_id'];
    $department_id = $_POST['department_id'];


    $errorMessages = array();

    // Validation checks

    if (strlen($college_id) > 50 && empty($college_id)) {
        $errorMessages[] = 'College Id required should not exceed 50 characters ';
    }

    if (!empty($department_id) && strlen($department_id) > 50) {
        $errorMessages[] = 'Department Id required or should not exceed 50 characters';
    }


    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "UPDATE contactnumber

         SET number = ?, college_id = ?, department_id = ?
         WHERE id = ?;"
    );

    $statement -> bind_param("ssi", $college_id, $department_id, $number);

    if ($statement -> execute()) {
        Route::respondSuccess('Contact number record has been created successfully');
    } else {
        Route::respondError('Failed to create contact number record');
    }

    $statement -> close();
});

$contactnumber -> post('delete', function($data) {


    $number= $_POST['$number'];

    $errorMessages = array();

    // Validation checks
    if (empty($number)) {
        $errorMessages[] = 'Contact number ID is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "DELETE FROM contactnumber
         WHERE id = ?"
    );

    $statement -> bind_param("i", $number);

    if ($statement -> execute()) {
        Route::respondSuccess('Contact number record has been created successfully');
    } else {
        Route::respondError('Failed to create contact number record');
    }

    $statement -> close();
});

Route::handleRequest();
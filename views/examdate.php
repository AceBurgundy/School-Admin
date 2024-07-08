<?php

require_once './Route.php';

$examdate = new Route();

$examdate->get('examdates', function () {
    // Error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    try {
        $sql = "SELECT * FROM examdate";

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
                "date_taken" => $row["date_taken"],
                "date_added" => $row["date_added"],
                "date_updated" => $row["date_updated"]

            );
        }

        header('Content-Type: application/json');
        Route::echoJSON($courseData);

        $statement->close();
    } catch (Exception $error) {
        http_response_code(500);
        header('Content-Type: application/json');
        Route::echoJSON(array("error" => $error->getMessage()));
    }
});

$examdate->post('create', function ($data) {
    $date_taken = $_POST['date_taken'];

    $errorMessages = array();

    if (empty($date_taken)) {
        $errorMessages[] = 'Date taken is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    // Prepare and execute the INSERT statement
    $statement = Route::$conn->prepare(
        "INSERT INTO examdate (date_taken)
         VALUES (?)"
    );

    $statement->bind_param("s", $date_taken);

    if ($statement->execute()) {
        Route::respondSuccess('Admin record has been created successfully');
    } else {
        Route::respondError('Failed to create admin record');
    }

    $statement->close();
});

$examdate->post('update', function ($data) {
    $id = $data['id'];
    $date_taken = $data['date_taken'];
    $date_added = $data['date_added'];
    $date_updated = $data['date_updated'];

    $errorMessages = array();

    // Validation checks
    if (empty($date_taken)) {
        $errorMessages[] = 'Date is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    // Prepare and execute the INSERT statement
    $statement = Route::$conn->prepare(
        "INSERT INTO examdate (id, date_taken, date_added , date_updated)
         VALUES (?, ? ,?, ?)"
    );

    $statement->bind_param("isss", $id, $date_taken, $date_added, $date_updated);

    if ($statement->execute()) {
        Route::respondSuccess('Admin record has been created successfully');
    } else {
        Route::respondError('Failed to create admin record');
    }

    $statement->close();
});

$examdate->post('delete', function ($data) {
    $id = $data['id'];
    $errorMessages = [];

    if (empty($id)) {
        $errorMessages[] = 'Admin ID is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    $statement = Route::$conn->prepare("DELETE FROM examdate WHERE id = ?");
    $statement->bind_param("i", $id);

    if ($statement->execute()) {
        Route::respondSuccess('College record has been created successfully');
    } else {
        Route::respondError('Failed to create college record');
    }

    $statement->close();
});

Route::handleRequest();

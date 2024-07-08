<?php

require_once './Route.php';

$college = new Route();

$college -> get('college', function() {
    try {
        $sql = "SELECT * FROM college";
        $statement = Route::$conn -> prepare($sql);

        if (!$statement) {
            throw new Exception("Database prepare failed: " . Route::$conn -> error);
        }

        $statement -> execute();
        $result = $statement -> get_result();

        $collegeData = array();

        while ($row = $result -> fetch_assoc()) {
            $collegeData[] = array(
                "id" => $row["id"],
                "name" => $row["name"],
                "banner_file_path" => $row["banner_file_path"],
                "logo_file_path" => $row["logo_file_path"],
                "organizational_chart_file_path" => $row["organizational_chart_file_path"],
                "secretary" => $row["secretary"],
                "email" => $row["email"],
                "mission" => $row["mission"],
                "vission" => $row["vission"],
                "program_educational_objectives" => $row["program_educational_objectives"]
            );
        }

        header('Content-Type: application/json');
        Route::echoJSON($collegeData);

        $statement -> close();

    } catch (Exception $error) {
        http_response_code(500);
        header('Content-Type: application/json');
        Route::echoJSON(array("error" => $error -> getMessage()));
    }
});

$college -> post('create', function($data) {
    $name = $_POST['name'];
    $banner_file_path = $_POST['banner_file_path'];
    $logo_file_path = $_POST['logo_file_path'];
    $organizational_chart_file_path = $_POST['organizational_chart_file_path'];
    $secretary = $_POST['secretary'];
    $email = $_POST['email'];
    $mission = $_POST['mission'];
    $vission = $_POST['vission'];
    $program_educational_objectives = $_POST['program_educational_objectives'];
    $date_added = $_POST['date_added'];
    $date_updated = $_POST['date_updated'];

    $errorMessages = array();

    // Validation checks
    if (empty($name)) {
        $errorMessages[] = 'Name is required';
    }

    if (strlen($name) > 255) {
        $errorMessages[] = 'Name should not exceed 255 characters';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "INSERT INTO college (name, banner_file_path, logo_file_path, organizational_chart_file_path, secretary, email, vission, program_educational_objectives, date_added, date_updated)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $statement -> bind_param("sssssssss", $name, $banner_file_path, $logo_file_path, $organizational_chart_file_path, $secretary, $email, $mission, $vission, $program_educational_objectives, $date_added, $date_updated);

    if ($statement -> execute()) {
        Route::respondSuccess('College record has been created successfully');
    } else {
        Route::respondError('Failed to create college record');
    }

    $statement -> close();
});

$college -> post('update', function($data) {
    $name = $_POST['name'];
    $banner_file_path = $_POST['banner_file_path'];
    $logo_file_path = $_POST['logo_file_path'];
    $organizational_chart_file_path = $_POST['organizational_chart_file_path'];
    $secretary = $_POST['secretary'];
    $email = $_POST['email'];
    $mission = $_POST['mission'];
    $vission = $_POST['vission'];
    $program_educational_objectives = $_POST['program_educational_objectives'];
    $date_added = $_POST['date_added'];
    $date_updated = $_POST['date_updated'];

    $errorMessages = array();

    // Validation checks
    if (empty($name)) {
        $errorMessages[] = 'Name is required';
    }

    if (strlen($name) > 255) {
        $errorMessages[] = 'Name should not exceed 255 characters';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "UPDATE college
         SET name = ?, banner_file_path = ?, logo_file_path = ?, organizational_chart_file_path = ?, secretary = ?, email = ?, mission = ?, vission = ?, program_educational_objectives = ?, date_added = ?, date_updated = ?
         WHERE id = ?;"
    );

    $statement -> bind_param("sssssssssssss", $name, $banner_file_path, $logo_file_path, $organizational_chart_file_path, $secretary, $email, $mission, $vission, $program_educational_objectives, $date_added, $date_updated);

    if ($statement -> execute()) {
        Route::respondSuccess('College record has been updated successfully');
    } else {
        Route::respondError('Failed to update college record');
    }

    $statement -> close();
});

$college -> post('delete', function($data) {
    $collegeId = $_POST['collegeId'];

    $errorMessages = array();

    if (empty($collegeId)) {
        $errorMessages[] = 'College ID is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    $statement = Route::$conn -> prepare(
        "DELETE FROM college
         WHERE id = ?"
    );

    $statement -> bind_param("i", $collegeId);

    if ($statement -> execute()) {
        Route::respondSuccess('College record has been deleted successfully');
    } else {
        Route::respondError('Failed to delete college record');
    }

    $statement -> close();
});

Route::handleRequest();
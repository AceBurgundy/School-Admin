<?php

require_once './Route.php';

$admin = new Route();

$admin -> get('admins', function() {
    // Error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    try {
        $sql = "SELECT * FROM admin";
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
                "username" => $row["username"],
                "birthdate" => $row["birthdate"],
                "email" => $row["email"],
                "password" => $row["password"]
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

$admin -> post('create', function($data) {
    $username = $_POST['username'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errorMessages = array();

    // Validation checks
    if (empty($username)) {
        $errorMessages[] = 'First name is required';
    }

    if (strlen($username) > 255) {
        $errorMessages[] = 'First name should not exceed 255 characters';
    }

    if (!empty($birthdate) && strlen($birthdate) > 2) {
        $errorMessages[] = 'birthdate should not exceed 255 characters';
    }

    if (empty($email)) {
        $errorMessages[] = 'email is required';
    }

    if (strlen($email) > 255) {
        $errorMessages[] = 'email should not exceed 255 characters';
    }

    if (empty($password)) {
        $errorMessages[] = 'enter your password';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    $statement = Route::$conn -> prepare(
        "INSERT INTO admin (username, birthdate, email, password) VALUES (?, ?, ?, ?)"
    );

    $statement -> bind_param("ssss", $username, $birthdate, $email, $password);

    if ($statement -> execute()) {
        Route::respondSuccess('Admin record has been created successfully');
    } else {
        Route::respondError('Failed to create admin record');
    }

    $statement -> close();
});

$admin -> post('update', function($data) {
    $adminId = $data['id'];
    $username = $data['username'];
    $birthdate = $data['birthdate'];
    $email = $data['email'];
    $password = $data['password'];

    // Validation checks
    if (empty($username)) {
        $errorMessages[] = 'First name is required';
    }

    if (strlen($username) > 255) {
        $errorMessages[] = 'First name should not exceed 255 characters';
    }

    if (!empty($birthdate) && strlen($birthdate) > 2) {
        $errorMessages[] = 'birthdate should not exceed 255 characters';
    }

    if (empty($email)) {
        $errorMessages[] = 'email is required';
    }

    if (strlen($email) > 255) {
        $errorMessages[] = 'email should not exceed 255 characters';
    }

    if (empty($password)) {
        $errorMessages[] = 'enter your password';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    $statement = Route::$conn -> prepare(
        "UPDATE admin SET username = ?, birthdate = ?, email = ?, password = ? WHERE id = ?"
    );

    $statement -> bind_param("ssssi", $username, $birthdate, $email, $password, $adminId);

    if ($statement -> execute()) {
        Route::respondSuccess('Admin record has been updated successfully');
    } else {
        Route::respondError('Failed to update admin record');
    }

    $statement -> close();
});

$admin -> post('delete', function($data) {
    $adminId = $data['adminId'];
    $errorMessages = [];

    if (empty($adminId)) {
        $errorMessages[] = 'Admin ID is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    $statement = Route::$conn -> prepare("DELETE FROM admin WHERE id = ?");
    $statement -> bind_param("i", $adminId);

    if ($statement -> execute()) {
        Route::respondSuccess('Admin record has been deleted successfully');
    } else {
        Route::respondError('Failed to delete admin record');
    }

    $statement -> close();
});

Route::handleRequest();
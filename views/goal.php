<?php

require_once './Route.php';

$goal = new Route();

$goal->get('goals', function() {
    try {
    
        $sql = "SELECT * FROM goal";
    
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
                "college_id" => $row["college_id"],
                "department_id" => $row["department_id"],
                "date_added" => $row["date_added"],
                "date_updated" => $row["date_updated"],
            
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

$goal->post('create', function($data) {
    
    $text= $_POST['text'];
    $college_id = $_POST['college_id'];
    $department_id = $_POST['department_id'];
    
    $errorMessages = array();
    
    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }
    
    $statement = Route::$conn -> prepare(
        "INSERT INTO goal (text, college_id, department_id)
         VALUES (?, ?, ?)"
    );
    
    $statement -> bind_param("sii", $text, $college_id, $department_id);
    
    if ($statement -> execute()) {
        Route::respondSuccess('Goal record has been created successfully');
    } else {
        Route::respondError('Failed to create goal record');
    }

    $statement -> close();
    
});

$goal->post('update', function($data) {
    $goal_id = $_POST['goal'];
    $text = $_POST['text'];
    $college_id = $_POST['college_id'];
    $department_id = $_POST['department_id'];
    
    
    $errorMessages = array();
    
    // Validation checks
    if (empty($text)) {
        $errorMessages[] = 'Text is required';
    }
    
    if (strlen($college_id) > 50 && empty($college_id)) {
        $errorMessages[] = 'College id required should not exceed 50 characters ';
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
        "UPDATE goal
         SET text = ?, college_id = ?, department_id = ?
         WHERE id = ?;"
    );
    
    $statement -> bind_param("sssi", $text,$college_id, $department_id, $goal_id);
    
    if ($statement -> execute()) {
        Route::respondSuccess('Goal record has been created successfully');
    } else {
        Route::respondError('Failed to create goal record');
    }

    $statement -> close();
});

$goal->post('delete', function($data) {

    
    $goal_and_objective_id = $_POST['$goal_and_objective_id'];
    
    $errorMessages = array();
    
    // Validation checks
    if (empty($student_id)) {
        $errorMessages[] = 'Goal and Objective ID is required';
    }
    
    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }
    
    // Prepare and execute the INSERT statement
    $statement = Route::$conn -> prepare(
        "DELETE FROM goal
         WHERE id = ?"
    );
    
    $statement -> bind_param("i", $goal_and_objective_id);
    
    if ($statement -> execute()) {
        Route::respondSuccess('Goal record has been created successfully');
    } else {
        Route::respondError('Failed to create goal record');
    }

    $statement -> close();
});

Route::handleRequest();
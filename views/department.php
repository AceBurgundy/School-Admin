<?php

require_once './Route.php';

$department = new Route();

$department -> get('departments', function() {
    // Error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    try {
       
    
        $sql = "SELECT * FROM department";
    
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
                "name" => $row["name"],
                "logo_file_path" => $row["logo_file_path"],
                "banner_file_path" => $row["banner_file_path"],
                "mission" => $row["mission"],
                "vission" => $row["vission"],
                "program_educational_objectives" => $row["program_educational_objectives"],
                "college_id" => $row["college_id"],
                "date_added" => $row["date_added"],
                "date_updated" => $row["date_updated"],
            );
        }
    
        header('Content-Type: application/json');
        echo json_encode($courseData);
    
        $statement->close();
      
    
    }catch (Exception $error) {
        http_response_code(500);
        header('Content-Type: application/json');
        Route::echoJSON(array("error" => $error -> getMessage()));
    }
    
});

$department -> post('create', function($data) {
    $name = $data['name'];
    $logo_file_path = $data['logo_file_path'];
    $banner_file_path = $data['banner_file_path'];
    $mission = $data['mission'];
    $vission = $data['visson'];
    $program_educational_objectives = $data['program_educational_objectives'];
    $college_id = $data['college_id'];
    
    
    $errorMessages = array();
    
    // Validation checks
    if (empty($name)) {
        $errorMessages[] = 'Department name is required';
    }
    
    if (!empty($errorMessages)) {
        $response = array(
            'status' => 'error',
            'message' => $errorMessages
        );
    
        echo json_encode($response);
        exit;
    }
    
    // Prepare and execute the INSERT statement
    $statement = Route::$conn->prepare(
        "INSERT INTO department ( logo_file_path, banner_file_path, mission, vission, program_educational_objectives, college_id)
         VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    
    $statement->bind_param("ssssssi", $name, $logo_file_path, $banner_file_path,$mission, $vission, $program_educational_objectives, $college_id);
    
    if ($statement -> execute()) {
        Route::respondSuccess('Admin record has been created successfully');
    } else {
        Route::respondError('Failed to create admin record');
    }

    $statement -> close();

    
});

$department -> post('update', function($data) {
    $dept_id = $data['id'];
    $name = $data['name'];
    $logo_file_path = $data['logo_file_path'];
    $banner_file_path = $data['banner_file_path'];
    $mission = $data['mission'];
    $vission = $data['visson'];
    $program_educational_objectives = $data['program_educational_objectives'];
    $college_id = $data['college_id'];
    
    
    $errorMessages = array();
    
    // Validation checks
    if (empty($name)) {
        $errorMessages[] = 'Department name is required';
    }
    
    if (!empty($errorMessages)) {
        $response = array(
            'status' => 'error',
            'message' => $errorMessages
        );
    
        echo json_encode($response);
        exit;
    }
    
    // Prepare and execute the INSERT statement
    $statement = Route::$conn->prepare(
        "INSERT INTO department ( logo_file_path, banner_file_path, mission, vission, program_educational_objectives, college_id)
         VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    
    $statement->bind_param("ssssssi",$dept_id, $name, $logo_file_path, $banner_file_path,$mission, $vission, $program_educational_objectives, $college_id);
    
    if ($statement -> execute()) {
        Route::respondSuccess('Admin record has been created successfully');
    } else {
        Route::respondError('Failed to create admin record');
    }

    $statement -> close();

});

$department -> post('delete', function($data) {
    $dept_id = $data['dept_id'];
    $errorMessages = [];

    if (empty($dept_id)) {
        $errorMessages[] = 'Admin ID is required';
    }

    if (!empty($errorMessages)) {
        Route::respondError($errorMessages);
        return;
    }

    $statement = Route::$conn -> prepare("DELETE FROM department WHERE id = ?");
    $statement -> bind_param("i", $dept_id);

    if ($statement -> execute()) {
        Route::respondSuccess('Admin record has been deleted successfully');
    } else {
        Route::respondError('Failed to delete admin record');
    }

    $statement -> close();
});

Route::handleRequest();
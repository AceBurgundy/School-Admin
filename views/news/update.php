<?php

require("dbcon.php");

$title= $_POST['title'];
$image_path= $_POST['image_path'];
$venue= $_POST['venue'];
$date_time= $_POST['date_time'];
$start_time= $_POST['start_time'];
$end_time= $_POST['end_time'];
$event_link= $_POST['link'];

$errorMessages = array();

// // Validation checks
// if (empty($first_name)) {
//     $errorMessages[] = 'First name is required';
// }

// if (strlen($first_name) > 255) {
//     $errorMessages[] = 'First name should not exceed 255 characters';
// }

// if (!empty($middle_initial) && strlen($middle_initial) > 2) {
//     $errorMessages[] = 'Middle initial should not exceed 2 characters';
// }

// if (empty($last_name)) {
//     $errorMessages[] = 'Last name is required';
// }

// if (strlen($last_name) > 255) {
//     $errorMessages[] = 'Middle initial should not exceed 2 characters';
// }

// if (!empty($extension) && strlen($extension) > 255) {
//     $errorMessages[] = 'Last name should not exceed 255 characters';
// }

// if (!empty($errorMessages)) {
//     $response = array(
//         'status' => 'error',
//         'message' => $errorMessages
//     );

//     echo json_encode($response);
//     exit;
// }

// Prepare and execute the INSERT statement
$statement = $conn -> prepare(
    "UPDATE news 
    SET title= ?,imagePath= ?, venue= ?, dateTime= ?, startTime= ?, endTime= ?, link= ? 
    WHERE id = ?;"
);

$statement -> bind_param("sssssss", $title, $image_path, $venue, $date_time, $start_time, $end_time, $link);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Instructor record inserted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to insert instructor record'
    );
}

echo json_encode($response);

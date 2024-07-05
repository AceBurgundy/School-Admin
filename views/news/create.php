<?php

require("dbcon.php");

$title= $_POST['title'];
$image_path= $_POST['image_path'];
$venue= $_POST['venue'];
$date_time= $_POST['date_time'];
$start_time= $_POST['start_time'];
$end_time= $_POST['end_time'];
$event_link= $_POST['event_link'];

$errorMessages = array();

// Validation checks
if (empty($title)) {
    $errorMessages[] = 'Title is required';
}

if (strlen($image_path)) {
    $errorMessages[] = 'Please Choose Image';
}


if (empty($venue)) {
    $errorMessages[] = 'Venue is required';
}

// Prepare and execute the INSERT statement
$statement = $conn -> prepare(
    "INSERT INTO news (title, image_path, venue, date_time, start_time, end_time, event_link)
     VALUES (?, ?, ?, ?, ?, ?, ?)"
);

$statement -> bind_param("ssssiis", $title, $image_path, $venue, $date_time, $start_time, $end_time, $event_link);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Student record inserted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to insert student record'
    );
}

echo json_encode($response);

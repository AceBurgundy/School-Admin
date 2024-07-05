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

if (!empty($errorMessages)) {
    $response = array(
        'status' => 'error',
        'message' => $errorMessages
    );

    echo json_encode($response);
    exit;
}

// Prepare and execute the INSERT statement
$statement = $conn -> prepare(
    "UPDATE news
     SET title = ?, image_path= ?, venue= ?, date_time= ?, start_time= ?, end_time= ?, event_link= ?
     WHERE id = ?;"
);

$statement -> bind_param("ssssiisi", $title, $image_path, $venue, $date_time, $start_time, $end_time, $event_link);

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

<?php

require("dbcon.php");

$news_id = $_POST['id'];

$errorMessages = array();

// Validation checks
if (empty($news_id)) {
    $errorMessages[] = 'News ID is required';
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
    "DELETE FROM news
     WHERE id = ?"
);

$statement -> bind_param("i", $news_id);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Instructor record has been deleted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to delete instructor record'
    );
}

echo json_encode($response);

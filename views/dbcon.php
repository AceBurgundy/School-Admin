<?php
    $conn = mysqli_connect('localhost','root','','rmmcdatabase') or die(mysqli_error($conn));

    if ($conn -> connect_error) {
        $response = array(
            'status' => 'error',
            'message' => 'Failed to connect to the database'
        );
        echo json_encode($response);
        exit;
    }
?>
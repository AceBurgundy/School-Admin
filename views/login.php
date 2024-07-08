<?php

require("dbcon.php");

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    $response = array(
        'status' => 'error',
        'message' => 'Missing email or password'
    );
    echo json_encode($response);
    exit;
}

$statement = $conn -> prepare(
   "SELECT id, email, password, hash
    FROM users
    WHERE email = ? AND password = ?
");

$statement -> bind_param("ss", $email, $password);
$statement -> execute();
$result = $statement -> get_result();

if ($result -> num_rows === 1) {
    $row = $result -> fetch_assoc();

    if (password_verify($password, $row['password'])) {

        session_start();

        $_SESSION['id'] = $row['hash'];

        $response = array(
            'status' => "success",
            'message' => "Login Successful"
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Invalid email or password'
        );
    }
    echo json_encode($response);

} else {
    $response = array(
        'status' => 'error',
        'message' => 'Invalid email or password'
    );
    echo json_encode($response);
}

$statement -> close();
$conn -> close();

?>
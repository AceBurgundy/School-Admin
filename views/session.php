<?php

session_start();

require("dbcon.php");

// Retrieve session ID from the query parameter
$session_id = $_SESSION['id'];
$data = array();

// Query the user with the session ID
$statement = $conn->prepare("SELECT * FROM users WHERE hash = ?");
$statement->bind_param("s", $session_id);
$statement->execute();
$result = $statement->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $statement->close();
    $conn->close();

    $data["username"] = $user["username"];
    $data["email"] = $user["email"];
}


<?php

include ("../connect.php");

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if the email already exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $emailExists = mysqli_num_rows($result) > 0;

    // Return the result as a JSON response
    header('Content-Type: application/json');
    echo json_encode(['exists' => $emailExists]);
    exit;
}
?>

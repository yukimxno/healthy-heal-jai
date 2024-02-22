<?php
    $servername = "localhost";
    $username = "root";
    $password = "08123456789";
    $db = "market";

    $connect = new mysqli($servername, $username, $password, $db);

    if (!$connect) {
        die("Cannot connect to DB");
    }
    
?>
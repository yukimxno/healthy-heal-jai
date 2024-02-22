<?php

session_start();
date_default_timezone_set('Asia/Bangkok');
require('../connect.php');

if ($_GET['book_id'] && isset($_SESSION['user_data']['id'])) {
    $book_id = $_GET['book_id'];
    $user_id = $_SESSION['user_data']['id'];
    
    // Check if the book is available for lending
    $check_book_query = "SELECT is_available FROM books WHERE id = '$book_id' AND is_available = 1";
    $check_book_result = mysqli_query($connect, $check_book_query);

    // print_r($check_book_result);
    
    if (mysqli_num_rows($check_book_result) > 0) {
        // Calculate the lending and return dates
        $lending_date = date('Y-m-d H:i:s');
        $return_date = date('Y-m-d H:i:s', strtotime('+13 days', strtotime($lending_date)));
        
        // Update book is_available status
        $update_book_query = "UPDATE books SET is_available = 0 WHERE id = '$book_id'";
        $update_book_result = mysqli_query($connect, $update_book_query);
        
        // Insert lending order into the database
        $insert_order_query = "INSERT INTO orders (book_id, user_id, lending_date, return_date, is_returned)
                                VALUES ('$book_id', '$user_id', '$lending_date', '$return_date', 0)";
        $insert_order_result = mysqli_query($connect, $insert_order_query);
        
        if ($update_book_result && $insert_order_result) {
            echo "Book booked successfully. Lending date: $lending_date, Return date: $return_date";
            header("Location: ../onhold.php");
        } else {
            echo "Error booking the book.";
        }
    } else {
        echo "The book is not available for lending.";
    }
}

?>
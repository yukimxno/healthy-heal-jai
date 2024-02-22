<?php

require('../connect.php');

// $order_id = $_GET['order_id'];
// $order_sql = "SELECT * FROM orders WHERE id = $order_id";
// $order_result = mysqli_query($connect, $order_sql);
// $order_row = mysqli_fetch_assoc($order_result);

// echo $order_id. '<br>' .$order_row['is_late'];

// $booker_id = $order_row['user_id'];
// $booker_sql = "SELECT * FROM user WHERE id = $booker_id";
// $booker_result = mysqli_query($connect, $booker_sql);
// $booker_row = mysqli_fetch_assoc($booker_result);

// $book_id = $order_row['book_id'];
// $book_sql = "SELECT * FROM books WHERE id = $book_id";
// $book_result = mysqli_query($connect, $book_sql);
// $book_row = mysqli_fetch_assoc($book_result);

// $book_sql = "UPDATE books SET is_available = 1 WHERE id = '$book_id'";
// $book_result = mysqli_query($connect, $book_sql);

// $return_sql = "UPDATE orders SET is_returned = 1, is_late = 0 WHERE id = '$order_id'";
// $return_result = mysqli_query($connect, $return_sql);

// if ($book_result && $return_result) {
//     echo "return successfully.";
//     header("Location: ../onhold.php");
// } else {
//     echo "Error returning the book.";
// }



$order_id = $_GET['order_id'];
$order_sql = "SELECT * FROM orders WHERE id = $order_id";
$order_result = mysqli_query($connect, $order_sql);
$order_row = mysqli_fetch_assoc($order_result);

if (!$order_row) {
    echo "Order not found.";
    exit();
}

$book_id = $order_row['book_id'];

$return_sql = "UPDATE orders SET is_returned = 1, is_late = 0 WHERE id = '$order_id'";
$return_result = mysqli_query($connect, $return_sql);

if ($return_result) {
    $book_sql = "UPDATE books SET is_available = 1 WHERE id = '$book_id'";
    $book_result = mysqli_query($connect, $book_sql);

    if ($book_result) {
        echo "Return successfully.";
        header("Location: ../onhold.php");
        exit();
    } else {
        echo "Error updating book's availability: " . mysqli_error($connect);
    }
} else {
    echo "Error returning the book: " . mysqli_error($connect);
}

?>
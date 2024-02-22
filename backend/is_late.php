<?php
require('../connect.php');

// Set timezone to Asia/Bangkok (Thai Time)
date_default_timezone_set('Asia/Bangkok');

// Get current datetime in Thai time
$currentDatetime = date("Y-m-d H:i:s");
echo "Current Thai Time: $currentDatetime<br>";

// Fetch orders with return_date less than or equal to current datetime
$query = "SELECT * FROM orders WHERE return_date <= '$currentDatetime'";
$result = mysqli_query($connect, $query);


if ($result) {
    // Check if there are rows returned
    if (mysqli_num_rows($result) > 0) {
        // Loop through the result and update orders' is_late status
        while ($row = $result->fetch_assoc()) {
            $order_id = $row["id"];
            $return_date_str = $row["return_date"];
            $user_id = $row["user_id"];


            // Check if the order is late
            $is_late = strtotime($return_date_str) <= time() ? 1 : 0;
            $is_ban = mysqli_num_rows($result) == 0 ? 1 : 0;

            // Update the 'is_late' status in the database
            $update_query = "UPDATE orders SET is_late = $is_late WHERE id = '$order_id'";
            $update_result = mysqli_query($connect, $update_query);

            $user_query = "UPDATE user SET is_ban = $is_ban WHERE id = '$user_id'";
            $user_result = mysqli_query($connect, $user_query);

            if (!$update_result) {
                echo "Error changing status is_late for order with id: $order_id";
            } else {
                echo "Updated is_late status for order with id: $order_id - New Status: $is_late<br>";
            }

            if (!$user_result) {
                echo "Error changing status is_ban for user with id: $user_id";
            } else {
                echo "Updated is_ban status for user with id: $user_id - New Status: $is_ban<br>"; 
            }
        }
    } else {
        echo "No orders found with return_date less than or equal to current datetime.";
    }
    
    // Free result set
    $result->free();
} else {
    echo "Error fetching orders: " . mysqli_error($connect);
}

// Close the connection
$connect->close();
?>

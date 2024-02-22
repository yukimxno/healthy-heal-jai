<?php
session_start();
require("./connect.php");



if (!isset($_SESSION['user_data'])) {
    header('location: ./login.php');
    exit;
}

date_default_timezone_set('Asia/Bangkok');
$currentDatetime = date("Y-m-d H:i:s");

include "./includes/head.php";
include "./includes/navbar.php";

$user_id = $_SESSION['user_data']['id'];

$orders_query = "SELECT * FROM orders WHERE user_id = $user_id";

// Execute the query
$result = mysqli_query($connect, $orders_query);

// Check if the query executed successfully
if ($result) {
    $orders_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Now you have an array of orders data for the user
    
    // Fetch is_ban status
    $is_ban_query = "SELECT is_ban FROM user WHERE id = $user_id";
    $is_ban_result = mysqli_query($connect, $is_ban_query);

    if ($is_ban_result) {
        $is_ban_data = mysqli_fetch_assoc($is_ban_result);
        $is_ban = $is_ban_data['is_ban'];

        $late_query = "SELECT * FROM orders WHERE return_date <= '$currentDatetime'";
        $late_result = mysqli_query($connect, $late_query);

        if (mysqli_num_rows($late_result) > 0) {
            $is_late = strtotime($return_date_str) <= time() ? 0 : 1;
            if ($is_late == 1) {
                $is_ban = 1;
            } else {
                $is_ban = 0;
            }
        }

        $update_order_status_query = "UPDATE orders SET is_late = $is_late WHERE id = '$order_id'";
        $update_order_status_result = mysqli_query($connect, $update_user_status_query);
        $update_user_status_query = "UPDATE user SET is_ban = $is_ban WHERE id = '$user_id'";
        $update_user_status_result = mysqli_query($connect, $update_user_status_query);
    } else {
        echo "Error fetching is_ban status: " . mysqli_error($connect);
        $is_ban = 0; // Default to not banned
    }

    
} else {
    echo "Error fetching orders: " . mysqli_error($connect);
}

?>

<div class="mt-20 p-4">
        <!-- Show book list -->
        <h4 class="font-bold text-2xl"><u>รายการหนังสือที่ฉันจอง</u></h4>
        <div class="grid md:grid-cols-3 gap-3 p-2">
            <?php foreach ($orders_data as $order) {
                $order_id = $order['id'];
                $booker_id = $order['user_id'];
                $book_id = $order['book_id'];
                $lending_date = $order['lending_date'];
                $return_date = $order['return_date'];
                $is_returned = $order['is_returned'];
                $is_late = $order['is_late'];

                

                // Fetch book data from the books table based on the book_id
                $book_query = "SELECT * FROM books WHERE id = $book_id";
                $book_result = mysqli_query($connect, $book_query);
                if ($book_result) {
                    if (mysqli_num_rows($book_result) > 0) {
                        $book_data = mysqli_fetch_assoc($book_result);
                        if ($is_returned == 0) { ?>
                            <div class=" <?php echo $is_late == 0 ? 'bg-white' : 'bg-red-200' ?> shadow-md transition duration-200 hover:shadow-xl p-3">
                                <center>
                                    <?php if ($book_data['image']) { ?>
                                        <img src="<?php echo $book_data['image']; ?>" alt="<?php echo $book_data['title']; ?>"
                                            class="object-cover h-72 rounded mx-auto" width="160px">
                                    <?php } else { ?>
                                        <img src="./image/Book.png" alt="<?php echo $book_data['title']; ?>"
                                            class="object-cover h-72 rounded mx-auto" width="160px">
                                    <?php } ?> 
                                </center>
                                <hr class="my-2">
                                <p class="mt-2 p-1">
                                    ชื่อ : <?php echo $book_data['title']; ?><br>
                                    หมวด : <?php echo $book_data['category']; ?><br>
                                    รายละเอียดการยืม : <a class="text-sky-700" href="./onHandDetail.php?order_id=<?php echo $order['id']; ?>">รายละเอียด</a>
                                    <?php echo $is_late == 0 ? '' : '<br><p class="pl-1 text-sm text-red-500 font-bold">เลยกำหนดการคืนหนังสือ ! ท่านจะไม่สามารถจองหนังสือเพิ่มจนกว่าท่านจะคืนหนังสือครบ</p>' ?>
                                </p>
                            </div>
                        <?php } ?>
                        <?php
                    } else {
                        // Book not found in the books table
                        echo "Book not found.";
                    }
                } else {
                    // Error fetching book data
                    echo "Error fetching book data: " . mysqli_error($connect);
                }
            } ?>
        </div>
</div>
        </body>
        </html>

<!-- ... (rest of your HTML) -->

<?php
    session_start();
    require("./connect.php");
    if (!isset($_SESSION['user_data'])) {
        header('location: ./login.php');
        exit;
    } 
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
        
    } else {
        echo "Error fetching orders: " . mysqli_error($connect);
    }
?>



    <div class="mt-20 p-4">
    <h4 class="font-bold text-2xl"><u>รายการหนังสือที่ฉันจอง</u></h4>
    <?php if (mysqli_num_rows($result) > 0) { ?>
        <div class="grid md:grid-cols-3 gap-3 p-2">
            <?php foreach ($orders_data as $order) {
                $order_id = $order['id'];
                $booker_id = $order['user_id'];
                $book_id = $order['book_id'];
                $lending_date = $order['lending_date'];
                $return_date = $order['return_date'];
                $is_returned = $order['is_returned'];
                $is_late = $order['is_late'];
                $book_query = "SELECT * FROM books WHERE id = $book_id";
                $book_result = mysqli_query($connect, $book_query);
                if ($book_result) {
                    if (mysqli_num_rows($book_result) > 0) {
                        $book_data = mysqli_fetch_assoc($book_result);?>
                        <?php if ($is_returned == 0) { ?>
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
    <?php } else { ?>
        <p class="text-slate-500 font-semibold text-3xl">ยังไม่มีการยืมหนังสือ</p>';]
    <?php } ?>
</div>
<?php require('./backend/is_late.php'); ?>
</body>
</html>


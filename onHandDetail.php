<?php
        session_start();
        include "./includes/head.php";
        include "./includes/navbar.php";
        require("./connect.php");


        //////////////////////////////////////////////////
        $order_id = $_GET['order_id'];
        $order_sql = "SELECT * FROM orders WHERE id = $order_id";
        $order_result = mysqli_query($connect, $order_sql);
        $order_row = mysqli_fetch_assoc($order_result);

        $booker_id = $order_row['user_id'];
        $booker_sql = "SELECT * FROM user WHERE id = $booker_id";
        $booker_result = mysqli_query($connect, $booker_sql);
        $booker_row = mysqli_fetch_assoc($booker_result);

        $book_id = $order_row['book_id'];
        $book_sql = "SELECT * FROM books WHERE id = $book_id";
        $book_result = mysqli_query($connect, $book_sql);
        $book_row = mysqli_fetch_assoc($book_result);

        $is_late = $order_row['is_late'];


        function formatDateTime($datetime) {
            $thai_months = array(
                'January' => 'มกราคม',
                'February' => 'กุมภาพันธ์',
                'March' => 'มีนาคม',
                'April' => 'เมษายน',
                'May' => 'พฤษภาคม',
                'June' => 'มิถุนายน',
                'July' => 'กรกฎาคม',
                'August' => 'สิงหาคม',
                'September' => 'กันยายน',
                'October' => 'ตุลาคม',
                'November' => 'พฤศจิกายน',
                'December' => 'ธันวาคม',
            );
        
            // Format the date and time using date() function
            $formatted_datetime = date('d/m/Y เวลา H:i น.', strtotime($datetime));
        
            // Replace English month names with Thai month names
            $formatted_datetime = strtr($formatted_datetime, $thai_months);
        
            return $formatted_datetime;
        }
    ?>
    <div class="mt-32 flex justify-center items-center">
        <div class="flex flex-col items-center w-full <?php echo $is_late == 0 ? 'bg-gray-800' : 'bg-red-900' ?> <?php echo $book_row['image'] ? 'p-4' : 'p-2' ?> border border-gray-200 rounded-lg shadow-lg md:flex-row md:max-w-xl">
            <div class="w-full flex rounded-t-lg h-full md:h-auto md:w-full md:rounded-none md:rounded-l-lg" alt="">
            <a href="./onhold.php" class="hover:font-bold text-sm text-white">< กลับ</a>
                <div class="w-[40%] h-full flex items-center justify-center">
                    <?php if ($book_row['image']) { ?>
                        <img src="<?php echo $book_row['image'] ?>" alt="Book Cover" alt="" class="h-full mt-5 object-contain rounded mx-auto">
                    <?php } else { ?>
                        <img src="./image/Book.png" alt="Book Cover" alt="" class=" h-72 object-contain rounded mx-auto">
                    <?php } ?>
                </div>
                <div class="flex flex-col w-[60%] item-stretch p-5 leading-normal">
                    <h5 class=" text-2xl font-bold tracking-tight text-gray-200 mb-2"><p><?php echo $book_row['title'] ?></p></h5>
                    <p class="mb-2 font-normal text-gray-400">หมวด<?php echo $book_row['category']; ?></p>
                    <p class="mb-2 font-normal text-gray-300"><?php echo $book_row['detail']; ?></p>
                    <hr>
                    <p class="mt-3 font-normal text-gray-400">ผู้ยืม : <?php echo $booker_row['prefix']; ?><?php echo $booker_row['firstname']; ?> <?php echo $booker_row['lastname']; ?></p>
                    <p class="font-normal text-gray-400">ยืมวันที่ : <?php echo formatDateTime($order_row['lending_date']); ?></p>
                    <p class="mb-2 font-normal text-gray-400">กำหนดคืน : <?php echo formatDateTime($order_row['return_date']); ?></p>
                    <br>
                    <div>
                    <?php if ($order_row['is_late'] == 0) { ?>
                        <a href="./backend/returnOrder.php?order_id=<?php echo $order_id; ?>"
                            class="self-end text-black shadow-md transition duration-200 bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-semibold rounded-md text-base px-4 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">คืน</a>
                    <?php } else { ?>
                        <div class="p-2 bg-black/30">
                                <p class="text-red-500 font-bold text-base">ท่านมีรายการหนังสือที่ยังไม่คืนภายในเวลาที่กำหนด โปรดติดต่อเจ้าหน้าที่ห้องสมุด</p>
                        </div>
                    <?php } ?>  
                    </div>
                </div>
            </div>  
        </div>

    </div>
</body>
</html>
    <?php
        session_start();

        if (!isset($_SESSION['user_data'])) {
            header('Location: ../login.php');
            exit();
        }

        include "../includes/head.php";
        include "../includes/navbar.php";
        require("../connect.php");

        $id = $_GET['id'];

        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($result);

        // user
        $user_id = $_SESSION['user_data']['id'];

        $user_sql = "SELECT * FROM user WHERE id = $user_id";
        $user_result = mysqli_query($connect ,$user_sql);
        $user_row = mysqli_fetch_assoc($user_result);

        if (strpos($row['detail'], "\n") !== false) {
            // If it contains line breaks, use nl2br to replace them with <br> tags
            $new_str = nl2br($row['detail']);
        } else {
            $new_str = $row['detail'];
        }

    ?>
    <div class="mt-4 flex justify-center items-center">
        <div class="flex flex-col items-center w-full bg-gray-800 <?php echo $row['image'] ? 'p-4' : 'p-2' ?> border border-gray-200 rounded-lg shadow-lg md:flex-row md:max-w-xl">
            <div class="w-full flex rounded-t-lg h-full md:h-auto md:w-full md:rounded-none md:rounded-l-lg" alt="">
            <a href="../index.php" class="hover:font-bold text-sm text-white">< กลับ</a>
                <div class="w-[40%] h-full flex items-center justify-center">
                    <?php if ($row['image']) { ?>
                        <img src="../<?php echo $row['image'] ?>" alt="Book Cover" alt="" class="h-full mt-5 object-contain rounded mx-auto">
                    <?php } else { ?>
                        <img src="./image/Book.png" alt="Book Cover" alt="" class=" h-72 object-contain rounded mx-auto">
                    <?php } ?>
                </div>
                <div class="flex flex-col w-[60%] item-stretch p-5 leading-normal">
                    <h5 class=" text-2xl font-bold tracking-tight text-gray-200 mb-3"><p><?php echo $row['title'] ?></p></h5>
                        <p class="mb-2 font-normal text-gray-400">หมวด<?php echo $row['category']; ?></p>
                            <p class="mb-2 font-normal text-gray-300"><?php echo $new_str ?></p>
                    <hr>       
                    <div class="mt-2 mb-2">
                        <p class="mb-2 font-normal text-gray-400">สามารถสั่งซื้อได้เพียงกดที่ปุ่มด้านล่างนี้</p>
                    </div>
                    <div>
                        <a href="<?php echo $row['link']; ?>"
                            class="self-end text-white shadow-md transition duration-200 bg-emerald-500 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-semibold rounded-md text-base px-4 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">ไปยังร้านค้า</a>
                    </div>
                </div>
            </div>  
    </div>
</body>
</html>
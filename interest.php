
<?php

    session_start();
    include "./includes/head.php";
    include "./includes/navbar.php";
    require("./connect.php");

    $sql = "SELECT * FROM products WHERE interesting = 1";
    $result = mysqli_query($connect, $sql);

    ?>
    <div class="mt-20 p-4">
        <h4 class="font-bold text-2xl"><u>สินค้าแนะนำ</u></h4>
        <div class="grid md:grid-cols-3 mt-3 gap-3 p-2">
            <?php
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="bg-white shadow-md transition duration-200 hover:shadow-xl p-3">
                        <center>
                            <?php if ($row['image']) { ?>
                                <img src="<?php echo $row['image'] ?>" alt="Book Cover" alt="" class="img-thumbnail h-72 object-cover rounded mx-auto" width="160px">
                            <?php } else { ?>
                                <img src="./image/Book.png" alt="Book Cover" alt="" class="img-thumbnail h-72 object-cover rounded mx-auto" width="160px">
                            <?php } ?>
                        </center>
                        <p class="mt-2 p-1 fs-6">ชื่อ : <?php echo $row['title']; ?><br>หมวด : <?php echo $row['category']; ?><br><a class="text-sky-700" href="./detail.php?id=<?php echo $row['id'] ?>">รายละเอียด</a></p>
                    </div>
            <?php }?>
        </div>
    </div>
    <script src="./js/bootstrap.js"></script>
</body>

</html>


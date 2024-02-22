<?php
    session_start();
    include "../includes/head.php";
    include "../includes/navbar.php";
    require("../connect.php");

    $sql = "SELECT * FROM products WHERE diseases LIKE '%ตับแข็ง%'";
    $result = mysqli_query($connect, $sql);
?>

<div class="mt-10 p-5">
    <div class="text-center text-5xl font-bold">
        <p>โรคตับแข็ง</p>
    </div>
</div>

<!-- image section -->
<div class="mt-8 flex h-[90%] mx-4 overflow-hidden">
    <div class="w-1/3 h-[100%]">
        <img src="../image/etc/liver_food.jpg">
    </div>
    <div class="w-1/3">
        <img src="../image/etc/liver_help.jpg" class="w-auto h-full">
    </div>
    <div class="w-1/3">
        <img src="../image/etc/liver_ingre.jpg" class="w-auto h-full">
    </div>
</div>

<!-- text section -->
<div class="mt-10 flex">
    <div class="w-3/5  h-full">
        <div class="bg-slate-300 p-4">
            <h4 class="font-bold text-2xl">ลักษณะของโรคตับแข็ง</h4>
            <hr>
            <p class="text-base mt-1 indent-4">โรคตับแข็ง คือภาวะที่ตับมีการก่อตัวของเนื้อเยื่อพังผืดส่วนเกิน เมื่อเกิดการอักเสบเรื้อรังเป็นระยะเวลานาน ตับจะทำการซ่อมแซมตัวเอง กระบวนการซ่อมแซมจะสร้างเนื้อเยื่อพังผืดสะสมจนเกิดเป็นโรคตับแข็งทำให้ตับไม่สามารถทำงานได้ปกติ ระยะท้ายๆเป็นภาวะที่เป็นอันตรายถึงชีวิต ทั้งยังเพิ่มความเสี่ยงของการเกิดมะเร็งตับอีกด้วย</p>
        </div>
        <div class="bg-slate-500 p-4">
            <h4 class="font-bold text-2xl mb-2">อาการของโรคตับแข็ง</h4>
            <hr>
            <p class="text-base my-1 indent-4">ผู้ที่เป็นโรคตับแข็งมักจะไม่แสดงอาการใด ๆ จนกว่าตับจะได้รับความเสียหายอย่างรุนแรง อาจมีอาการดังต่อไปนี้</p>
                <ul class="list-disc ml-4">
                    <li>รู้สึกอ่อนเพลีย</li>
                    <li>เลือดออกง่าย หรือเป็นจ้ำเลือดได้ง่าย</li>
                    <li>เบื่ออาหาร คลื่นไส้</li>
                    <li>ขา เท้า หรือข้อเท้าบวม</li>
                    <li>น้ำหนักลด</li>
                    <li>ภาวะดีซ่าน ตัวเหลือง ตาเหลือง</li>
                </ul>
            </p>
            <br>
        </div>
    </div>
    
    <div class="bg-sky-400 border w-2/5 p-4">
        <h4 class="font-bold text-2xl mb-2">วิธีป้องกันจากโรคตับแข็ง</h4>
        <hr>
        <br>
            <ul class="list-disc ml-4">
                        <li>หยุดบริโภคเครื่องดื่มแอลกอฮอล์เมื่อเป็นโรคตับแข็ง</li>
                        <li>ทานอาหารเพื่อสุขภาพ รับประทานอาหารให้ครบห้าหมู่ โดยเน้นอาหารจำพวก พืชผักเป็นส่วนประกอบหลัก ได้แก่ ผลไม้ ผัก ธัญพืชไม่ขัดสี และโปรตีนไร้มัน ลดการบริโภคอาหารที่มีไขมัน</li>
                        <li>รักษาดัชนีมวลกายให้อยู่ในเกณฑ์ปกติ ไขมันที่สะสมในร่างกายรวมถึงในตับสามารถทำให้เกิดตับอักเสบเรื้อรังได้ ควรปรึกษาแพทย์เกี่ยวกับแผนการลดน้ำหนักหากมีน้ำหนักเกิน</li>
                        <li>ลดปัจจัยเสี่ยงของโรคตับอักเสบ หลีกเลี่ยงการใช้เข็มร่วมกันและการมีเพศสัมพันธ์โดยไม่มีการป้องกัน เนื่องจากจะเพิ่มความเสี่ยงในการเกิดโรคไวรัสตับอักเสบ บีและซีได้</li>
            </ul>
    </div>
</div>

    <!-- product section -->
<div class="mt-5 pl-4">
    <h4 class="font-bold text-2xl"><u>รายการสินค้าทั้งหมด</u></h4>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 mt-3 gap-3 p-4">
        <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="bg-white shadow-md transition duration-200 hover:shadow-xl p-3">
                    <center>
                        <?php if ($row['image']) { ?>
                            <img src="../<?php echo $row['image'] ?>" alt="Book Cover" alt="" class="img-thumbnail h-72 object-contain rounded mx-auto" width="160px">
                        <?php } else { ?>
                            <img src="./image/Book.png" alt="Book Cover" alt="" class="img-thumbnail h-72 object-cover rounded mx-auto" width="160px">
                        <?php } ?>
                    </center>
                    <p class="mt-2 p-1 fs-6">ชื่อ : <?php echo $row['title']; ?><br>หมวด : <?php echo $row['category']; ?><br><a class="text-sky-700" href="./detail.php?id=<?php echo $row['id'] ?>">รายละเอียด</a></p>
                </div>
        <?php }?>
    </div>
</div>

<div class="mt-12 p-4">
    <!-- Other content here -->
</div>
</body>
</html>
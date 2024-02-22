
<?php
    session_start();
    include "../includes/head.php";
    include "../includes/navbar.php";
    require("../connect.php");

    $sql = "SELECT * FROM products WHERE diseases LIKE '%ไต%'";
    $result = mysqli_query($connect, $sql);
?>

<div class="mt-10 p-5">
    <div class="text-center text-5xl font-bold">
        <p>โรคไต</p>
    </div>
</div>

<!-- image section -->
<div class="mt-8 flex h-[90%] mx-4 overflow-hidden">
    <div class="w-1/3 h-[100%]">
        <img src="../image/etc/salt_img.jpg">
    </div>
    <div class="w-1/3 h-[100%]">
        <img src="../image/etc/doctor_kidney.jpg">
    </div>
    <div class="w-1/3 h-[100%]">
        <img src="../image/etc/vegetable_kidney.jpg">
    </div>
</div>

<!-- text section -->
<div class="mt-10 flex">
    <div class="w-3/5  h-full">
        <div class="bg-slate-300 p-4">
            <h4 class="font-bold text-2xl">ลักษณะของโรคไต</h4>
            <hr>
            <p class="text-base mt-1 indent-4">โรคไตคือ ภาวะที่ไตทำงานได้น้อยลงหรือผิดปกติ ซึ่งหน้าที่ของไตคือการกำจัดของเสียและสารพิษต่างๆ ออกจากร่างกาย การหลั่งฮอร์โมน การควบคุมน้ำและแร่ธาตุในร่างกาย ฯลฯ เมื่อไตทำงานได้น้อยลงจึงไม่สามารถกำจัดของเสียหรือสารพิษออกจากร่างกายได้ ระดับฮอร์โมนผิดปกติ รวมไปถึงความผิดปกติต่างๆ ของร่างกาย</p>
        </div>
        <div class="bg-slate-500 p-4">
            <h4 class="font-bold text-2xl mb-2">อาการของโรคไต</h4>
            <hr>
            <p class="text-base my-1 indent-4">อาการของโรคไตมักเกิดจากที่ร่างกายสะสมของเสียมากเกินไปจนส่งผลต่อระบบต่างๆ และฮอร์โมนที่ผิดปกติเพราะไตทำงานน้อยลงจึงทำให้เกิดอาการดังต่อไปนี้
                <ul class="list-disc ml-4">
                    <li>อ่อนเพลีย เหนื่อยง่ายสะอึก ซึม</li>
                    <li>คลื่นไส้ อาเจียน เบื่ออาหาร รสชาติอาหารแปลกไป</li>
                    <li>ผิวแห้ง ระคายเคืองผิว คัน</li>
                    <li>มีอาการบวมน้ำ ตัวบวม มักเริ่มที่ เท้า และรอบดวงตาก่อน</li>
                    <li>ปัสสาวะผิดปกติ อาจมากหรือน้อยต่างกัน มักจะปัสสาวะบ่อยตอนกลางคืน</li>
                    <li>เป็นตะคริวบ่อยๆ</li>
                </ul>
            </p>
            <br>
        </div>
    </div>
    
    <div class="bg-sky-400 border w-2/5 p-4">
        <h4 class="font-bold text-2xl mb-2">วิธีป้องกันจากโรคไต</h4>
        <hr>
        <br>
            <ul class="list-disc ml-4">
                        <li>หมั่นสนใจสุขภาพของตนเอง และไปรับการตรวจร่างกายเป็นประจำทุกปี</li>
                        <li>เลือกอาหารที่มีคุณค่า สุกสะอาด และมีประโยชน์ หลีกเลี่ยงอาหารไขมันสูง อาหารกระป๋อง อาหารหมักดอง อาหารแปรรูป และอาหารรสจัด</li>
                        <li>ดื่มน้ำสะอาดอย่างน้อยวันละ 1.5-2 ลิตร หรือ 6-8 แก้วต่อวัน</li>
                        <li>ออกกำลังกายอย่างสม่ำเสมอ</li>
                        <li>ควบคุมน้ำหนักให้อยู่ในเกณฑ์มาตรฐาน</li>
                        <li>พักผ่อนให้เพียงพออย่างน้อย 6-8 ชั่วโมง ต่อวัน</li>
                        <li>หลีกเลี่ยงสารเสพติด</li>
                        <li>หลีกเลี่ยงการกลั้นปัสสาวะเป็นเวลานานๆ</li>
                        <li>หลีกเลี่ยงกลุ่มยาที่อาจมีผลต่อไต เช่น ยาแห้ปวดซ้อ ปวดเส้น ปวดกล้ามเนื้อ ซึ่งมักเป็นยาในกลุ่ม “เอ็นเสด (NSAIDs)” ที่มีฤทธิ์ลดการอักเสบอย่างแรง</li>
                        <li>อย่าหลงเชื่อโฆษณาอาหารเสริมหรือสมุนไพรที่กล่าวอ้างสรรพคุณเกินจริง</li>
            </ul>
    </div>
</div>

    <!-- product section -->
<div class="mt-5 pl-4">
    <h4 class="font-bold text-2xl"><u>รายการสินค้าทั้งหมด</u></h4>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 mt-3 gap-3 p-2">
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

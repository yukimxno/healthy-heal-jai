
<?php
    session_start();
    include "../includes/head.php";
    include "../includes/navbar.php";
    require("../connect.php");

    $sql = "SELECT * FROM products WHERE diseases LIKE '%หัวใจ%'";
    $result = mysqli_query($connect, $sql);
?>

<div class="mt-10 p-5">
    <div class="text-center text-5xl font-bold">
        <p>โรคหัวใจ</p>
    </div>
</div>

<!-- image section -->
<div class="mt-8 flex h-[90%] mx-4 overflow-hidden">
    <div class="w-1/3 h-[100%]">
        <img src="../image/etc/heartache.jpg">
    </div>
    <div class="w-1/3 h-[100%]">
        <img src="../image/etc/heartscope.jpg">
    </div>
    <div class="w-1/3 h-[100%]">
        <img src="../image/etc/heart_food.jpg">
    </div>
</div>

<!-- text section -->
<div class="mt-10 flex">
    <div class="w-3/5  h-full">
        <div class="bg-slate-300 p-4">
            <h4 class="font-bold text-2xl">ลักษณะของโรคหัวใจ</h4>
            <hr>
            <p class="text-base mt-1 indent-4">โรคหัวใจ หรือ Heart Disease หมายถึง โรคต่าง ๆ ที่ส่งผลกระทบต่อการทำงานของหัวใจ โดยความผิดปกติที่เกิดขึ้นในส่วนของหัวใจที่ต่างกัน ทำให้โรคหัวใจมีอาการต่างกันไปในแต่ละชนิด</p>
            <br>
        </div>
        <div class="bg-slate-500 p-4">
            <h4 class="font-bold text-2xl mb-2">อาการของโรคหัวใจ</h4>
            <hr>
            <p class="text-base my-1 indent-4">อาการของโรคหัวใจขึ้นอยู่กับชนิดของโรคหัวใจ</p>
                <ul class="list-disc ml-4">
                    <li>โรคหลอดเลือดหัวใจ → เจ็บแน่นหน้าอก มักมีอาการแน่น อึดอัด เหมือนมีสิ่งกดทับกลางอก อาจมีอาการปวดร้าวไปกราม ไหล่ หรือแขนซ้าย มักเป็นมากขึ้นเมื่อออกกำลังและหากมีอาการรุนแรงอาจมีอาการเมื่ออยู่เฉย ๆ</li>
                    <li>โรคหัวใจที่เกิดจากภาวะหัวใจเต้นผิดจังหวะ → หัวใจของคุณอาจเต้นเร็วเกินไป ช้าเกินไป หรือไม่สม่ำเสมอ หัวใจเต้นสะดุด หรือเต้นเร็ว ๆ รัวๆ เจ็บหน้าอกหรือรู้สึกไม่สบาย</li>
                    <li>โรคหัวใจที่เกิดจากหัวใจพิการแต่กำเนิด → ความบกพร่องของหัวใจพิการแต่กำเนิดที่รุนแรงน้อยกว่ามักไม่ได้รับการวินิจฉัยจนกว่าจะถึงในวัยเด็กหรือในวัยผู้ใหญ่</li>
                    <li>โรคหัวใจที่เกิดจากกล้ามเนื้อหัวใจ → ในระยะแรกของโรคกล้ามเนื้อหัวใจ อาจไม่แสดงอาการ แต่เมื่ออาการรุนแรงขึ้น สามารถสังเกตได้จากหายใจไม่ออกขณะทำกิจกรรมหรือพักผ่อน อาการบวมที่ขา ข้อ และเท้า</li>
                    <li>โรคหัวใจที่เกิดจากการติดเชื้อ → เยื่อบุหัวใจอักเสบ คือการติดเชื้อที่มีผลต่อเยื่อบุด้านในของห้องหัวใจและลิ้นหัวใจ มีไข้หายใจถี่ มีอาการบวมที่ขาหรือหน้าท้อง การเต้นของหัวใจผิดปกติ</li>
                    <li>โรคหัวใจที่เกิดจากลิ้นหัวใจตีบหรือรั่ว → ลิ้นหัวใจทำหน้าที่เปิดและปิดเพื่อให้เลือดไหลผ่านหัวใจในทิศทางเดียว ซึ่งมีปัจจัยหลายอย่างที่อาจทำลายลิ้นหัวใจได้ อาจมีอาการเหนื่อยล้า หายใจถี่ เหนื่อยง่าย ท้าหรือข้อเท้าบวม เจ็บหน้าอก</li>
                </ul>
            </p>
            <br>
        </div>
    </div>
    
    <div class="bg-sky-400 border w-2/5 p-4">
        <h4 class="font-bold text-2xl mb-2">วิธีป้องกันจากโรคหัวใจ</h4>
        <hr>
        <br>
            <ul class="list-disc ml-4">
                        <p>ขึ้นอยู่กับชนิดของโรคหัวใจ สำหรับโรคหลอดเลือดหัวใจแม้ไม่มีสาเหตุเฉพาะเจาะจงชัดเจน แต่ก็มีปัจจัยสิ่งหลายอย่างที่หากเราควบคุมได้ดีจะช่วยลดโอกาสโรคหลอดเลือดหัวใจลงได้มาก เช่น</p>
                        <li>หลีกเลี่ยงการสูบบุหรี่</li>
                        <li>ควบคุมความดันโลหิตไม่ให้สูงเกินมาตรฐาน ควบคุมคอเลสเตอรอล และเบาหวาน</li>
                        <li>ออกกำลังกายสม่ำเสมอ อย่างน้อย 30 นาทีต่อวัน</li>
                        <li>รับประทานอาหารที่มีเกลือและไขมันอิ่มตัวต่ำ</li>
                        <li>ควบคุมน้ำหนักไม่ให้เกินมาตรฐาน</li>
                        <li>ลดความเครียด</li>
                        <li>ฝึกสุขอนามัยที่ดี</li>
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
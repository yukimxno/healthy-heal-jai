<?php
    session_start();
    include "../includes/head.php";
    include "../includes/navbar.php";
    require("../connect.php");

    $sql = "SELECT * FROM products WHERE diseases LIKE '%ความดัน%'";
    $result = mysqli_query($connect, $sql);
?>

<div class="mt-10 p-5">
    <div class="text-center text-5xl font-bold">
        <p>โรคความดันโลหิตสูง</p>
    </div>
</div>

<!-- image section -->
<div class="mt-8 flex h-[90%] mx-4 overflow-hidden">
    <div class="w-1/3">
        <img src="../image/etc/pressure_ingre.jpg" class="h-full w-auto">
    </div>
    <div class="w-1/3 h-[100%]">
        <img src="../image/etc/pressure_meter.jpg">
    </div>
    <div class="w-1/3">
        <img src="../image/etc/pressure_food.jpg" class="h-full w-auto">
    </div>
</div>

<!-- text section -->
<div class="mt-10 flex">
    <div class="w-3/5  h-full">
        <div class="bg-slate-300 p-4">
            <h4 class="font-bold text-2xl">ลักษณะของโรคความดัน</h4>
            <hr>
            <p class="text-base mt-1 indent-4">โรคความดันโลหิตสูงถือเป็นภัยเงียบที่น่ากลัวต่อร่างกาย โดยเฉพาะอย่างยิ่งต่อหัวใจของเรา ทำให้เกิดโรคร้ายตามมา ไม่ว่าจะเป็น ภาวะหัวใจวาย โรคหัวใจเต้นผิดจังหวะ โรคหลอดเลือดหัวใจตีบ ความน่ากลัวของโรคความดันโลหิตสูงคือ เป็นโรคที่มักไม่มีอาการ และจะเป็นโรคเรื้อรังที่รุนแรงถ้าไม่สามารถควบคุมโรคได้</p>
        </div>
        <div class="bg-slate-500 p-4">
            <h4 class="font-bold text-2xl mb-2">อาการของโรคความดัน</h4>
            <hr>
            <p class="text-base my-1 indent-4">ผู้ป่วยโรคความดันโลหิตสูงส่วนใหญ่มักจะไม่แสดงอาการแต่อย่างใด อาจมีอาการปวดมึนท้ายทอย ตึงที่ต้นคอ เวียนศีรษะ บางรายอาจมีอาการปวดศีรษะตุบๆ เหมือนไมเกรน ในผู้ป่วยที่เป็นมานาน อาจมีอาการอ่อนเพลีย เหนื่อยง่าย ใจสั่น นอนไม่หลับ  และเมื่อมีอาการมากอาจโคมา และเสียชีวิตได้ หากปล่อยนานอาจเกิด</p>
                <ul class="list-disc ml-4">
                    <li>เลือดไปเลี้ยงไตไม่พอ ไตวายเรื้อรัง</li>
                    <li>หลอดเลือดหัวใจหนา หัวใจขาดเลือด หัวใจวาย</li>
                    <li>หลอดเลือดตีบ โป่งพอง เลือดไปเลี้ยงอวัยวะได้น้อยลง</li>
                    <li>มีผลต่อเส้นเลือดที่ไปเลี้ยงจอประสาทตา ทำให้จอประสาทตาเสื่อม</li>
                    <li>เป็นสาเหตุของอัมพฤกษ์ อัมพาต</li>
                </ul>
            </p>
            <br>
        </div>
    </div>
    
    <div class="bg-sky-400 border w-2/5 p-4">
        <h4 class="font-bold text-2xl mb-2">วิธีป้องกันจากโรคความดัน</h4>
        <hr>
        <br>
            <ul class="list-disc ml-4">
                        <li>ลดการกินอาหารโซเดียมสูง เช่น อาหารแปรรูป อาหารปรุงสำเร็จ เบเกอร์รี และพิจารณาฉลากโภชนาการก่อนซื้อ โดยเลือกชนิดที่มีโซเดียมต่ำ</li>
                        <li>ลดการกินอาหารไขมันสูง เช่น เนื้อสัตว์ติดมัน อาหารทอดหรือผัดน้ำมัน กะทิ ควรเลือกใช้น้ำมันที่ดีต่อสุขภาพในการประกอบอาหาร เช่น น้ำมันมะพร้าว น้ำมันมะกอก น้ำมันรำข้าว</li>
                        <li>ลดการกินอาหารน้ำตาลสูง เช่น ขนมหวาน น้ำหวานชงดื่ม ไอศกรีม ผลไม้รสหวาน เพราะน้ำตาลส่วนเกินจะถูกเก็บสะสมไว้ในรูปของไขมัน</li>
                        <li>เพิ่มการกินผักและผลไม้ไม่หวานให้มากขึ้น โดยให้มีสัดส่วนเป็นครึ่งหนึ่งในแต่ละมื้ออาหาร</li>
                        <li>การออกกำลังกายมีส่วนสำคัญอย่างมากในการป้องกันและลดความเสี่ยงต่อการเกิดโรคความดันโลหิตสูง</li>
                        <li>งดการสูบบุหรี่</li>
                        <li>งดการดื่มแอลกอฮอล์</li>
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
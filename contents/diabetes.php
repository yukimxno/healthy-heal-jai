<?php
    session_start();
    include "../includes/head.php";
    include "../includes/navbar.php";
    require("../connect.php");

    $sql = "SELECT * FROM products WHERE diseases LIKE '%เบาหวาน%'";
    $result = mysqli_query($connect, $sql);
?>
    
<div class="mt-10 p-5">
    <div class="text-center text-5xl font-bold">
        <p>โรคเบาหวาน</p>
    </div>
</div>

<!-- image section -->
<div class="mt-8 flex h-[90%] mx-4 overflow-hidden">
    <div class="w-1/3 h-[100%]">
        <img src="../image/etc/sugar_img.jpg">
    </div>
    <div class="w-1/3">
        <img src="../image/etc/diabetes_meter.jpg" class="w-auto h-full">
    </div>
    <div class="w-1/3">
        <img src="../image/etc/diabetes_fruit.jpg" class="w-auto h-full">
    </div>
</div>

<!-- text section -->
<div class="mt-10 flex">
    <div class="w-3/5  h-full">
        <div class="bg-slate-300 p-4">
            <h4 class="font-bold text-2xl">ลักษณะของโรคเบาหวาน</h4>
            <hr>
            <p class="text-base mt-1 indent-4">โรคเบาหวาน (Diabetes) คือโรคที่เกิดจากความผิดปกติของการทำงานของฮอร์โมนที่ชื่อว่า อินสุลิน (Insulin) ทำให้ร่างกายไม่สามารถนำน้ำตาลที่อยู่ในกระแสเลือดไปใช้ได้อย่างเต็มประสิทธิภาพ ทำให้มีปริมาณน้ำตาลในเลือดมากกว่าปกติ</p>
        </div>
        <div class="bg-slate-500 p-4">
            <h4 class="font-bold text-2xl mb-2">อาการของโรคเบาหวาน</h4>
            <hr>
            <p class="text-base my-1 indent-4">เบาหวานที่พบได้บ่อยที่สุด คือเบาหวานชนิดที่ 2 สาเหตุของโรคเบาหวานชนิดนี้เกิดจากกรรมพันธุ์และการใช้ชีวิตประจำวัน เช่น การรับประทานอาหารประเภทแป้ง ของหวานมากเกินไป ภาวะน้ำหนักเกิน อ้วนลงพุง การขยับร่างกายที่น้อยลง ไม่ออกกำลังกาย เป็นต้น นอกจากนี้ยังมีภาวะแทรกซ้อนของโรคเบาหวานอีกมากมาย</p>
                <ul class="list-disc ml-4">
                    <li>ภาวะแทรกซ้อนทางตา → เสี่ยงต้อกระจก</li>
                    <li>ภาวะแทรกซ้อนทางไต → หรืออีกชื่อคือเบาหวานลงไต เสี่ยงไตวายเรื้อรัง</li>
                    <li>ภาวะแทรกซ้อนทางเส้นประสาท → ผู้ป่วยมักมีอาการชาปลายมือปลายเท้า เหมือนใส่ถุงมือหรือถุงเท้าอยู่ตลอดเวลา</li>
                    <li>เส้นเลือดแดงใหญ่อุดตัน → โดยเฉพาะบริเวณขา อาการที่พบได้บ่อยคือ มีอาการปวดขามากเมื่อเดินหรือวิ่ง</li>
                    <li>เส้นเลือดหัวใจตีบ → เป็นภาวะแทรกซ้อนที่รุนแรง โดยเส้นเลือดที่ไปเลี้ยงหัวใจตีบ ทำให้กล้ามเนื้อหัวใจขาดเลือด หรือหากตีบรุนแรงอาจทำให้กล้ามเนื้อหัวใจตาย</li>
                    <li>เส้นเลือดสมองตีบ → เป็นภาวะแทรกซ้อนที่รุนแรงเช่นกัน เมื่อเกิดภาวะเส้นเลือดสมองตีบ ทำให้การทำงานของสมองและเส้นประสาทบริเวณที่ขาดเลือดลดลงหรือไม่ทำงาน ส่งผลให้เกิดอัมพฤกษ์ อัมพาต</li>
                </ul>
            </p>
            <br>
        </div>
    </div>
    
    <div class="bg-sky-400 border w-2/5 p-4">
        <h4 class="font-bold text-2xl mb-2">วิธีป้องกันจากโรคเบาหวาน</h4>
        <hr>
        <br>
            <ul class="list-disc ml-4">
                        <li>ปรับเปลี่ยนพฤติกรรมการกิน ลดปริมาณของหวานหรืออาหารจำพวกแป้งและคาร์โบไฮเดรตต่าง ๆ ลง เช่น น้ำอัดลม ขนมหวาน เบเกอรี่</li>
                        <li>รับประทานอาหารที่มีกากใยสูง นอกจากจะลดอาหารหวาน มัน เค็มแล้ว ยังควรหันมาบริโภคอาหารที่มีกากใยสูงอย่างผักใบเขียวให้มากขึ้น</li>
                        <li>ออกกำลังกายสม่ำเสมอ เช่น การเดินเร็ว ปั่นจักรยาน หรือเต้นแอโรบิก ครั้งละประมาณ 30 นาที ให้ได้ 3-5 ครั้ง/สัปดาห์</li>
                        <li>ควบคุมน้ำหนักให้อยู่ในเกณฑ์ปกติ หมั่นสังเกตอยู่เสมอว่าน้ำหนักลด หรือเพิ่มแบบไม่มีสาเหตุหรือไม่ และพยายามควบคุมน้ำหนักให้อยู่ในเกณฑ์ปกติ ไม่อ้วนเกินไป หรือผอมเกินไป</li>
                        <li>หลีกเลี่ยงการดื่มแอลกอฮอล์ ลด ละ หลีกเลี่ยง หรือจำกัดปริมาณการดื่มเครื่องดื่มแอลกอฮอล์ทุกชนิด เนื่องจากเครื่องดื่มแอลกอฮอล์นั้นอาจมีผลข้างเคียงกับยาที่ใช้รักษาโรคเบาหวาน</li>
                        <li>งดสูบบุหรี่ ผู้ป่วยโรคเบาหวานควรงดสูบบุหรี่โดยเด็ดขาด เพื่อลดความเสี่ยงของโรคหัวใจและหลอดเลือด</li>
                        <li>ใช้ยาเพื่อควบคุมระดับน้ำตาลในเลือด เมื่อปรับเปลี่ยนพฤติกรรมต่าง ๆ แล้ว แต่ก็ยังไม่สามารถควบคุมระดับน้ำตาลในเลือดได้ คุณหมอก็จำเป็นต้องใช้ยาลดระดับน้ำตาลในเลือด</li>
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
<?php
        session_start();
        require("./connect.php");

        if (!isset($_SESSION['user_data'])) {
            header('Location: ./login.php');
            exit();
        } 

        if (($_SESSION['user_data']['is_admin'] == 0)) {
            header('Location: ./index.php');
            exit();
        }

        include "./includes/head.php";
        include "./includes/navbar.php";

        $id = $_GET['id'];

        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($result);

        $selectedDiseases = explode(', ', $row['diseases']);

    ?>


    <div class="mt-20 flex justify-center">
    <div class="w-full">
            <div class="p-4 mt-20">
                <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-[80vh] lg:py-0">
                    <div
                        class="w-full bg-white/70 rounded-lg shadow-xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-6 space-y-4 md:space-y-2 sm:p-8">
                            <a href="./index.php" class="hover:font-bold text-white">< กลับ</a>
                            <h1
                                class="text-xl font-bold leading-tight underline tracking-tight text-gray-900 md:text-2xl dark:text-white">
                                แก้ไขข้อมูลสินค้า
                            </h1>
                            <form class="space-y-4 md:space-y-2" action="./backend/editProduct.php?id=<?php echo $row['id'] ?>" method="POST" enctype="multipart/form-data">
                                <div>
                                    <label for="title"
                                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">ชื่อ</label>
                                    <input type="text" name="title" id="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="ชื่อสินค้า" value="<?php echo $row['title']; ?>" required>
                                </div>
                                <div>
                                    <label class="dark:text-gray-200 font-bold">ประเภท</label>
                                    <div class="flex flex-wrap items-center space-x-2">
                                        <?php
                                        // Define an array of all possible diseases
                                        $allDiseases = array("ไต", "หัวใจ", "เบาหวาน", "ความดัน", "ตับแข็ง");

                                        // Get the diseases associated with the product
                                        $selectedDiseases = explode(', ', $row['diseases']);


                                        // Loop through all diseases and create checkboxes
                                        foreach ($allDiseases as $disease) {
                                            $isChecked = in_array($disease, $selectedDiseases) ? 'checked' : '';
                                        ?>
                                            <div>
                                                <label for="disease_<?php echo $disease; ?>" class="inline-flex items-center">
                                                    <input type="checkbox" name="diseases[]" id="disease_<?php echo $disease; ?>" value="<?php echo $disease; ?>" class="form-checkbox h-5 w-5 text-emerald-600" <?php echo $isChecked; ?>>
                                                    <span class="ml-2 text-gray-900 dark:text-white"><?php echo $disease; ?></span>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <div>
                                    <label class="dark:text-gray-200 font-bold" for="category">หมวด</label>
                                    <select name="category" id="category" required class="block bg-gray-50 w-full px-2 py-2 mt-2 text-gray-700  border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <option disabled selected value="">-- โปรดเลือกประเภทของสินค้า --</option>
                                        <option value="เนื้อสัตว์" <?php echo ($row['category'] == 'เนื้อสัตว์') ? 'selected' : ''; ?>>เนื้อสัตว์</option>
                                        <option value="ผัก/ผลไม้" <?php echo ($row['category'] == 'ผัก/ผลไม้') ? 'selected' : ''; ?>>ผัก/ผลไม้</option>
                                        <option value="อาหารสดและเบเกอรี่" <?php echo ($row['category'] == 'อาหารสดและเบเกอรี่') ? 'selected' : ''; ?>>อาหารสดและเบเกอรี่</option>
                                        <option value="ของแห้งและเครื่องปรุง" <?php echo ($row['category'] == 'ของแห้งและเครื่องปรุง') ? 'selected' : ''; ?>>ของแห้งและเครื่องปรุง</option>
                                        <option value="ขนมและของหวาน" <?php echo ($row['category'] == 'ขนมและของหวาน') ? 'selected' : ''; ?>>ขนมและของหวาน</option>
                                        <option value="เครื่องดื่ม" <?php echo ($row['category'] == 'เครื่องดื่ม') ? 'selected' : ''; ?>>เครื่องดื่ม</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="detail"
                                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">รายละเอียด</label>
                                        <textarea id="detail" name="detail" rows="4" class="block p-2.5 mt-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="รายละเอียดหนังสือ (ไม่บังคับกรอก)"><?php echo $row['detail']; ?></textarea>
                                </div>
                                <div>
                                    <label for="link"
                                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">ลิ้งค์สินค้า</label>
                                    <input type="text" name="link" id="link"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="ลิ้งค์สินค้า" value="<?php echo $row['link']; ?>" required>
                                </div>
                                <div class="my-3">
                                <?php if ($row['image']) { ?>
                                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">ภาพปกหนังสือเดิม</label>
                                    <img src="<?php echo $row['image']; ?>" alt="Current Image" class="w-20 h-20 object-contain mb-2">
                                <?php } ?>
                                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white" for="file_input">ภาพปกหนังสือ</label>
                                    <input type="file" name="imageUpload" accept="image/jpeg, image/jpg, image/png" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input">
                                </div>
                                <button type="submit" name="edit"
                                    class="w-full text-white mt-2 shadow-md transition duration-200 bg-emerald-500 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-semibold rounded-lg text-md px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">แก้ไขข้อมูล</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


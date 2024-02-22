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
    

    ?>

    <div class="mt-7 flex justify-center">
    <div class="w-full">
            <div class="p-4 mt-20">
                <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-[80vh] lg:py-0">
                    <div
                        class="w-full bg-white/70 rounded-lg shadow-xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-6 space-y-4 md:space-y-2 sm:p-8">
                            <a href="./index.php" class="hover:font-bold text-white">< กลับ</a>
                            <h1
                                class="text-xl font-bold leading-tight underline tracking-tight text-gray-900 md:text-2xl dark:text-white">
                                เพิ่มลิสต์สินค้า
                            </h1>
                            <form class="space-y-4 md:space-y-2" action="./backend/addProduct.php" method="POST" enctype="multipart/form-data">
                                <div>
                                    <label for="title"
                                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">ชื่อ</label>
                                    <input type="text" name="title" id="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="ชื่อหนังสือ" required>
                                </div>
                                <div class="my-3">
                                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">ประเภท</label>
                                    <label for="disease_1" class="inline-flex items-center">
                                        <input type="checkbox" name="diseases[]" id="disease_1" value="ไต" class="form-checkbox h-5 w-5 text-emerald-600">
                                        <span class="ml-2 text-gray-900 dark:text-white">ไต</span>
                                    </label>
                                    <label for="disease_2" class="inline-flex items-center">
                                        <input type="checkbox" name="diseases[]" id="disease_2" value="หัวใจ" class="form-checkbox h-5 w-5 text-emerald-600">
                                        <span class="ml-2 text-gray-900 dark:text-white">หัวใจ</span>
                                    </label>
                                    <label for="disease_3" class="inline-flex items-center">
                                        <input type="checkbox" name="diseases[]" id="disease_3" value="เบาหวาน" class="form-checkbox h-5 w-5 text-emerald-600">
                                        <span class="ml-2 text-gray-900 dark:text-white">เบาหวาน</span>
                                    </label>
                                    <label for="disease_4" class="inline-flex items-center">
                                        <input type="checkbox" name="diseases[]" id="disease_4" value="ความดัน" class="form-checkbox h-5 w-5 text-emerald-600">
                                        <span class="ml-2 text-gray-900 dark:text-white">ความดัน</span>
                                    </label>
                                    <label for="disease_5" class="inline-flex items-center">
                                        <input type="checkbox" name="diseases[]" id="disease_5" value="ตับแข็ง" class="form-checkbox h-5 w-5 text-emerald-600">
                                        <span class="ml-2 text-gray-900 dark:text-white">ตับแข็ง</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="dark:text-gray-200 font-bold" for="category">หมวด</label>
                                    <select name="category" id="category" required class="block bg-gray-50 w-full px-2 py-2 mt-2 text-gray-700  border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                        <option disabled selected value="">-- โปรดเลือกประเภทของสินค้า --</option>
                                        <option value="เนื้อสัตว์">เนื้อสัตว์</option>
                                        <option value="ผัก/ผลไม้">ผัก/ผลไม้</option>
                                        <option value="อาหารสดและเบเกอรี่">อาหารสดและเบเกอรี่</option>
                                        <option value="ของแห้งและเครื่องปรุง">ของแห้งและเครื่องปรุง</option>
                                        <option value="ขนมและของหวาน">ขนมและของหวาน</option>
                                        <option value="เครื่องดื่ม">เครื่องดื่ม</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="detail"
                                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">รายละเอียด</label>
                                        <textarea id="detail" name="detail" rows="4" class="block p-2.5 mt-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="รายละเอียดหนังสือ (ไม่บังคับกรอก)"><?php echo nl2br($row['detail']); ?></textarea>
                                </div>
                                <div>
                                <label for="link"
                                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">ลิ้งค์สินค้า</label>
                                    <input type="text" name="link" id="link"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="ลิ้งค์สินค้า" required>
                                </div>
                            <div class="my-3">    
                                <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white" for="file_input">ภาพสินค้า</label>
                                    <input type="file" name="imageUpload" accept="image/jpeg, image/png, image/jpg" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" >
                                </div>
                                <button type="submit" name="submit"
                                    class="w-full text-white mt-2 shadow-md transition duration-200 bg-emerald-500 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-semibold rounded-lg text-md px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">เพิ่มสินค้า</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


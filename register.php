<?php

    session_start();

    if (isset($_SESSION['user_data'])) {
        header('Location: ./index.php');
        exit();
    }

    include ("./includes/head.php");
    include ("./includes/navbar.php");
    include ("./connect.php");

    ?>


    <div class="mt-20 flex justify-center">
    <div class="w-full">
            <div class="container p-4 mx-auto md:mt-10 lg:mt-0 md:h-[60vh] lg:py-0">
                <!-- component -->
                <section class="max-w-4xl my-10 p-8 mx-auto  bg-white/70 rounded-md shadow-lg ">
                    <div class="flex gap-4 items-baseline">
                        <h1
                            class="text-xl font-bold pb-2 leading-tight underline tracking-tight text-gray-900 md:text-2xl">
                            ลงชื่อเข้าใช้บัญชีของคุณ</h1>
                    </div>
                    <form action="./backend/register.php" method="POST" onsubmit="return validateForm()">
                        <?php include('errors.php'); ?>
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                            <div>
                                <label class="font-bold" for="prefix">คำนำหน้าชื่อ</label>
                                <select name="prefix" id="prefix" class="block bg-gray-50 w-full px-2 py-2 mt-2 text-gray-700  border border-gray-300 rounded-md focus:outline-none focus:ring">
                                    <option disabled selected value="">-- โปรดเลือกคำนำหน้า --</option>
                                    <option value="ด.ช.">ด.ช.</option>
                                    <option value="ด.ญ.">ด.ญ.</option>
                                    <option value="นาย">นาย</option>
                                    <option value="น.ส.">น.ส.</option>
                                    <option value="นาง">นาง</option>
                                    <option value="other">อื่น ๆ</option>
                                </select>
                            </div>
                            <div>
                                <label class="font-bold" for="firstname">ชื่อ</label>
                                <input type="text" name="firstname" id="firstname" placeholder="สมชาย" class="bg-gray-50 border mt-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            </div>

                            <div>
                                <label class="font-bold" for="lastname">นามสกุล</label>
                                <input type="text" name="lastname" id="lastname" placeholder="ใจดี" class="bg-gray-50 border mt-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            </div>

                            <div>
                                <label class="font-bold" for="email">อีเมล</label>
                                <input type="email" name="email" id="email" placeholder="โปรดกรอกอีเมลที่ท่านใช้งานจริง"
                                    class="bg-gray-50 border mt-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-bold text-gray-900"
                                    for="password">รหัสผ่าน</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2">
                                        <a id="password_toggle">
                                            <div class="flex-shrink hover:cursor-pointer pl-1 pr-2">
                                                <i class="fa fa-solid fa-eye fa-fw fa-inverse" id="password_toggle_btn"
                                                    style="color: #aaa;"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <input type="password" name="password" id="password" placeholder="รหัสผ่าน"
                                        class="bg-gray-50 border mt-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        >
                                </div>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-bold text-gray-900"
                                    for="check_password">ยืนยันรหัสผ่าน</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2">
                                        <a id="check_password_toggle">
                                            <div class="flex-shrink hover:cursor-pointer pl-1 pr-2">
                                                <i class="fa fa-solid fa-eye fa-fw fa-inverse"
                                                    id="check_password_toggle_btn" style="color: #aaa;"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <input type="password" name="check_password" id="check_password"
                                        placeholder="ยืนยันรหัสผ่าน"
                                        class="bg-gray-50 border mt-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        >
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center mt-2 justify-between">
                                    <div class="flex items-center">
                                    </div>
                                    <a href="/login.php"
                                        class="text-sm font-medium text-emerald-700 hover:underline">มีบัญชีแล้ว
                                        ?</a>
                                </div>

                            </div>

                            <div>
                                <div class="p-2 mt-2">
                                    <button type="submit" name="reg_user"
                                        class="w-full text-white shadow-md transition duration-200 bg-emerald-500 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-semibold rounded-lg text-md p-2 text-center text-lg dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">สมัครสมาชิก</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
<script>

    <?php
        if (isset($_SESSION['error'])) {
            echo "alert('{$_SESSION['error']}');";
            unset($_SESSION['error']);
        }
    ?>

    const passwordToggle = document.getElementById('password_toggle')
    const passwordtoggleBtn = document.getElementById('password_toggle_btn')
    const password = document.getElementById('password')

    const checkPasswordToggle = document.getElementById('check_password_toggle')
    const checkPasswordtoggleBtn = document.getElementById('check_password_toggle_btn')
    const checkPassword = document.getElementById('check_password')

    passwordToggle.addEventListener('click', () => {
        if (password.type === 'password') {
            password.type = 'text';
            passwordtoggleBtn.style.color = "rgb(161 98 7)"
        } else {
            password.type = 'password';
            passwordtoggleBtn.style.color = "#aaa"
        }
    })
    checkPasswordToggle.addEventListener('click', () => {
        if (checkPassword.type === 'password') {
            checkPassword.type = 'text';
            checkPasswordtoggleBtn.style.color = "rgb(161 98 7)"
        } else {
            checkPassword.type = 'password';
            checkPasswordtoggleBtn.style.color = "#aaa"
        }
    })

    function validateForm() {
        var prefix = document.getElementById("prefix").value;
        var firstname = document.getElementById("firstname").value;
        var lastname = document.getElementById("lastname").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var checkPassword = document.getElementById("check_password").value;

        // Check if any field is empty
        if (!prefix || !firstname || !lastname || !email || !password || !checkPassword) {
            alert("โปรดกรอกข้อมูลให้ครบทุกช่อง");
            return false;
        }

        // Check password length
        if (password.length < 8 || password.length > 16) {
            alert("รหัสผ่านควรมีความยาวตั้งแต่ 8 ถึง 16 ตัวอักษร");
            return false;
        }

        // Check if passwords match
        if (password !== checkPassword) {
            alert("ยืนยันรหัสผ่านไม่ถูกต้อง");
            return false;
        }

        // Form validation passed, allow form submission
        return true;
    }
 
</script>

</html>


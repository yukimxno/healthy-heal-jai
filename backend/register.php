<?php
    session_start();
    require ('../connect.php');

    $errors = array();

    if (isset($_POST['reg_user'])) {
        $prefix = mysqli_real_escape_string($connect, $_POST['prefix']);
        $firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        $checkPassword = mysqli_real_escape_string($connect, $_POST['check_password']);

        if (empty($prefix)) {
            array_push($errors, 'โปรดกรอกคำนำหน้า');
        }

        if (empty($firstname)) {
            array_push($errors, 'โปรดกรอกชื่อจริง');
        }

        if (empty($lastname)) {
            array_push($errors, 'โปรดกรอกนามสกุล');
        }

        if (empty($email)) {
            array_push($errors, 'โปรดกรอกอีเมล');
        }

        if (empty($password)) {
            array_push($errors, 'โปรดกรอกรหัสผ่าน');
        } elseif (strlen($password) < 8 || strlen($password) > 16) {
            array_push($errors, 'รหัสผ่านควรมีความยาวตั้งแต่ 8 ถึง 16 ตัวอักษร');
        }

        if ($checkPassword != $password) {
            array_push($errors, 'โปรดกรอกยืนยันรหัสผ่านให้ถูกต้อง');
        }

        $check_user_query = "SELECT * FROM user WHERE email = '$email'";
        $check_query = mysqli_query($connect, $check_user_query);
        $check_result = mysqli_fetch_assoc($check_query);
            
        if ($check_result) {
            array_push($errors, 'อีเมลนี้ถูกใช้แล้ว');
            $_SESSION['error'] = "อีเมลนี้ถูกใช้แล้ว";
            }

                if (count($errors) > 0 ){
                    header('location: ../register.php');
                }

                if (count($errors) == 0) {
                    $enPassword = md5($password);

                    $sql = "INSERT INTO user (prefix, firstname, lastname, email, password) VALUES ('$prefix', '$firstname', '$lastname', '$email', '$enPassword')";
                    mysqli_query($connect, $sql);
                    
                    $user_query = "SELECT * FROM user WHERE email = '$email'";
                    $user_result = mysqli_query($connect, $user_query);
                    $user = mysqli_fetch_assoc($user_result);

                    $_SESSION['user_data'] = $user;
                    $_SESSION['email'] = $email;
                    $_SESSION['prefix'] = $prefix;
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['lastname']= $lastname;
                    $_SESSION['success'] = "You are now logging in";
                    header('location: ../index.php');

                }
    }
    
?>
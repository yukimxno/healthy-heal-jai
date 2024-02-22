<?php
    session_start();
    require('../connect.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);

        if (empty($email)) {
            array_push($errors, 'โปรดกรอกอีเมล');
        }

        if (empty($password)) {
            array_push($errors, 'โปรดกรอกรหัสผ่าน');
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password' ";
            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['email'] = $email;
                $_SESSION['user_data'] = $user;
                $_SESSION['success'] = "You are now logged in";
                header('location: ../index.php');
            } else {
                array_push($errors, 'อีเมล/รหัสผ่านไม่ถูกต้อง');
                $_SESSION['error'] = "อีเมล/รหัสผ่านไม่ถูกต้อง โปรดลองอีกครั้ง";
                header('location:../login.php');
            }
        } 

        // Redirect back to login page, regardless of whether there was an error or not
    }
?>

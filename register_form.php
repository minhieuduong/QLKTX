<?php

@include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);

    // Kiểm tra số điện thoại hợp lệ
    if (!preg_match("/^\d{10}$/", $phonenumber)) {
        $error[] = 'Số điện thoại không hợp lệ. Vui lòng chỉ nhập đúng 10 chữ số.';
    }

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'Tài khoản đã tồn tại';
    } else {
        if ($pass != $cpass) {
            $error[] = 'Mật khẩu không trùng khớp';
        } else {
            $insert = "INSERT INTO user_form(name, email, password, user_type, phonenumber) VALUES('$name','$email','$pass','$user_type','$phonenumber')";
            mysqli_query($conn, $insert);
            header('location:AccountManagement/AccountManagement.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>Thêm tài khoản mới</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <input type="text" name="name" required placeholder="Nhập họ và tên">
            <input type="email" name="email" required placeholder="Nhập email">
            <input type="text" name="phonenumber" required placeholder="Nhập số điện thoại">
            <input type="password" name="password" required placeholder="Nhập mật khẩu">
            <input type="password" name="cpassword" required placeholder="Xác nhận mật khẩu">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <a href="javascript:history.go(-1);" class="back-btn">Back</a>
            <!-- <p>already have an account? <a href="login_form.php">login now</a></p> -->
        </form>

    </div>

</body>

</html>
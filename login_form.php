<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

    // Kiểm tra xem các khóa tồn tại trong mảng $_POST trước khi sử dụng
    if (isset($_POST['name'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
    }
    if (isset($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }
    if (isset($_POST['password'])) {
        $pass = md5($_POST['password']);
    }
    if (isset($_POST['cpassword'])) {
        $cpass = md5($_POST['cpassword']);
    }
    if (isset($_POST['user_type'])) {
        $user_type = $_POST['user_type'];
    }

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {

            $_SESSION['admin_name'] = $row['name'];

            $_SESSION['user_id'] = $row['id'];

            $_SESSION['user_role'] = 'admin';

            header('location:admin_page.php');
        } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];

            $_SESSION['user_id'] = $row['id'];

            $_SESSION['user_role'] = 'user';

            header('location:user_page.php');
        }
    } else {
        $error[] = 'Email hoặc mật khẩu không chính xác!';
    }
};
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="form-container">

        <form action="" method="post">
            <h3>Đăng nhập</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="Nhập Email">
            <input type="password" name="password" required placeholder="Nhập password">
            <input type="submit" name="submit" value="Đăng nhập" class="form-btn">
            <!-- <p>don't have an account? <a href="register_form.php">register now</a></p> -->
        </form>

    </div>

</body>

</html>
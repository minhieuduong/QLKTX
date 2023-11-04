<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login_form.php');
    exit();
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Gửi thông tin liên hệ tới admin (thay thế "admin_email@example.com" bằng địa chỉ email của admin)
    $admin_email = "hieuduong1704@gmail.com";
    $subject = "Liên hệ từ $name";
    $message_to_admin = "Email: $email\n\n$message";

    if (mail($admin_email, $subject, $message_to_admin)) {
        $success = "Thông tin của bạn đã được gửi thành công cho admin.";
    } else {
        $error = "Lỗi: Không thể gửi thông tin của bạn cho admin.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="form-container">
        <form action="" method="post">
            <h3>Liên hệ</h3>
            <?php
            if (isset($error)) {
                echo '<span class="error-msg">' . $error . '</span>';
            }
            if (isset($success)) {
                echo '<span class="success-msg">' . $success . '</span>';
            }
            ?>
            <input type="text" name="name" required placeholder="Tên">
            <input type="email" name="email" required placeholder="Email">
            <textarea name="message" required placeholder="Nội dung"></textarea>
            <input type="submit" name="submit" value="Gửi" class="form-btn">
        </form>
    </div>
</body>

</html>
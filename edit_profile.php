<?php
@include 'config.php';

session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user') {
} else {
    header('location: login_form.php');
    exit();
}

// Lấy thông tin tài khoản user từ database
$user_id = $_SESSION['user_id'];
$selectQuery = "SELECT name, email, phonenumber FROM user_form WHERE id = '$user_id'";
$result = mysqli_query($conn, $selectQuery);

if (!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_name = $row['name'];
    $user_email = $row['email'];
    $user_phonenumber = $row['phonenumber'];
} else {
    die("Không tìm thấy thông tin tài khoản.");
}

if (isset($_POST['submit'])) {
    $newName = mysqli_real_escape_string($conn, $_POST['name']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $newPhonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $newPassword = md5($_POST['password']);

    // Cập nhật thông tin tài khoản user trong cơ sở dữ liệu
    $updateQuery = "UPDATE user_form SET name = '$newName', email = '$newEmail', password = '$newPassword', phonenumber = '$newPhonenumber' WHERE id = $user_id";

    if (mysqli_query($conn, $updateQuery)) {
        header('location: user_page.php');
        exit();
    } else {
        $error = 'Lỗi: Không thể cập nhật thông tin.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin tài khoản User</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="../KTX/css/style.css">
</head>

<body>
    <?php include 'navbar/usernavbar.php'; ?>
    <div class="form-container">
        <form action="" method="post">
            <h3>Chỉnh sửa thông tin tài khoản User</h3>
            <?php
            if (isset($error)) {
                echo '<span class="error-msg">' . $error . '</span>';
            }
            ?>
            <input type="text" name="name" required placeholder="Tên mới" value="<?php echo $user_name; ?>">
            <input type="email" name="email" required placeholder="Email mới" value="<?php echo $user_email; ?>">
            <input type="text" name="phonenumber" required placeholder="Số điện thoại mới" value="<?php echo $user_phonenumber; ?>">
            <input type="password" name="password" required placeholder="Mật khẩu mới">
            <input type="submit" name="submit" value="Lưu" class="form-btn">
        </form>
    </div>
</body>

</html>
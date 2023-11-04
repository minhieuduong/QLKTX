<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login_form.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Truy vấn thông tin của người dùng đang đăng nhập
$query = "SELECT * FROM user_form WHERE user_type = 'user' AND id = $user_id";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_name = $row['name'];
    $user_email = $row['email'];
    $user_phonenumber = $row['phonenumber'];
} else {
    die("Không tìm thấy thông tin người dùng.");
}

// Xử lý cập nhật thông tin người dùng
if (isset($_POST['submit'])) {
    $newName = mysqli_real_escape_string($conn, $_POST['name']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $newPhonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);

    $updateQuery = "UPDATE user_form SET name = '$newName', email = '$newEmail', phonenumber = '$newPhonenumber' WHERE id = $user_id";

    if (mysqli_query($conn, $updateQuery)) {
        header('location: show.php'); // Chuyển hướng sau khi cập nhật
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin người dùng</title>

    <!-- custom css file link -->
    <link rel="stylesheet" type="text/css" href="css/edit_profile.css">
</head>

<body>

    <div class="form-container">
        <h3>Chỉnh sửa thông tin người dùng</h3>
        <?php
        if (isset($error)) {
            echo '<span class="error-msg">' . $error . '</span>';
        }
        ?>
        <form action="" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn lưu không?');">
            <input type="text" name="name" required placeholder="Họ và tên" value="<?php echo $user_name; ?>">
            <input type="email" name="email" required placeholder="Email" value="<?php echo $user_email; ?>">
            <input type="text" name="phonenumber" required placeholder="Số điện thoại" value="<?php echo $user_phonenumber; ?>">
            <input type="submit" name="submit" value="Lưu" class="form-btn">
        </form>
        <a href="javascript:history.go(-1);" class="back-btn">Hủy Bỏ</a>
    </div>

    <script>
        <?php
        if (isset($error)) {
            echo "alert('Lỗi: Không thể cập nhật thông tin.');";
        } else if (isset($_POST['submit'])) {
            echo "alert('Đã lưu thành công.');";
        }
        ?>
    </script>

</body>

</html>
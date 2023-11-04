<?php
@include '../config.php';

// Kiểm tra xem người dùng đã đăng nhập chưa
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('location:login_form.php');
    exit();
}

// Kết nối cơ sở dữ liệu
$conn  = mysqli_connect(
    'localhost',
    'root',
    '',
    'user_db'
);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Xử lý form khi người dùng lưu thay đổi
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_type = $_POST['user_type'];
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);

    // Tạo câu lệnh SQL cập nhật thông tin
    $updateQuery = "UPDATE user_form SET name='$name', email='$email', user_type='$user_type', phonenumber ='$phonenumber' WHERE id=$id";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Cập nhật thành công";
    } else {
        echo "Lỗi cập nhật: " . mysqli_error($conn);
    }
}

// Lấy thông tin người dùng cần chỉnh sửa
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn thông tin người dùng
    $selectQuery = "SELECT * FROM user_form WHERE id=$id";
    $result = mysqli_query($conn, $selectQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa tài khoản</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="../KTX/css/edit.css">
</head>

<body>
    <?php include 'navbar/adminnavbar.php'; ?>

    <div class="manage-container">
        <a href="javascript:history.go(-1);" class="form-btn">Back</a>
        <div class="manage">
            <h3>Chỉnh sửa thông tin tài khoản</h3>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Tên:</label>
                <input type="text" name="name" required value="<?php echo $row['name']; ?>">
                <label for="email">Email:</label>
                <input type="email" name="email" required value="<?php echo $row['email']; ?>">
                <label for="name">Số điện thoại:</label>
                <input type="phonenumber" name="phonenumber" required value="<?php echo $row['phonenumber']; ?>">
                <label for="user_type">Loại tài khoản:</label>
                <select name="user_type">
                    <option value="admin" <?php echo ($row['user_type'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="user" <?php echo ($row['user_type'] == 'user') ? 'selected' : ''; ?>>User</option>
                </select>
                <input type="submit" name="submit" value="Lưu thay đổi" class="form-btn">
            </form>
        </div>
    </div>
</body>

</html>
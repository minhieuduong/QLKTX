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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin người dùng</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/show.css">
</head>

<body>

    <div class="form-container">
        <h3>Thông tin người dùng</h3>
        <?php
        echo '<table>';
        echo '<tr>';
        echo '<th>Họ và tên</th>';
        echo '<th>Email</th>';
        echo '<th>Số điện thoại</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>' . $user_name . '</td>';
        echo '<td>' . $user_email . '</td>';
        echo '<td>' . $user_phonenumber . '</td>';
        echo '</tr>';
        echo '</table>';
        ?>
        <a href="../KTX/edit_profile.php" class="edit-btn">Sửa Thông Tin</a>
        <a href="user_page.php" class="back-btn">Hủy bỏ</a>
    </div>

</body>

</html>
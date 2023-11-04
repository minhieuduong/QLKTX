<?php
@include '../config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location: login_form.php');
    exit();
}

// Xử lý dữ liệu khi biểu mẫu được gửi
if (isset($_POST['submit'])) {
    $room_number = mysqli_real_escape_string($conn, $_POST['room_number']);
    $room_type = mysqli_real_escape_string($conn, $_POST['room_type']);
    $room_capacity = mysqli_real_escape_string($conn, $_POST['room_capacity']);
    $room_description = mysqli_real_escape_string($conn, $_POST['room_description']);

    // Thêm thông tin phòng vào cơ sở dữ liệu
    $insertQuery = "INSERT INTO room_form (room_number, room_type, room_capacity, room_description) VALUES ('$room_number', '$room_type', '$room_capacity', '$room_description')";
    if (mysqli_query($conn, $insertQuery)) {
        $successMessage = "Thông tin phòng đã được thêm thành công.";
    } else {
        $errorMessage = "Lỗi: Không thể thêm thông tin phòng.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thông tin phòng</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../KTX/css/room.css">
</head>

<body>
    <?php include '../../KTX/navbar/adminnavbar.php'; ?>
    <div class="dashboard-container">
        <h3>THÊM THÔNG TIN PHÒNG</h3>
        <br>
        <?php
        if (isset($errorMessage)) {
            echo '<div class="error-msg">' . $errorMessage . '</div>';
        }
        if (isset($successMessage)) {
            echo '<div class="success-msg">' . $successMessage . '</div>';
        }
        ?>
        <form action="" method="post">
            <input type="text" name="room_number" required placeholder="Số phòng">
            <input type="text" name="room_type" required placeholder="Loại phòng">
            <input type="number" name="room_capacity" required placeholder="Sức chứa">
            <textarea name="room_description" required placeholder="Mô tả phòng"></textarea>
            <input type="submit" name="submit" value="Thêm phòng" class="form-btn">
        </form>
    </div>
</body>

</html>
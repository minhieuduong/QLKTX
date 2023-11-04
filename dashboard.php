<?php
@include 'config.php';

// Truy vấn để lấy số lượng người dùng từ cơ sở dữ liệu
$selectUserQuery = "SELECT COUNT(id) as userCount FROM user_form";
$resultUser = mysqli_query($conn, $selectUserQuery);

if (!$resultUser) {
    die("Lỗi truy vấn người dùng: " . mysqli_error($conn));
}

if (mysqli_num_rows($resultUser) > 0) {
    $rowUser = mysqli_fetch_assoc($resultUser);
    $userCount = $rowUser['userCount'];
} else {
    $userCount = 0;
}

$selectRoomQuery = "SELECT COUNT(room_number) as roomCount FROM room_form";
$resultRoom = mysqli_query($conn, $selectRoomQuery);

if (!$resultRoom) {
    die("Lỗi truy vấn phòng: " . mysqli_error($conn));
}

if (mysqli_num_rows($resultRoom) > 0) {
    $rowRoom = mysqli_fetch_assoc($resultRoom);
    $roomCount = $rowRoom['roomCount'];
} else {
    $roomCount = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="dashboard-container">
        <div class="user-dashboard">
            <h3>NGƯỜI DÙNG</h3>
            <p>Số lượng người dùng đã đăng ký: <?php echo $userCount; ?></p>
            <a href="AccountManagement/AccountManagement.php" class="dashboard-link">Quản lý tài khoản</a>
        </div>

        <div class="room-dashboard">
            <h3>SỐ PHÒNG CÓ SẴN</h3>
            <p>Số phòng: <?php echo $roomCount; ?></p>
            <a href="RoomManagement/RoomManagement.php" class="dashboard-link">Quản lý phòng</a>
        </div>
    </div>

</body>

</html>
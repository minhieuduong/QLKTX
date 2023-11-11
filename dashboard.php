<?php
@include 'config.php';

// Truy vấn để lấy số lượng người dùng từ cơ sở dữ liệu
$selectUserQuery = "SELECT COUNT(id) as userCount FROM user_form";
$resultUser = mysqli_query($conn, $selectUserQuery);


if (mysqli_num_rows($resultUser) > 0) {
    $rowUser = mysqli_fetch_assoc($resultUser);
    $userCount = $rowUser['userCount'];
} else {
    $userCount = 0;
}


// Truy vấn để lấy số lượng phòng có sẵn từ cơ sở dữ liệu
$selectRoomQuery = "SELECT COUNT(room_id) as roomCount FROM room_form";
$resultRoom = mysqli_query($conn, $selectRoomQuery);


if (mysqli_num_rows($resultRoom) > 0) {
    $rowRoom = mysqli_fetch_assoc($resultRoom);
    $roomCount = $rowRoom['roomCount'];
} else {
    $roomCount = 0;
}

// Truy vấn để lấy số lượng phê duyệt từ cơ sở dữ liệu
$selectApproveQuery = "SELECT COUNT(id) as approveCount FROM register";
$resultApprove = mysqli_query($conn, $selectApproveQuery);


if (mysqli_num_rows($resultApprove) > 0) {
    $rowApprove = mysqli_fetch_assoc($resultApprove);
    $approveCount = $rowApprove['approveCount'];
} else {
    $approveCount = 0;
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
    <style>
        .approve-dashboard {
    border-radius: 8px;
    width: 350px;
    background-color: greenyellow;
    padding: 20px;
    border: 1px solid #ddd;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 1);
    margin-left: 10px;
}
    </style>
</head>

<body>

    <div class="dashboard-container">
        <div class="user-dashboard">
            <h3>NGƯỜI DÙNG</h3>
            <p>Số lượng người dùng đã đăng ký: <?php echo $userCount; ?></p>
            <a href="AccountManagement/AccountManagement.php" class="dashboard-link">Quản lý tài khoản</a>
        </div>

    <div class="approve-dashboard">
            <h3>ĐƠN DUYỆT</h3>
            <p>Có <?php echo $approveCount; ?> đơn duyệt</p>
            <a href="room_details/list_room.php" class="dashboard-link">Quản lý phòng</a>
        </div>

        <div class="room-dashboard">
            <h3>SỐ PHÒNG CÓ SẴN</h3>
            <p>Số phòng: <?php echo $roomCount; ?></p>
            <a href="room_details/list_room.php" class="dashboard-link">Quản lý phòng</a>
        </div>
        </div>

</body>

</html>
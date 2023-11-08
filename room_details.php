<?php
@include '../config.php';

if (isset($_GET['room_id'])) {
    $room_id = mysqli_real_escape_string($conn, $_GET['room_id']);
    
    // Truy vấn để lấy thông tin phòng dựa trên room_id
    $selectQuery = "SELECT * FROM room_form WHERE room_id = '$room_id'";
    $result = mysqli_query($conn, $selectQuery);
    $roomData = mysqli_fetch_assoc($result);
} else {
    // Xử lý trường hợp không có room_id
    echo "ID phòng không hợp lệ.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết phòng</title>

    <link rel="stylesheet" href="../css/room.css";>
    <style>
        /* Điều chỉnh chiều rộng của container */
        .room-container {
            width: 1000px;
            margin: 0 auto; /* Canh giữa khung */
        }
    </style>
</head>

<body>
    <?php include '../../KTX/navbar/adminnavbar.php'; ?>
    <div class="dashboard-container">
        <h3>Danh sách phòng</h3>
        <br>
        <a href="add_room.php">Thêm phòng</a>
        <div class="room-container"> <!-- Thêm container cho mỗi phòng -->
            <div class="room-details">
                <p><strong>Mã phòng:</strong> <?php echo $roomData['room_number']; ?></p>
                <p><strong>Loại phòng:</strong> <?php echo $roomData['room_type']; ?></p>
                <p><strong>Sức chứa:</strong> <?php echo $roomData['room_capacity']; ?></p>
                <p><strong>Mô tả phòng:</strong> <?php echo $roomData['room_description']; ?></p>
            </div>
            <br>
            <form action="" method="post">
                <input type="submit" name="register" value="Đăng ký chọn phòng" class="form-btn">
            </form>
        </div>
    </div>
</body>

</html>

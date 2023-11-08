<?php
@include 'config.php';
session_start();

if (!isset($_GET['room_id'])) {
    echo "cac";
    exit();
}

$room_id = mysqli_real_escape_string($conn, $_GET['room_id']);

// Truy vấn để lấy thông tin phòng dựa trên room_id
$Query = "SELECT * FROM room_form WHERE room_id = '$room_id'";
$result = mysqli_query($conn, $Query);

if (!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    $room = mysqli_fetch_assoc($result);
} else {
    // Nếu không tìm thấy phòng, bạn có thể chuyển hướng hoặc hiển thị thông báo lỗi
    die("Không tìm thấy thông tin phòng.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết phòng</title>
    <!-- custom css file link -->
    <link rel="stylesheet" href="../../KTX/css/room.css">
</head>

<body>
    <?php include '../../KTX/navbar/adminnavbar.php'; ?>
    <div class="dashboard-container">
        <h3>THÔNG TIN PHÒNG</h3>
        <br>
        <div class="room-details">
            <p><strong>Số phòng:</strong> <?php echo $room['room_number']; ?></p>
            <p><strong>Loại phòng:</strong> <?php echo $room['room_type']; ?></p>
            <p><strong>Sức chứa:</strong> <?php echo $room['room_capacity']; ?></p>
            <p><strong>Mô tả phòng:</strong> <?php echo $room['room_description']; ?></p>
        </div>
    </div>
</body>

</html>

<?php
@include '../config.php';
session_start();

$roomData = array();

if (isset($_GET['id'])) {
    $room_id = mysqli_real_escape_string($conn, $_GET['id']);
    $selectQuery = "SELECT * FROM room_form WHERE room_id = '$room_id'";
    $result = mysqli_query($conn, $selectQuery);
    $roomData = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
    $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);
    $room_type = mysqli_real_escape_string($conn, $_POST['room_type']);
    $room_capacity = mysqli_real_escape_string($conn, $_POST['room_capacity']);
    $room_description = mysqli_real_escape_string($conn, $_POST['room_description']);
    $room_price = mysqli_real_escape_string($conn, $_POST['room_price']);
    $room_number = mysqli_real_escape_string($conn, $_POST['room_number']);

    $updateQuery = "UPDATE room_form SET room_type = '$room_type', room_price = '$room_price', room_capacity = '$room_capacity', room_description = '$room_description', room_number = '$room_number' WHERE room_id = '$room_id'";
    if (mysqli_query($conn, $updateQuery)) {
        header('location: list_room.php'); // Thay đổi thành trang danh sách phòng của bạn
        exit();
    } else {
        echo "Lỗi: Không thể cập nhật thông tin phòng.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin phòng</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../KTX/css/room.css">
</head>

<body>
    <?php include '../../KTX/navbar/adminnavbar.php'; ?>
    <div class="dashboard-container">
        <h3>CHỈNH SỬA THÔNG TIN PHÒNG</h3>
        <br>
        <a href="../AccountManagement/AccountManagement.php">Danh sách phòng</a>
        <br>
        <br>
        <form action="" method="post">
            <label for="room_id">Số thứ tự:</label>
            <input type="text" name="room_id" value="<?php echo isset($roomData['room_id']) ? $roomData['room_id'] : ''; ?>" readonly>
            <label for="room_number">Mã phòng:</label>
            <input type="text" name="room_number" value="<?php echo isset($roomData['room_number']) ? $roomData['room_number'] : ''; ?>">
            <label for="room_type">Loại phòng:</label>
            <input type="text" name="room_type" value="<?php echo isset($roomData['room_type']) ? $roomData['room_type'] : ''; ?>">
            <label for="room_capacity">Sức chứa:</label>
            <input type="number" name="room_capacity" value="<?php echo isset($roomData['room_capacity']) ? $roomData['room_capacity'] : ''; ?>">
            <label for="room_price">Giá phòng:</label>
            <input type="text" name="room_price" value="<?php echo isset($roomData['room_price']) ? $roomData['room_price'] : ''; ?>">
            <label for="room_description">Thông tin phòng:</label>
            <textarea name="room_description"><?php echo isset($roomData['room_description']) ? $roomData['room_description'] : ''; ?></textarea>
            <input type="submit" name="submit" value="Cập nhật phòng" class="form-btn">
        </form>
    </div>
</body>

</html>

<?php
@include_once('../config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cập nhật trạng thái sang 1 khi được duyệt
    $sql = "UPDATE register SET status = -1 WHERE room_id = $id";

    if ($conn->query($sql) === TRUE) {
        // Nếu cập nhật thành công, chuyển hướng về trang danh sách phòng chờ duyệt
        header('location: register_list.php');
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
} else {
    echo "Không có ID được cung cấp.";
}

$conn->close();
?>

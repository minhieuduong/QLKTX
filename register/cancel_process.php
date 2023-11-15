<?php
@include '../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location: login_form.php');
    exit();
}

if (isset($_GET['id'])) {
    $user_id = $_SESSION['user_id'];
    $room_id = $_GET['id'];

    // Hủy đăng ký phòng và xóa dữ liệu từ bảng "register"
    // ...

    echo "Hủy đăng ký thành công!";
    header('location: my_order.php'); // Chuyển hướng đến trang danh sách phòng đã đăng ký
} else {
    echo "Lỗi: Dữ liệu không hợp lệ.";
}
?>

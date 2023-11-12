<?php
@include '../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location: login_form.php');
    exit();
}

if (isset($_POST['pay_submit'])) {
    $user_id = $_SESSION['user_id'];
    $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);

    // Kiểm tra và xác nhận thanh toán
    // ...

    // Hiển thị alert message box để xác nhận thanh toán
    echo '<script>';
    echo 'var confirmed = confirm("Bạn có chắc chắn muốn thanh toán không?");';
    echo 'if (confirmed) {';
    echo '   window.location.href = "payment_process.php";'; // Chuyển hướng đến trang xử lý thanh toán nếu được xác nhận
    echo '} else {';
    echo '   window.history.back();'; // Quay lại trang trước nếu bị từ chối
    echo '}';
    echo '</script>';
} else {
    echo "Đơn của bạn đã thanh toán trước hoặc chưa được duyệt!";
    echo '<a href="../my_order.php">Quay lại</a>';
}
?>

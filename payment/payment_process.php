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

    echo '<script>';
    echo 'var confirmed = confirm("Bạn có chắc chắn muốn thanh toán không?");';
    echo 'if (confirmed) {';
    echo '   window.location.href = "payment_process.php";'; 
    echo '} else {';
    echo '   window.history.back();'; 
    echo '}';
    echo '</script>';
} else {
    echo "Đơn của bạn đã thanh toán trước hoặc chưa được duyệt!";
    echo '<a href="../register/my_order.php">Quay lại</a>';
}
?>
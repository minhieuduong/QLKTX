<?php
// pay.php

@include '../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location: login_form.php');
    exit();
}

if (isset($_GET['id'])) {
    $room_id = mysqli_real_escape_string($conn, $_GET['id']);
    $user_id = $_SESSION['user_id'];

    // Kiểm tra xem user có quyền thanh toán cho phòng này hay không
    $query = "SELECT * FROM register WHERE user_id = $user_id AND room_id = $room_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Kiểm tra trạng thái thanh toán
        if ($row['payment_status'] == 0) {
            // Đánh dấu là đã thanh toán trong cơ sở dữ liệu
            $update_query = "UPDATE register SET payment_status = 1 WHERE room_id = $room_id";
            $update_result = mysqli_query($conn, $update_query);

            if ($update_result) {
                echo "Thanh toán thành công!";
                echo '<a href="../my_order.php">Quay lại</a>';
                
            } else {
                echo "Có lỗi xảy ra khi cập nhật trạng thái thanh toán.";
            }
        } else {
            echo "Phòng đã được thanh toán trước đó.";
            echo '<a href="../my_order.php">Quay lại</a>';
        }
    }
}

?>

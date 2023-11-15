<?php
@include '../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location: login_form.php');
    exit();
}

if (isset($_GET['id'])) {
    $room_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Kiểm tra quyền hủy đặt phòng ở đây (bạn có thể thêm các kiểm tra khác)

    // Tưởng tượng rằng có một cột có tên là 'status' trong bảng của bạn để đại diện cho trạng thái của đơn đăng ký
    $update_query = "UPDATE register SET status = -1 WHERE user_id = $user_id AND room_id = $room_id";

    $result = mysqli_query($conn, $update_query);

    if ($result) {
        // Hủy đặt phòng thành công, hiển thị thông báo xác nhận
        echo "<script>
                alert('Đã hủy đặt phòng thành công.');
                window.location.href='../my_order.php';
              </script>";
        exit();
    } else {
        // Không thể hủy đặt phòng
        echo "<script>
                alert('Không thể hủy đặt phòng. Vui lòng thử lại.');
                window.location.href='../my_order.php';
              </script>";
        exit();
    }
} else {
    // Yêu cầu không hợp lệ, chuyển hướng về trang my_order.php
    header('location: ../my_order.php');
    exit();
}
?>

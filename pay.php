<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location: login_form.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $room_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Kiểm tra trạng thái của phòng
    $query = "SELECT * FROM register WHERE user_id = $user_id AND room_id = $room_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row['status'] == 0) {
            echo "Phòng chưa được duyệt, không thể thanh toán.";
        } elseif ($row['status'] == 1) {
            // Hiển thị thông tin phòng và gọi hàm thanh toán
            $room_number = $row['room_number'];
            $room_capacity = $row['room_capacity'];
            $room_price = $row['room_price'];
            $start_time = date("d-m-Y H:i:s", strtotime($row['start_time']));
            $end_time = date("d-m-Y H:i:s", strtotime($row['end_time']));

            echo "<h3>Thanh toán cho phòng $room_number</h3>";
            echo "<p>Sức chứa: $room_capacity</p>";
            echo "<p>Giá phòng: $room_price</p>";
            echo "<p>Ngày bắt đầu: $start_time</p>";
            echo "<p>Ngày kết thúc: $end_time</p>";

            echo '<form action="payment_process.php" method="post">';
            echo '<input type="hidden" name="room_id" value="' . $room_id . '">';
            echo '<input type="submit" name="pay_submit" value="Thanh toán">';
            echo '</form>';
        } elseif ($row['status'] == -1) {
            echo "Phòng đã bị từ chối, không thể thanh toán.";
        } else {
            echo "Trạng thái phòng không xác định.";
        }
    } else {
        echo "Lỗi truy vấn cơ sở dữ liệu.";
    }
} else {
    echo "Không có thông tin phòng để thanh toán.";
}
?>

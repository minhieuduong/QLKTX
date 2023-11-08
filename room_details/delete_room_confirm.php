<?php
@include '../config.php';

if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];

    // Kiểm tra xem người dùng tồn tại trong cơ sở dữ liệu hay không
    $selectQuery = "SELECT * FROM room_form WHERE room_id = $room_id";
    $result = mysqli_query($conn, $selectQuery);

    if (mysqli_num_rows($result) > 0) {
        $deleteQuery = "DELETE FROM room_form WHERE room_id = $room_id";

        if (mysqli_query($conn, $deleteQuery)) {
            echo "Xóa phòng thành công.";

            echo '<script>
                setTimeout(function() {
                    window.location = "list_room.php";
                }, 2000);
            </script>';
        } else {
            echo "Lỗi xóa tài khoản: " . mysqli_error($conn);
        }
    } else {
        echo "Thông tin phòng không tồn tại trong cơ sở dữ liệu.";
    }
} else {
    echo "ID phòng không hợp lệ.";
}

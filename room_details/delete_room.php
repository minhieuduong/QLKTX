<?php
@include '../config.php';

if (isset($_GET['id'])) {
    $room_id = mysqli_real_escape_string($conn, $_GET['id']);

    $selectQuery = "SELECT * FROM room_form WHERE room_id = $room_id";
    $result = mysqli_query($conn, $selectQuery);

    if (mysqli_num_rows($result) > 0) {
        // Hiển thị hộp thoại xác nhận bằng JavaScript
        echo '<script>
            var roomConfirmed = confirm("Bạn có chắc chắn muốn xóa phòng này?");
            if (roomConfirmed) {
                window.location = "delete_room_confirm.php?room_id=' . $room_id . '";
            } else {
                window.location = "list_room.php";
            }
        </script>';
    } else {
        echo "Phòng không tồn tại trong cơ sở dữ liệu.";
    }
} else {
    echo "ID phòng không hợp lệ.";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv of="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <br>
    <a href="list_room.php" class="form-btn">Back to List Room</a>
</body>

</html>
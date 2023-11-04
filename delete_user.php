<?php
@include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Kiểm tra xem người dùng tồn tại trong cơ sở dữ liệu hay không
    $selectQuery = "SELECT * FROM user_form WHERE id = $id";
    $result = mysqli_query($conn, $selectQuery);

    if (mysqli_num_rows($result) > 0) {
        // Hiển thị hộp thoại xác nhận bằng JavaScript
        echo '<script>
            var userConfirmed = confirm("Bạn có chắc chắn muốn xóa tài khoản này?");
            if (userConfirmed) {
                window.location = "delete_user_confirm.php?id=' . $id . '";
            } else {
                window.location = "AccountManagement/AccountManagement.php";
            }
        </script>';
    } else {
        echo "Người dùng không tồn tại trong cơ sở dữ liệu.";
    }
} else {
    echo "ID người dùng không hợp lệ.";
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
    <a href="AccountManagement.php" class="form-btn">Back to Account Management</a>
</body>

</html>
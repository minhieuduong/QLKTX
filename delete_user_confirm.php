<?php
@include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Kiểm tra xem người dùng tồn tại trong cơ sở dữ liệu hay không
    $selectQuery = "SELECT * FROM user_form WHERE id = $id";
    $result = mysqli_query($conn, $selectQuery);

    if (mysqli_num_rows($result) > 0) {
        $deleteQuery = "DELETE FROM user_form WHERE id = $id";

        if (mysqli_query($conn, $deleteQuery)) {
            echo "Xóa tài khoản thành công.";

            echo '<script>
                setTimeout(function() {
                    window.location = "AccountManagement/AccountManagement.php";
                }, 2000);
            </script>';
        } else {
            echo "Lỗi xóa tài khoản: " . mysqli_error($conn);
        }
    } else {
        echo "Người dùng không tồn tại trong cơ sở dữ liệu.";
    }
} else {
    echo "ID người dùng không hợp lệ.";
}

<?php
@include '../config.php';

// Đảm bảo chỉ admin mới được truy cập trang quản lý tài khoản
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('location:login_form.php');
    exit();
}

// Xử lý tìm kiếm
if (isset($_POST['search_submit'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $searchQuery = "SELECT * FROM user_form WHERE 
                    phonenumber LIKE '%$search%' OR 
                    name LIKE '%$search%' OR 
                    email LIKE '%$search'";
    $result = mysqli_query($conn, $searchQuery);
} else {
    // Nếu không có yêu cầu tìm kiếm, lấy tất cả người dùng
    $selectQuery = "SELECT * FROM user_form";
    $result = mysqli_query($conn, $selectQuery);
}

if (!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="../AccountManagement/style.css">
</head>

<body>
    <?php include '../navbar/adminnavbar.php'; ?>

    <div class="manage-container">
        <div class="manage">
            <h3>Danh sách tài khoản</h3>

            <form action="" method="post" id="find">
                <input type="text" name="search" placeholder="Tìm kiếm theo số điện thoại, tên hoặc email">
                <input type="submit" name="search_submit" value="Tìm kiếm">
            </form>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Loại tài khoản</th>
                    <th>Hành động</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phonenumber'] . "</td>";
                    echo "<td>" . $row['user_type'] . "</td>";
                    echo '<td><a href="../edit.php?id=' . $row['id'] . '">Chỉnh sửa</a> | <a href="../delete_user.php?id=' . $row['id'] . '">Xóa</a></td>';
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>
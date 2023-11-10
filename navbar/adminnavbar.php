<?php
@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../KTX/css/admin_navbar.css">

</head>

<body>
    <ul>
        <?php
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
            echo '<li><a href="../../KTX/admin_page.php">Trang Chủ (Admin)</a></li>';
        } else {
            echo '<li><a href="../../KTX/user_page.php>Trang Chủ (User)</a></li>';
        }
        ?>
        <li><a href="">Quản lý người dùng</a>
            <ul class="navbar-dropdown">
                <li><a href="../../KTX/AccountManagement/AccountManagement.php">Danh sách người dùng</a></li>
                <li><a href="../../KTX/register_form.php">Thêm tài khoản mới</a></li>
            </ul>
        </li>
        <li><a href="">Quản lý KTX</a>
            <ul class="navbar-dropdown">
                <li><a href="../../KTX/room_details/list_room.php">Danh sách Phòng</a></li>
                <li><a href="../../KTX/room_details/add_room.php">Thêm Phòng</a></li>
            </ul>
        <li><a href="../KTX/register/register_list.php" id="test">Phê duyệt</a>
        <li><a href="javascript:void(0)"><?php echo $_SESSION['admin_name']; ?></a>
            <ul class="user-menu">
                <li><a href="../../KTX/admin_edit_profile.php">Thông tin tài khoản</a></li>
                <li><a href="../../KTX/logout.php">Đăng xuất</a></li>
            </ul>
        </li>
    </ul>
</body>

</html>
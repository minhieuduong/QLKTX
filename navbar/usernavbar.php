<?php
@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../KTX/css/user_navbar.css">

</head>

<body>
    <ul>
        <?php
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
            echo '<li><a href="admin_page.php">Trang Chủ (Admin)</a></li>';
        } else {
            echo '<li><a href="../user_page.php">Trang Chủ (User)</a></li>';
        }
        ?>
        <li><a href="../../KTX/register/room_details.php" id="test">Đăng ở Ký túc xá</a>
        <li><a href="javascript:void(0)"><?php echo $_SESSION['user_name']; ?></a>
            <ul class="user-menu">
                <li><a href="../../KTX/show.php">View User</a></li>
                <li><a href="../../KTX/logout.php">Đăng xuất</a></li>
            </ul>
        </li>
    </ul>
</body>

</html>
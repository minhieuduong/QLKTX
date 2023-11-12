<?php
@include '../config.php';
session_start();

if (isset($_POST['search_submit'])) {
    $search_value = mysqli_real_escape_string($conn, $_POST['search']);
    $query = "SELECT * FROM room_form WHERE room_number LIKE '%$search_value%'";
} else {
    $query = "SELECT * FROM room_form";
}

$sql = "SELECT room_form.*, COUNT(register.user_id) AS registered_users
        FROM room_form
        LEFT JOIN register ON room_form.room_id = register.room_id
        GROUP BY room_form.room_id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết phòng</title>

    <link rel="stylesheet" href="../css/room.css";>
    <style>
        .dashboard-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        #find {
            text-align: right;
        }
        #find input[type="text"] {
            padding: 5px;
            width: 350px;
            margin-right: 10px;
            border: 2px solid black;
            border-radius: 5px;
            font-size: 16px;
            display: inline-block;
            margin-left: auto;
        }

        #find input[type="submit"] {
            padding: 5px;
            width: 100px;
            border-radius: 5px;
            color: #fff;
            background-color: green;
            font-size: 16px;
            display: inline-block;
            margin-left: auto;
            border: 2px solid black;
        }
        h3 {
            font-size: 24px;
        }

    </style>
</head>

<body>
    <?php include '../../KTX/navbar/adminnavbar.php'; ?>
    <div class="dashboard-container">
        <h3>Danh sách phòng</h3>
        <br>

        <form action="" method="post" id="find">
                <input type="text" name="search" placeholder="Tìm kiếm theo mã phòng">
                <input type="submit" name="search_submit" value="Tìm kiếm">
            </form>

        <a href="add_room.php">Thêm phòng</a>
        <table>
  <tr>
    <th>Số thứ tự</th>
    <th>Mã phòng</th>
    <th>Loại phòng</th>
    <th>Sức chứa</th>
    <th>Mô tả phòng</th>
    <th>Số người đăng ký</th>
    <th>Giá phòng</th>
    <th>Chức năng</th>
  </tr>
 <?php
   while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['room_id'] . "</td>";
    echo "<td>" . $row['room_number'] . "</td>";
    echo "<td>" . $row['room_type'] . "</td>";
    echo "<td>" . $row['room_capacity'] . "</td>";
    echo "<td>" . $row['room_description'] . "</td>";
    echo "<td>" . $row['registered_users'] . "</td>";
    echo "<td>" . $row['room_price'] . "</td>";
    echo "<td><a href='edit_room.php?id=" . $row['room_id'] . "'>Chỉnh sửa </a> |
    <a href='delete_room.php?id=" . $row['room_id'] . "'>Xóa</a>
    </td>";
    echo "</tr>";
}
 ?>
 
</table>
    </div>
</body>
</html>

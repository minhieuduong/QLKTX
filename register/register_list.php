<?php
@include '../config.php';
session_start();

$query = "SELECT * FROM register";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết phòng</title>

    <link rel="stylesheet" href="../css/room.css";>
</head>

<body>
    <?php include '../../KTX/navbar/adminnavbar.php'; ?>
    <div class="dashboard-container">
        <h3>Danh sách phòng</h3>
        <br>
        <a href="add_room.php">Thêm phòng</a>
        <table>
  <tr>
    <th>STT</th>
    <th></th>
    <th>Mã phòng</th>
    <th>Loại phòng</th>
    <th>Sức chứa</th>
    <th>Mô tả phòng</th>
    <th>Giá phòng</th>
    <th>Chức năng</th>
  </tr>
 <?php
   while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['room_id'] . "</td>";
    echo "<td>" . $row['user_id'] . "</td>";
    echo "<td>" . $row['full_name'] . "</td>";
    echo "<td>" . $row['student_id'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td><a href='edit_room.php?id=" . $row['room_id'] . "'>Edit</a>
    <a href='delete_room.php?id=" . $row['room_id'] . "'>Delete</a>
    </td>";
    echo "</tr>";
}
 ?>
 
</table>
    </div>
</body>
</html>

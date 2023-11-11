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
        <h3>Danh sách phòng chờ duyệt</h3>
        <br>
        <table>
  <tr>
    <th>STT</th>
    <th>Họ và tên</th>
    <th>Mã sinh viên</th>
    <th>Số điện thoại</th>
    <th>Email</th>
    <th>Mã phòng</th>
    <th>Sức chứa</th>
    <th>Giá phòng</th>
    <th>Bắt đầu</th>
    <th>Kết thúc</th>
    <th>Trạng thái</th>
    <th>Chức năng</th>
  </tr>
 <?php
   while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['full_name'] . "</td>";
    echo "<td>" . $row['student_id'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['room_number'] . "</td>";
    echo "<td>" . $row['room_capacity'] . "</td>";
    echo "<td>" . $row['room_price'] . "</td>";
    echo "<td>" . $row['start_time'] . "</td>";
    echo "<td>" . $row['end_time'] . "</td>";
    echo "<td>";
    if ($row['status'] == 0) {
        echo "Chưa duyệt";
    } elseif ($row['status'] == 1) {
        echo "Đã duyệt";
    } elseif ($row['status'] == -1) {
        echo "Từ chối";
    } else {
        echo "Không xác định";
    }
    echo "</td>";
    echo "<td><a href='accept.php?id=" . $row['room_id'] . "'>Duyệt</a> |
    <a href='deny.php?id=" . $row['room_id'] . "'>Từ chối</a>
    </td>";
    echo "</tr>";
}
 ?>
 
</table>
    </div>
</body>
</html>

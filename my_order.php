<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location: login_form.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM register WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết phòng</title>

    <link rel="stylesheet" href="../KTX/css/my_order.css">
</head>

<body>
<?php include 'navbar/usernavbar.php' ?>;
    <div class="dashboard-container">
        <h3>Danh sách phòng đã đăng ký</h3>
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
                <th>Trạng thái</th>
            </tr>
            <?php
            $stt = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $stt++ . "</td>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['student_id'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['room_number'] . "</td>";
                echo "<td>" . $row['room_capacity'] . "</td>";
                echo "<td>" . $row['room_price'] . "</td>";
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
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>

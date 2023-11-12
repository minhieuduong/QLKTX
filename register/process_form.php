<!-- <link rel="stylesheet" href="../css/process_form.css"> -->
<head>
    <style>
.container-form {
    width: 1200px;
    margin-top: 100px;
}

h1 {
    margin-top: -50px;
    text-align: center;
    margin-bottom: 50px;
}

body {
    font-family: Arial, sans-serif;
}

form {
    max-width: 400px;
    margin: 0 auto;
}

input[type="text"],
input[type="tel"],
input[type="email"],
input[type="date"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    width: 400px;
    background-color: #007BFF;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

.back-btn {
    display: block;
    text-align: center;
    background-color: #007BFF;
    color: #fff;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 4px;
    margin-top: 10px;
}
    </style>
</head>
<?php
@include_once("../config.php");
session_start();

include '../navbar/usernavbar.php';

if (!isset($_SESSION['user_id'])) {
    header('location: login_form.php');
    exit();
}

if (isset($_POST['room_id'])) {
    $id_user = $_SESSION['user_id'];
    $id_phong = $_POST['room_id'];


    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Truy vấn để lấy thông tin phòng từ bảng "room_form"
    $sql_room = "SELECT room_number, room_capacity, room_price FROM room_form WHERE room_id = '$id_phong'";
    $result_room = $conn->query($sql_room);
    $row_room = $result_room->fetch_assoc();

    // Kiểm tra nếu có thông tin phòng
    if ($result_room->num_rows > 0) {
        $room_number = $row_room['room_number'];
        $room_capacity = $row_room['room_capacity'];
        $room_price = $row_room['room_price'];
    }

    if (isset($_POST['submit'])) {
        // Lấy dữ liệu từ forms
        $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $room_price = mysqli_real_escape_string($conn, $_POST['room_price']);
        $room_number = mysqli_real_escape_string($conn, $_POST['room_number']);
        $room_capacity = mysqli_real_escape_string($conn, $_POST['room_capacity']);
        $start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
        $end_time = mysqli_real_escape_string($conn, $_POST['end_time']);

    
        $sql = "INSERT INTO register (user_id, room_id, full_name, student_id, phone, email, room_price, room_number, room_capacity, start_time, end_time) 
                VALUES ('$id_user', '$id_phong', '$full_name', '$student_id', '$phone', '$email','$room_price','$room_number','$room_capacity','$start_time', '$end_time')";
        die($sql);
        if ($conn->query($sql) === TRUE) {
            echo "Đăng ký thành công!";
            header('location: user_page.php');
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    } else {
        echo '<div class = "container-form"></div>';
        echo '<h1>Điền thông tin để xác nhận đăng ký KTX</h1>';
        echo '<form method="post" action="confirm.php">';
        echo '<input type="hidden" name="room_id" value="' . $id_phong . '">';
        echo 'Họ và tên: <input type="text" name="full_name" required><br>';
        echo 'Mã sinh viên: <input type="text" name="student_id" required><br>';
        echo 'Số điện thoại: <input type="tel" name="phone" required><br>';
        echo 'Email: <input type="email" name="email" required><br>';
        echo 'Số phòng: <input type="text" name="room_number" value="' . $room_number . '" readonly><br>';
        echo 'Sức chứa: <input type="text" name="room_capacity" value="' . $room_capacity . '" readonly><br>'; 
        echo 'Giá phòng: <input type="text" name="room_price" value="' . $room_price . '" readonly><br>';
        echo 'Thời gian bắt đầu: <input type="date" name="start_time" required><br>';
        echo 'Thời gian kết thúc: <input type="date" name="end_time" required><br>';
        echo '<input type="submit" name="submit" value="Xác nhận">';
        echo '<a href ="room_details.php" class="back-btn">Chọn phòng khác</a>';
        echo '</form>';
        echo '</div>';
        

    }
}
?>

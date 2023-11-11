<?php
@include_once("../config.php");
session_start();

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

    if (isset($_POST['full_name'], $_POST['student_id'], $_POST['phone'], $_POST['email'])) {
        // Lấy dữ liệu từ form
        $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
        $end_time = mysqli_real_escape_string($conn, $_POST['end_time']);
        

        // Thực hiện truy vấn để chèn dữ liệu vào bảng `register`
        $sql = "INSERT INTO register (user_id, room_id, full_name, student_id, phone, email, room_price, room_number, room_capacity, start_time, end_time) 
                VALUES ('$id_user', '$id_phong', '$full_name', '$student_id', '$phone', '$email', '$room_price', '$room_number','$room_capacity','$start_time', '$end_time')";

        if ($conn->query($sql) === TRUE) {
            // Ví dụ: chuyển hướng hoặc hiển thị thông báo
            echo "Đăng ký thành công!";
            echo "Hãy chờ nhà quản trị duyệt đơn của bạn";
            echo '<a href="../user_page.php">Quay laỊ</a>';
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Dữ liệu không hợp lệ, có thể hiển thị thông báo lỗi
        echo "Dữ liệu không hợp lệ.";
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
}

?>

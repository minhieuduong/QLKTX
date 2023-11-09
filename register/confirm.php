<?php
@include_once("config.php");
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

    if (isset($_POST['full_name'], $_POST['student_id'], $_POST['phone'], $_POST['email'])) {
        // Lấy dữ liệu từ form
        $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // Thực hiện truy vấn để chèn dữ liệu vào bảng `register`
        $sql = "INSERT INTO register (user_id, room_id, full_name, student_id, phone, email) 
                VALUES ('$id_user', '$id_phong', '$full_name', '$student_id', '$phone', '$email')";

        if ($conn->query($sql) === TRUE) {
            // Ví dụ: chuyển hướng hoặc hiển thị thông báo
            echo "Đăng ký thành công!";
            echo "Hãy chờ nhà quản trị duyệt đơn của bạn";
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

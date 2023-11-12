<?php
@include 'config.php';

session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('location:login_form.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $selectQuery = "SELECT * FROM user_form WHERE id=$id";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // Xử lý khi không tìm thấy thông tin người dùng
        echo "Không tìm thấy thông tin người dùng.";
        exit();
    }
} else {
    echo "Không có ID được cung cấp.";
    exit();
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_type = $_POST['user_type'];
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($password)) {
        $password = md5($password);
    }

    $updateQuery = "UPDATE user_form SET name='$name',";

    if (!empty($password)) {
        $updateQuery .= " password='$password',";
    }

    $updateQuery .= " email='$email', user_type='$user_type', phonenumber ='$phonenumber' WHERE id=$id";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Cập nhật thành công";
    } else {
        echo "Lỗi cập nhật: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin tài khoản</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.manage-container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.form-btn {
    display: inline-block;
    padding: 8px 16px;
    background-color: #2ecc71;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.form-btn:hover {
    background-color: green;
}


.manage h3 {
    font-size: 24px;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
}

input,
select {
    margin-bottom: 16px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: black;
    color: #fff;
    cursor: pointer;
}
.back-btn {
    text-align: center;
}
</style>
</head>

<body>
    <?php include 'navbar/adminnavbar.php'; ?>

    <div class="manage-container">
        <div class="manage">
            <h3>Chỉnh sửa thông tin tài khoản</h3>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Tên:</label>
                <input type="text" name="name" required value="<?php echo $row['name']; ?>">
                <label for="email">Email:</label>
                <input type="email" name="email" required value="<?php echo $row['email']; ?>">
                <label for="phonenumber">Số điện thoại:</label>
                <input type="text" name="phonenumber" required value="<?php echo $row['phonenumber']; ?>">
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" required value="">
                <label for="user_type">Loại tài khoản:</label>
                <select name="user_type">
                    <option value="admin" <?php echo ($row['user_type'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="user" <?php echo ($row['user_type'] == 'user') ? 'selected' : ''; ?>>User</option>
                </select>
                <input type="submit" name="submit" value="Lưu thay đổi" class="form-btn">
                <a href="javascript:history.go(-1);" class="back-btn">Back</a>
            </form>
        </div>
    </div>
</body>

</html>

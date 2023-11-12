<?php
@include '../config.php';
session_start();

// Truy vấn lấy thông tin từ cả hai bảng
$query = "SELECT room_form.*, COUNT(register.user_id) AS registered_users
          FROM room_form
          LEFT JOIN register ON room_form.room_id = register.room_id
          GROUP BY room_form.room_id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin phòng</title>
    <style>
    *{
    padding: 0;
    box-sizing: border-box;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: black;
    margin: 0;
}

html {
    font-size: 62.5%;
}

main {
    max-width: 1500px;
    width: 95%;
    margin: 30px auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

h1 {
    font-size: 30px;
    text-align: center;
    margin-top: 20px;
    color: crimson;
}


main .card {
    max-width: 300px;
    flex: 1 1 210px;
    text-align: center;
    height: 460px;
    border: 1px solid black;
    border-radius: 10px;
    margin: 20px;
}

main .card .image {
    height: 50%;
    margin-bottom: 20px;
}

main .card .image img {
    border-radius: 10px 10px 0px 0px;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

main .card .caption{
    padding-left: 1em;
    text-align: left;
    line-height: 3em;
    height: 25%;
}

main .card .caption p {
    font-size: 1.5em;
}


main .card button {
    margin-left: 24px;
    border-radius: 10px;
    border: 2px solid black;
    padding:  1em;
    width: 80%;
    cursor: pointer;
    margin-top: 35px;
    font-weight: bold;
    position: relative;
}

main .card button:hover {
    color: white;
    background-color: green;
}



</style>
</head>

<body>
    <?php include '../navbar/usernavbar.php'; ?>
    <h1>THÔNG TIN CÁC PHÒNG CÓ TRONG KÝ TÚC XÁ</h1>
    <main>
        <?php
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $room_type = $row["room_type"];
            $room_capacity = $row["room_capacity"];
            $room_description = $row["room_description"];
            $room_price = $row["room_price"];
            $registered_users = $row["registered_users"];
        
            echo '<div class="card">';
            echo '<div class="image">';
            echo '<img src="../images/16beds.jpg" alt="">';
            echo '</div>';
            echo '<div class="caption">';
            echo '<p class="room_type">Loại phòng: ' . $room_type . '</p>';
            echo '<p class="room_capacity">Sức chứa: ' . $room_capacity . '</p>';
            echo '<p class="room_description">Mô tả: ' . $room_description . '</p>';
            echo '<p class="registered_users">Đã đăng ký: ' . $registered_users . ' người</p>';
            echo '<p class="room_price"><b>Price: ' . $room_price . '</b></p>';
        
            // Thêm form vào thẻ card
            echo '<form method="post" action="process_form.php">';
            echo '<input type="hidden" name="room_id" value="' . $row["room_id"] . '">';
            echo '<button type="submit" class="add">Đăng ký</button>';
            echo '</form>';
            
            echo '</div>';
            echo '</div>';
        }
        ?>
    </main>
</body>

</html>

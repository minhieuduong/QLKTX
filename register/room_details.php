
<?php
@include '../config.php';
session_start();
$query = "SELECT * FROM room_form";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/details.css">
</head>

<body>
<?php include '../navbar/usernavbar.php' ?>;
<h1>THÔNG TIN CÁC PHÒNG CÓ TRONG KÝ TÚC XÁ</h1>
    <main>
        <?php
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $room_type = $row["room_type"];
            $room_capacity = $row["room_capacity"];
            $room_description = $row["room_description"];
            $room_price = $row["room_price"];
        
            echo '<div class="card">';
            echo '<div class="image">';
            echo '<img src="../images/16beds.jpg" alt="">';
            echo '</div>';
            echo '<div class="caption">';
            echo '<p class="room_type">Loại phòng: ' . $room_type . '</p>';
            echo '<p class="room_capacity">Sức chứa: ' . $room_capacity . '</p>';
            echo '<p class="room_description">Mô tả: ' . $room_description . '</p>';
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

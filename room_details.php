<?php
@include '../KTX/config.php';
session_start();

$room_type = '4 Giường';
$room_capacity = '4';
$room_price = '300.000đ';
$room_description = 'Phòng cho 4 người ở';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../KTX/css/details.css">
</head>
<body>
<?php include 'navbar/usernavbar.php'; ?>
<h1>THÔNG TIN CÁC PHÒNG CÓ TRONG KÝ TÚC XÁ</h1>

    <main>
        <div class="card">
            <div class="image">
                <img src="images/2beds.jpg" alt="">
            </div>
            <div class ="caption">
                <p class="room_type">Loại phòng: <?php echo $room_type; ?></p>
                <p class="room_capacity">Sức chứa: <?php echo $room_capacity; ?></p>
                <p class="room_description">Mô tả: <?php echo $room_description; ?></p>
                <p class="room_price"><b>Price: <?php echo $room_price; ?></b></p>

            </div>
            <button class="add">Đăng ký</button>
        </div>
        <div class="card">
            <div class="image">
                <img src="images/4beds.jpg" alt="">
            </div>
            <div class ="caption">
                <p class="room_type">Loại phòng: <?php echo $room_type; ?></p>
                <p class="room_capacity">Sức chứa: <?php echo $room_capacity; ?></p>
                <p class="room_description">Mô tả: <?php echo $room_description; ?></p>
                <p class="room_price"><b>Price: <?php echo $room_price; ?></b></p>


            </div>
            <button class="add">Đăng ký</button>
        </div>
        <div class="card">
            <div class="image">
                <img src="images/8beds.jpg" alt="">
            </div>
            <div class ="caption">
                <p class="room_type">Loại phòng: <?php echo $room_type; ?></p>
                <p class="room_capacity">Sức chứa: <?php echo $room_capacity; ?></p>
                <p class="room_description">Mô tả: <?php echo $room_description; ?></p>
                <p class="room_price"><b>Price: <?php echo $room_price; ?></b></p>


            </div>
            <button class="add">Đăng ký</button>
        </div>
        <div class="card">
            <div class="image">
                <img src="images/16beds.jpg" alt="">
            </div>
            <div class ="caption">
                <p class="room_type">Loại phòng: <?php echo $room_type; ?></p>
                <p class="room_capacity">Sức chứa: <?php echo $room_capacity; ?></p>
                <p class="room_description">Mô tả: <?php echo $room_description; ?></p>
                <p class="room_price"><b>Price: <?php echo $room_price; ?></b></p>


            </div>
            <button class="add">Đăng ký</button>
        </div>
        <div class="card">
            <div class="image">
                <img src="images/24beds.jpg" alt="">
            </div>
            <div class ="caption">
                <p class="room_type">Loại phòng: <?php echo $room_type; ?></p>
                <p class="room_capacity">Sức chứa: <?php echo $room_capacity; ?></p>
                <p class="room_description">Mô tả: <?php echo $room_description; ?></p>
                <p class="room_price"><b>Price: <?php echo $room_price; ?></b></p>
            </div>
            <button class="add">Đăng ký</button>
        </div>
    </main>
</body>
<?php include '../KTX/footer.php'; ?>
</html>

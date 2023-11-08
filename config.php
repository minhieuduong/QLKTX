<?php

$conn  = mysqli_connect(
    'localhost',
    'root',
    '',
    'user_db'
);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

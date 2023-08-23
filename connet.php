<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$namedata = 'db_fashion_mylishop';

// Tạo kết nối
$conn = mysqli_connect($host, $user, $pass, $namedata);

// Kiểm tra kết nối và thiết lập bộ mã ký tự UTF-8
if (!$conn) {
    die("Error connecting to " . mysqli_connect_error());
}
mysqli_set_charset($conn, 'UTF8');
?>

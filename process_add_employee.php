<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "nhanvien"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy thông tin từ form
$name = $_POST['name'];
// Lấy các thông tin khác từ form

// Thực hiện truy vấn thêm nhân viên vào CSDL

// Chuyển hướng người dùng đến trang sau khi thêm thành công
?>

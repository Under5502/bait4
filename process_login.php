<?php
session_start();
// Kết nối CSDL
$servername = "localhost";
$username = "under5502";
$password = "vuvip2002";
$dbname = "user";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy thông tin đăng nhập từ form
$username = $_POST['under5502'];
$password = $_POST['vuvip2002'];

// Truy vấn CSDL để kiểm tra thông tin đăng nhập
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Đăng nhập thành công
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];

    if ($_SESSION['role'] == 'admin') {
        // Đăng nhập thành công và có vai trò admin
        header("Location: admin_panel.php");
    } else {
        // Đăng nhập thành công nhưng không có vai trò admin
        header("Location: user_panel.php");
    }
} else {
    // Đăng nhập thất bại
    echo "Tên người dùng hoặc mật khẩu không chính xác!";
}

$conn->close();
?>

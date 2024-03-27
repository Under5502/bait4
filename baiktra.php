<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "nhanvien"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Thiết lập số bản ghi trên mỗi trang và trang hiện tại
$itemsPerPage = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Truy vấn dữ liệu từ bảng nhanvien
$sql = "SELECT * FROM nhanvien LIMIT $offset, $itemsPerPage";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <link rel="stylesheet" href="styles.css"> <!-- Định dạng CSS cho bảng -->
</head>
<body>
    <h2>THÔNG TIN NHÂN VIÊN</h2>
    <table border="1">
        <tr>
            <th>Mã Nhân Viên</th>
            <th>Tên Nhân Viên</th>
            <th>Giới tính</th>
            <th>Nơi Sinh</th>
            <th>Mã Phòng</th>
            <th>Lương</th>
           \
        </tr>
        <?php
        
        // Hiển thị dữ liệu từ CSDL
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["MA_NV"]."</td>";
                echo "<td>".$row["TEN_NV"]."</td>";
                echo "<td><img src= '".($row["Phai"] == 'Nữ' ? 'nu.png' : 'nam.png')."' alt='".$row["Phai"]."'></td> ";
                
                echo "<td>".$row["Noi_Sinh"]."</td>";
                echo "<td>".$row["Ma_Phong"]."</td>";
                echo "<td>".$row["Luong"]."</td>";      
             
        
                echo "</tr>";
                
               
            }
        } else {
            echo "<tr><td colspan='6'>Không có nhân viên nào.</td></tr>";
        }
        ?>
    </table>

  <!-- Giao diện của bạn -->
<button onclick="location.href='add_employee.php'">Thêm Nhân Viên</button>
<button onclick="location.href='edit_employee.php'">Sửa Nhân Viên</button>
<button onclick="location.href='delete_employee.php'">Xoá Nhân Viên</button>


<!-- Phân trang -->
<div class="pagination">
        <?php
        // Tính tổng số trang
        $sql = "SELECT COUNT(*) AS total FROM nhanvien";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totalPages = ceil($row["total"] / $itemsPerPage);

        // Hiển thị các nút phân trang
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?page=".$i."'";
            if ($i == $page) echo " class='active'";
            echo ">".$i."</a>";
        }

        
        ?>
    </div>

</body>

</html>

<?php
// Đóng kết nối CSDL
$conn->close();
?>


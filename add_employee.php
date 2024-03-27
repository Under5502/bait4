<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân viên</title>
</head>
<body>
    <h2>Thêm Nhân viên</h2>
    <form action="process_add_employee.php" method="POST">
        <label for="name">Tên Nhân viên:</label>
        <input type="text" id="name" name="name" required><br><br>
        <!-- Thêm các trường thông tin khác của nhân viên -->
        <button type="submit">Thêm Nhân viên</button>
    </form>
</body>
</html>

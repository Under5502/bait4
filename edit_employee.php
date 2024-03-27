<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Nhân viên</title>
</head>
<body>
    <h2>Sửa Nhân viên</h2>
    <form action="process_edit_employee.php" method="POST">
        <label for="name">Tên Nhân viên:</label>
        <input type="text" id="name" name="name" value="<?php echo $employee_name; ?>" required><br><br>
        <!-- Hiển thị các trường thông tin khác của nhân viên và cho phép chỉnh sửa -->
        <button type="submit">Lưu Thay đổi</button>
    </form>
</body>
</html>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
// Kết nối cơ sở dữ liệu
$cnn = mysqli_connect("localhost", "root", "", "genix");
if (!$cnn) {
    die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
}

// Kiểm tra nếu form được gửi đi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $username = mysqli_real_escape_string($cnn, $_POST['txt_username']);
    $password = mysqli_real_escape_string($cnn, $_POST['txt_password']);

    // Kiểm tra dữ liệu đầu vào
    if (empty($username) || empty($password)) {
        echo "Tên đăng nhập hoặc mật khẩu không được để trống!";
        exit();
    }

    // Truy vấn kiểm tra tài khoản trong bảng users
    $sql_user = "INSERT INTO `user`(`id_user`, `username`, `password`, `email`, `phone`) VALUES ('12','','[value-3]','[value-4]','[value-5]')"";
    $result = mysqli_query($cnn, $sql_user);

    if (!$result) {
        die("Lỗi truy vấn: " . mysqli_error($cnn));
    }

    // Xử lý kết quả
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "Đăng nhập thành công! Xin chào, " . $row['username'];
    } else {
        echo "Tên đăng nhập, email, số điện thoại hoặc mật khẩu không đúng!";
    }
}
?>

<!-- Form đăng nhập -->
<h2>Đăng nhập</h2>
<form name="frm_login" method="post" action="login.act.php">
    <label for="txt_username">Tên/Số điện thoại/Email:</label>
    <input type="text" id="txt_username" name="txt_username" required><br><br>

    <label for="txt_password">Mật khẩu:</label>
    <input type="password" id="txt_password" name="txt_password" required><br><br>

    <button type="submit">Đăng nhập</button>
</form>



</body>
</html>


</body>
</html>
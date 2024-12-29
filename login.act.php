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

// Kiểm tra nếu form đăng nhập được gửi đi
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
    $sql_user = "SELECT * FROM `user` WHERE `username` = ? OR `email` = ? OR `phone` = ?";
    $stmt = mysqli_prepare($cnn, $sql_user);
    mysqli_stmt_bind_param($stmt, "sss", $username, $username, $username); // Kiểm tra theo username, email, phone
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Kiểm tra kết quả
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Kiểm tra mật khẩu
        if (password_verify($password, $row['password'])) {
            // Đăng nhập thành công
            echo "Đăng nhập thành công! Xin chào, " . $row['username'];
            // Có thể chuyển hướng tới trang dashboard
            header("Location: index.php"); // Uncomment nếu cần chuyển hướng
            exit();
        } else {
            echo "Mật khẩu không đúng!";
        }
    } else {
        echo "Tên đăng nhập, email hoặc số điện thoại không đúng!";
    }
}
?>
</body>
</html>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
// Kết nối cơ sở dữ liệu
$cnn = mysqli_connect("localhost", "root", "", "genix");
if (!$cnn) {
    die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
}

// Kiểm tra nếu form đăng ký được gửi đi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $username =$_POST['txt_username_register'];
    $email =$_POST['txt_email_register'];
    $phone = $_POST['txt_phone_register'];
    $password =$_POST['txt_password_register'];
    $confirm_password=$_POST['txt_confirm_password_register'];

    // Kiểm tra nếu dữ liệu trống
    if (empty($username) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
        echo "Tất cả các trường đều phải được điền!";
        exit();
    }

    // Kiểm tra mật khẩu và xác nhận mật khẩu
    if ($password !== $confirm_password) {
        echo "Mật khẩu và xác nhận mật khẩu không khớp!";
        exit();
    }

    // Kiểm tra xem tên đăng nhập, email hoặc số điện thoại đã tồn tại chưa
    $sql_check = "SELECT * FROM `user` WHERE `username` = ? OR `email` = ? OR `phone` = ?";
    $stmt_check = mysqli_prepare($cnn, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "sss", $username, $email, $phone);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "Tên đăng nhập, email hoặc số điện thoại đã tồn tại!";
        exit();
    }

    // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Thực hiện insert tài khoản mới vào cơ sở dữ liệu
    $sql_insert = "INSERT INTO `user`(`id_user`, `username`, `password`, `email`, `phone`) VALUES (Null,?,?,?,?)";
    $stmt_insert = mysqli_prepare($cnn, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "ssss", $username, $hashed_password, $email, $phone);
    $result_insert = mysqli_stmt_execute($stmt_insert);

    if ($result_insert) {
        echo "Đăng ký thành công! Vui lòng đăng nhập.";
    } else {
        echo "Đã xảy ra lỗi trong quá trình đăng ký!";
    }
}
?>

</body>
</html>
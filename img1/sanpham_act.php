<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$id_loai=$_REQUEST["id_loaisp"];
	$id_hangsx=$_REQUEST["id_hangsx"];
	$tensp=$_REQUEST["txt_tensp"];
	$gia=$_REQUEST["txt_gia"];
	$thongtin=$_REQUEST["thongtin"];
	//Kết nối đến Server
	$conn=mysqli_connect("localhost","root","") or die("Không tìm thấy máy chủ");
	//Tìm DB
	//mysqli_select_db()
	mysqli_select_db($conn,"74dctd21") or die("Không tìm thấy DB");
	
	
		$uploadDir_img_sp = "img/"; //đg dẫn ảnh

$file_tmp = isset($_FILES['img_sp']['tmp_name']) ? //xử lí ảnh
$_FILES['img_sp']['tmp_name'] : ""; 
$file_name = isset($_FILES['img_sp']['name']) ? $_FILES['img_sp']['name'] : ""; 
$file_type = isset($_FILES['img_sp']['type']) ? $_FILES['img_sp']['type'] : ""; 
$file_size = isset($_FILES['img_sp']['size']) ? $_FILES['img_sp']['size'] : ""; 
$file_error = isset($_FILES['img_sp']['error']) ? $_FILES['img_sp']['error'] : "";
//copy tên ảnh
$dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s"); ///Lay gio cua he thong
$file__name__=$dmyhis.$file_name;
copy ( $file_tmp, $uploadDir_img_sp.$file__name__);	
	
	
	//Tạo câu lệnh truy vấn
	$sql_sanpham="INSERT INTO `sanpham` (`id_sp`, `id_loaisp`, `id_hangsx`, `tensp`, `img_sp`, `gia`, `thongtin`) VALUES ('NULL', '$id_loai', '$id_hangsx', '$tensp', '$file__name__', '$gia', '$thongtin')";
	//Thực hiện truy vấn
	mysqli_query($conn,$sql_sanpham);
	header("Location: sanpham.php");
	?>
</body>
</html>
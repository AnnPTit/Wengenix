<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$id_sanpham=$_REQUEST["id_sanpham"];
	$soluong=$_REQUEST["txt_soluong"];
	$dongia=$_REQUEST["txt_dongia"];
	$cnn=mysqli_connect("localhost","root","") or die("Không tìm thấy máy chủ");//Tạo kết nối với máy chủ
	mysqli_select_db($cnn,"genix")or die("Không tìm thấy CSDL");// Tìm CSDL để làm việc
	$sql_check_sanpham="select * from giohang where id_sanpham = '$id_sanpham'";
	$kq=mysqli_query($cnn,$sql_check_sanpham);	
	if (mysqli_num_rows($kq) > 0) {
  		while($row=mysqli_fetch_object($kq))//duyệt từng bản ghi
				{
					//$stt_loai++;
						//Đưa dữ liệu của từng cột vào mảng
					$id_giohang=$row->id_giohang;	
					$soluong_sql=$row->soluong;	
					$soluong_final =$soluong+$soluong_sql;
					$sql_suagiohang="update giohang set soluong ='$soluong_final' where id_giohang ='$id_giohang'";
					mysqli_query($cnn,$sql_suagiohang);
					header("Location: gio_hang.php");
				}	
	} else {
		$sql_themgiohang="insert into giohang value(null,'$id_sanpham','$soluong','$dongia');";
					mysqli_query($cnn,$sql_themgiohang);
					header("Location: gio_hang.php");
	}
	?>
</body>
</html>
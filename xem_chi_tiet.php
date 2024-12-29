<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chi tiet san pham</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php 
	$id_sanpham=$_REQUEST["id_sanpham"];
	$cnn=mysqli_connect("localhost","root","") or die("Không tìm thấy máy chủ");//Tạo kết nối với máy chủ
	mysqli_select_db($cnn,"genix")or die("Không tìm thấy CSDL");// Tìm CSDL để làm việc
	$sql_sp="Select * from sanpham where id_sanpham=$id_sanpham";
	$kq=mysqli_query($cnn,$sql_sp);
	while($row=mysqli_fetch_object($kq))
{
	$id_sanpham=$row->id_sanpham;
	$ten_sanpham=$row->ten_sanpham;
	$gia=$row->gia;
	$mota=$row->mo_ta;
	$hinh_anh=$row->hinh_anh;
}
	?>
	<div style="display: flex">
            <img style="padding: 30px; width: 600px;height: 650px;" src="<?php echo $hinh_anh?>" alt="Gói Thiết Kế Website Tùy Chỉnh">
            <div class="des" style="padding: 30px">
                <span></span>
                <h5 style="font-size: 50px"><?php echo $ten_sanpham?></h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4 style="font-size: 25px; padding: : 30px"><?php echo $gia?></h4>
				<h6 style="font-style: normal"><?php echo nl2br(htmlspecialchars($mota));?></h6>
				<button style="font-size: 15px; padding: : 60px; background: #18B700">Mua Ngay</button>
            </div>
		</div> 
</body>
</html>
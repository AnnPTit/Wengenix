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
	<form name="frm_themgiohang" method="post" action="them_gio_hang_act.php?id_sanpham=<?php echo $id_sanpham?>">
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
<!--				Dơn giá-->
				<input style="padding: 10px; margin: 20px 0" value="<?php echo $gia?>" name="txt_dongia">
				<h6></h6>
<!--				Thẻ nayf đẻe nhập số lượng-->
				<input style="padding: 10px; margin: 20px 0" type="number" placeholder="Nhập số lượng..." required="true" name="txt_soluong">
				<div style="padding: 10px 0px">
				<button style="background: #18B700; padding: 20px;border: 10px; border-radius: 5px; font-size: 14px; font-weight: 700; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">THÊM VÀO GIỎ HÀNG</button>
					</div>
				<div>
				<button style="background: #18B700; padding: 20px;border: 10px; border-radius: 5px; font-size: 14px; font-weight: 700; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Mua ngay</button>
				</div>
            </div>
		</div> 
</body>
</html>
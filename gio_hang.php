<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
	<?php 
	$cnn=mysqli_connect("localhost","root","") or die("Không tìm thấy máy chủ");//Tạo kết nối với máy chủ
	mysqli_select_db($cnn,"genix")or die("Không tìm thấy CSDL");// Tìm CSDL để làm việc
	// Câu truy vấn để lấy dữ liệu sản phẩm trong bảng san pham
	$sql_giohang="Select sanpham.id_sanpham, sanpham.ten_sanpham,sanpham.gia,sanpham.mo_ta,sanpham.hinh_anh,giohang.soluong,giohang.id_giohang from giohang inner join sanpham on sanpham.id_sanpham = giohang.id_sanpham ";
	$kq=mysqli_query($cnn,$sql_giohang);
	$tongbg=mysqli_num_rows($kq);// Trả về số bản ghi
	//echo $tongbg;
	$stt_giohang=0;
	while($row=mysqli_fetch_object($kq))//duyệt từng bản ghi
{
	$stt_giohang++;
		//Đưa dữ liệu của từng cột vào mảng
	$id_giohang[$stt_giohang]=$row->id_giohang;
	$id_sanpham[$stt_giohang]=$row->id_sanpham;
	$soluong[$stt_giohang]=$row->soluong;
	$ten_sanpham[$stt_giohang]=$row->ten_sanpham;
	$gia[$stt_giohang]=$row->gia;
	$mo_ta[$stt_giohang]=$row->mo_ta;
	$hinh_anh[$stt_giohang]=$row->hinh_anh;
}
	?>
	 <!-- Product -->
   <section id="product1" class="section-p1">
    <h2>GIỎ HÀNG</h2>
    <div class="pro-container">
		
		  <?php for($i=1;$i<=$tongbg;$i++) 
				{
	?>
			<div class="pro">
            <img src="<?php echo $hinh_anh[$i]?>" alt="Gói Thiết Kế Website Tùy Chỉnh">
            <div class="des">
                <span></span>
                <h5><?php echo $ten_sanpham[$i]?></h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>Đơn giá : <?php echo $gia[$i]?></h4>
				<h6>Số lượng : <?php echo $soluong[$i]?></h6>
				<a href="xem_chi_tiet.php?id_sanpham=<?php echo $id_sanpham[$i]?>"></i>Thanh toán</a>
            </div>
		</div>  

			  <?php
}
			  ?>
    </div>
	   <a href="xem_chi_tiet.php?id_sanpham=<?php echo $id_sanpham[$i]?>"></i>Thanh toán</a>
   </section>
</body>
</html>
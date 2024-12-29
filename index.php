<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>WebGenix</title>
    <link rel="stylesheet" href="style.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
<!--	Phan nay ket noi den csdl-->
<?php 
	$cnn=mysqli_connect("localhost","root","") or die("Không tìm thấy máy chủ");//Tạo kết nối với máy chủ
	mysqli_select_db($cnn,"genix")or die("Không tìm thấy CSDL");// Tìm CSDL để làm việc
	// Câu truy vấn để lấy dữ liệu sản phẩm trong bảng san pham
	$sql_sp="Select * from sanpham";
	$kq=mysqli_query($cnn,$sql_sp);
	$tongbg=mysqli_num_rows($kq);// Trả về số bản ghi
	//echo $tongbg;
	$stt_sanpham=0;
	while($row=mysqli_fetch_object($kq))//duyệt từng bản ghi
{
	$stt_sanpham++;
		//Đưa dữ liệu của từng cột vào mảng
	$id_sanpham[$stt_sanpham]=$row->id_sanpham;
	$ten_sanpham[$stt_sanpham]=$row->ten_sanpham;
	$mota[$stt_sanpham]=$row->mo_ta;
	$gia[$stt_sanpham]=$row->gia;
	$hinh_anh[$stt_sanpham]=$row->hinh_anh;
	//$xx[$stt_hang]=$row->xuatxu;
}
	?>
	
	
   <section id="header">
    <a href="#"><img src="img1/snapedit.png" alt="WebGenix" style="width: 110px;height: 90px;" class="logo"></a>   

    <div>
        <ul id="navbar">
            <li><a class="active" href="index.html">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li id="lg-bag"><a href="gio_hang.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
        </ul>
    </div>

    <div id="mobile">
        <a href="gio_hang.php"><i class="fa-solid fa-cart-shopping"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section> 

<!-- Home page-->
 <section id="hero">
    <h4>Genix Order</h4>
    <h2>Hãng order sẵn - Sở hữu nhanh chóng</h2>
    <h1>Giá cả hợp lí - Siêu sale ưu đãi</h1>
    <p>Độc đáo trong từng thiết kế, "chất lượng" trong từng sản phẩm </p>
    <button>Mua ngay</button>
 </section>

 <!-- Feature [Tính năng]-->
  <section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="img/features/f1.png">
        <h6>Mua nhận ngay</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f2.png">
        <h6>Đặt nhanh chóng</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f3.png">
        <h6>Tiết kiệm chi phí</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f4.png">
        <h6>Khuyến mãi lớn</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f5.png">
        <h6>Hỗ trợ nhiệt tình</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f6.png">
        <h6>Nâng cấp miễn phí</h6>
    </div>
  </section>

  <!-- Product -->
   <section id="product1" class="section-p1">
    <h2>Bộ Sưu Tập Giáng Sinh</h2>
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
                <h4><?php echo $gia[$i]?></h4>
				<h6></h6>
            </div>
          <a href="xem_chi_tiet.php?id_sanpham=<?php echo $id_sanpham[$i]?>"></i>Xem chi tiết</a>
		<a href="them_gio_hang.php?id_sanpham=<?php echo $id_sanpham[$i]?>"><i class="fa-solid fa-cart-plus cart"></i></a>
		</div>  

			  <?php
}
			  ?>
    </div>
   </section>

   <!-- Banner sMALL -->
    <section id="banner" class="section-m1">
        <h4></h4>
        <h2>Cam kết chất lượng- <span> Đổi trả miễn phí </span>-Tất cả sản phẩm</h2>
        <button class="normal"> Tìm hiểu thêm</button>
    </section>

<!-- Small 2 Banner -->
 
    <section id="sm-banner" class="section-p1">
    <div class="banner-box">
        <h4>Bộ sưu tập</h4>
        <h2>Mùa Xuân</h2>
        <span>Những sản phẩm tươi sáng và nổi bật.</span>
        <button>Tìm hiểu thêm</button>
    </div>
    <div class="banner-box">
        <h4>Bộ sưu tập</h4>
        <h2>Mùa Hè</h2>
        <span>Sự mát mẻ và thoải mái trong từng thiết kế.</span>
        <button>Tìm hiểu thêm</button>
    </div>
    <div class="banner-box">
        <h4>Bộ sưu tập</h4>
        <h2>Mùa Thu</h2>
        <span>Ấm áp và nhẹ nhàng, phù hợp với khí hậu mùa thu.</span>
        <button>Tìm hiểu thêm</button>
    </div>
    <div class="banner-box">
        <h4>Bộ sưu tập</h4>
        <h2>Mùa Đông</h2>
        <span>Giữ ấm và thời trang với thiết kế đặc biệt.</span>
        <button>Tìm hiểu thêm</button>
    </div>
</section>




  <!--  New letter -->
    <section id="newsletter" class="section-p1">
        <div class="newstext">
            <h4>Đăng kí nhận bản tin</h4>
            <p>Nhận thông tin cập nhật qua Email về cửa hàng mới nhất của chúng tôi và <span>các ưu đãi đặc biệt</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Đăng ký</button>
        </div>
    </section>

    <!-- Footer -->
     <footer id="section-p1">
        <div class="col">
            <img style="width: 100px;height: 80px; class="logo" src="img1/snapedit.png">
            <h4>Thông tin liên hệ</h4>
            <p><strong>Địa chỉ: </strong>54 Triều Khúc, Thanh Xuân, Hà Nội</p>
            <p><strong>Số điện thoại: </strong> 0123456789</p>
            <p><strong>Giờ</strong> 8:00-17:00, Mon-Sat</p>
            <div class="follow">
                <h4>Theo chúng tôi</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinteresst-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>Liên hệ</h4>
            <a href="#">Về chúng tôi</a>
            <a href="#">Thông tin sản phẩm</a>
            <a href="#">Chính sách bảo mật</a>
            <a href="#">Điều khoản và điều kiện</a>
            <a href="#">Liên hệ chúng tôi</a>
        </div>

        <div class="col">
            <h4>Tài khoản của chúng tôi</h4>
            <a href="#">Đăng nhập</a>
            <a href="#">Xem giỏ hàng</a>
            <a href="#">Sản phẩm yêu thích</a>
            <a href="#">Theo dõi bảo hành</a>
            <a href="#">Hỗ trợ</a>
        </div>

        <div class="col install">
            <h4>Tải ứng dụng</h4>
            <p>Từ App Store hoặc Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p>Cổng thanh toán an toàn</p>
            <img src="img/pay/pay.png" alt="">
        </div>


        <div class="copyright">
            <p>© 2024, OrdGenix</p>
        </div>

     </footer>

     <div class="snowfall"></div>

     <script src="script.js"></script>			
</body>
</html>
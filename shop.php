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
// Kết nối tới cơ sở dữ liệu
$cnn = mysqli_connect("localhost", "root", "") or die("Không tìm thấy máy chủ"); // Tạo kết nối với máy chủ
mysqli_select_db($cnn, "genix") or die("Không tìm thấy cơ sở dữ liệu"); // Chọn cơ sở dữ liệu

// Lấy id_bosuutap từ URL nếu có
$id_bosuutap = isset($_GET['id_bosuutap']) ? (int)$_GET['id_bosuutap'] : 0;

// Câu truy vấn lấy sản phẩm từ bảng `shop` theo id_bosuutap
if ($id_bosuutap > 0) {
    $sql_sp = "SELECT * FROM shop WHERE id_bosuutap = $id_bosuutap";
} else {
    $sql_sp = "SELECT * FROM shop"; // Lấy tất cả sản phẩm nếu không chọn bộ sưu tập
}

$kq = mysqli_query($cnn, $sql_sp); // Thực hiện truy vấn

// Kiểm tra kết quả truy vấn
if (!$kq) {
    die("Lỗi truy vấn: " . mysqli_error($cnn)); // Hiển thị lỗi nếu truy vấn sai
}

$tongbg = mysqli_num_rows($kq); // Đếm số lượng bản ghi
$stt_sanpham = 0; // Khởi tạo chỉ số sản phẩm

// Tạo mảng lưu thông tin sản phẩm
$id_sanpham = [];
$ten_sanpham = [];
$mota = [];
$gia = [];
$hinh_anh = [];
$id_bosuutap_array = [];

// Lặp qua từng bản ghi để lưu vào mảng
while ($row = mysqli_fetch_object($kq)) {
    $stt_sanpham++;
    $id_sanpham[$stt_sanpham] = $row->id_sanpham;       // ID sản phẩm
    $ten_sanpham[$stt_sanpham] = $row->ten_sanpham;     // Tên sản phẩm
    $mota[$stt_sanpham] = $row->mo_ta;                 // Mô tả sản phẩm
    $gia[$stt_sanpham] = $row->gia;                   // Giá sản phẩm
    $hinh_anh[$stt_sanpham] = $row->hinh_anh;         // Hình ảnh sản phẩm
    $id_bosuutap_array[$stt_sanpham] = $row->id_bosuutap; // ID bộ sưu tập
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($cnn);
?>
	
   <section id="header">
    <a href="#"><img src="img1/snapedit.png" alt="WebGenix" style="width: 110px;height: 90px;" class="logo"></a>   

    <div>
        <ul id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="shop.php">Shop</a></li>
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
	

<!--BST-->
	   <section id="sm-banner" class="section-p1">
    <div class="banner-box1">
        <h4>Bộ sưu tập</h4>
        <h2>Mùa Xuân</h2>
        <span>Những sản phẩm tươi sáng và nổi bật.</span>
        <a href="bosuutap.php?id_bosuutap=1"><button>Tìm hiểu thêm</button></a>
    </div>
    <div class="banner-box2">
        <h4>Bộ sưu tập</h4>
        <h2>Mùa Hè</h2>
        <span>Sự mát mẻ và thoải mái trong từng thiết kế.</span>
        <a href="bosuutap.php?id_bosuutap=2"><button>Tìm hiểu thêm</button></a>
    </div>
    <div class="banner-box3">
        <h4>Bộ sưu tập</h4>
        <h2>Mùa Thu</h2>
        <span>Ấm áp và nhẹ nhàng, phù hợp với khí hậu mùa thu.</span>
        <a href="bosuutap.php?id_bosuutap=3"><button>Tìm hiểu thêm</button></a>
    </div>
    <div class="banner-box4">
        <h4>Bộ sưu tập</h4>
        <h2>Mùa Đông</h2>
        <span>Giữ ấm và thời trang với thiết kế đặc biệt.</span>
        <a href="bosuutap.php?id_bosuutap=4"><button>Tìm hiểu thêm</button></a>
    </div>
	 <div class="banner-box5">
        <h4>Bộ sưu tập</h4>
        <h2>Áo Khoác</h2>
        <span>Giữ ấm và thời trang với thiết kế đặc biệt.</span>
        <a href="bosuutap.php?id_bosuutap=5"><button>Tìm hiểu thêm</button></a>
    </div>
</section>


   <!-- Banner sMALL -->
    <section id="banner" class="section-m1">
        <h4></h4>
        <h2>Cam kết chất lượng- <span> Đổi trả miễn phí </span>-Tất cả sản phẩm</h2>
        <button class="normal"> Tìm hiểu thêm</button>
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
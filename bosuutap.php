<?php
// Kết nối cơ sở dữ liệu
$cnn = mysqli_connect("localhost", "root", "") or die("Không tìm thấy máy chủ");
mysqli_select_db($cnn, "genix") or die("Không tìm thấy cơ sở dữ liệu");

// Lấy `id_bosuutap` từ URL
$id_bosuutap = isset($_GET['id_bosuutap']) ? (int)$_GET['id_bosuutap'] : 0;

// Lấy thông tin bộ sưu tập
$sql_bosuutap = "SELECT * FROM bosuutap WHERE id_bosuutap = $id_bosuutap";
$result_bosuutap = mysqli_query($cnn, $sql_bosuutap);

// Kiểm tra nếu không tìm thấy bộ sưu tập
if (mysqli_num_rows($result_bosuutap) == 0) {
    die("Không tìm thấy bộ sưu tập.");
}
$bosuutap = mysqli_fetch_assoc($result_bosuutap);

// Lấy sản phẩm thuộc bộ sưu tập
$sql_products = "SELECT * FROM shop WHERE id_bosuutap = $id_bosuutap";
$result_products = mysqli_query($cnn, $sql_products);

// Kiểm tra kết quả truy vấn
if (!$result_products) {
    die("Lỗi truy vấn sản phẩm: " . mysqli_error($cnn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo htmlspecialchars($bosuutap['ten_bosuutap']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($bosuutap['ten_bosuutap']); ?></h1>
    <p><?php echo htmlspecialchars($bosuutap['mo_ta']); ?></p>

    <!-- Hiển thị sản phẩm -->
    <div class="products">
        <h2>Sản phẩm trong bộ sưu tập</h2>
        <div class="pro-container">
            <?php if (mysqli_num_rows($result_products) > 0): ?>
                <?php while ($product = mysqli_fetch_assoc($result_products)): ?>
                    <div class="pro">
                        <img src="<?php echo htmlspecialchars($product['hinh_anh']); ?>" alt="<?php echo htmlspecialchars($product['ten_sanpham']); ?>">
                        <h5><?php echo htmlspecialchars($product['ten_sanpham']); ?></h5>
                        <p><?php echo number_format($product['gia'], 0, ',', '.'); ?> VND</p>
                        <a href="xem_chi_tiet.php?id_sanpham=<?php echo $product['id_sanpham']; ?>" class="detail-btn">Chi tiết</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Không có sản phẩm nào trong bộ sưu tập này.</p>
            <?php endif; ?>
        </div>
    </div> 
</body>
</html>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php 
	$cnn=mysqli_connect("localhost","root","") or die("Không tìm thấy máy chủ");//Tạo kết nối với máy chủ
	mysqli_select_db($cnn,"74dctd21")or die("Không tìm thấy CSDL");// Tìm CSDL để làm việc
	$sql_loaisp="Select * from loaisp";
	$kq=mysqli_query($cnn,$sql_loaisp);
	$tongbg=mysqli_num_rows($kq);// Trả về số bản ghi
	//echo $tongbg;
	$stt_loai=0;
	while($row=mysqli_fetch_object($kq))//duyệt từng bản ghi
{
	$stt_loai++;
		//Đưa dữ liệu của từng cột vào mảng
	$id_loai[$stt_loai]=$row->id_loaisp;
	$tenloai[$stt_loai]=$row->tenloaisp;
	$ghichu[$stt_loai]=$row->ghichu;
	//$xx[$stt_hang]=$row->xuatxu;
}
	?>
	<?php 
	$cnn=mysqli_connect("localhost","root","") or die("Không tìm thấy máy chủ");//Tạo kết nối với máy chủ
	mysqli_select_db($cnn,"74dctd21")or die("Không tìm thấy CSDL");// Tìm CSDL để làm việc
	$sql_hangsx="Select * from hangsx";
	$kq=mysqli_query($cnn,$sql_hangsx);
	$tongbg=mysqli_num_rows($kq);// Trả về số bản ghi
	//echo $tongbg;
	$stt_loai=0;
	while($row=mysqli_fetch_object($kq))//duyệt từng bản ghi
{
	$stt_loai++;
		//Đưa dữ liệu của từng cột vào mảng
	$id_hangsx[$stt_loai]=$row->id_hangsx;
	$tenhang[$stt_loai]=$row->tenhang;
	$xx[$stt_loai]=$row->xuatxu;
	}
	?>
	<form name="frm_sanpham" method="post" action="sanpham_act.php" enctype="multipart/form-data">
<table width="500" border="1" align="center">
  <tbody>
    <tr>
      <td colspan="2">
              <p>Thêm sản phẩm</p>
            </td>
    </tr>
    <tr>
      <td width="129">Loại sản phẩm</td>
      <td width="355">
		  <select name="loaisp">
			  
		  	<option value="0">---Chọn loại sản phẩm-</option>
			  <?php for($i=1;$i<=$tongbg;$i++) 
				{
	?>
			<option value="<?php echo $id_loai[$i];?>"><?php echo $tenloai[$i]?></option>
			  ?>
			  <?php
}
			  ?>
		  </select></td>
    </tr>
    <tr>
      <td>Hãng sản xuất</td>
      <td><select name="hangsx">
			  
		  	<option value="0">---Chọn hãng sản xuất-</option>
			  <?php for($i=1;$i<=$tongbg;$i++) 
				{
	?>
			<option value="<?php echo $id_hangsx[$i];?>"><?php echo $tenhang[$i]?></option>
			  ?>
			  <?php
}
			  ?>
		  </select></td>
    </tr>
    <tr>
      <td>Tên sản phẩm</td>
      <td><input type="text" name="txt_tensp"></td>
    </tr>
    <tr>
      <td>Ảnh minh họa</td>
      <td><input type="file" name="img_sp"></td>
    </tr>
    <tr>
      <td>Giá</td>
      <td><input type="text" name="txt_gia"></td>
    </tr>
    <tr>
      <td>Thông tin chi tiết</td>
      <td><textarea name="thongtin" cols="35" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" ><input type="reset"></td>
    </tr>
  </tbody>
</table>
</body>
</html>
<?php
	error_reporting(0);
	require("../lib/dbcon.php");
	$idDH=(isset($_GET['idDH']))?$_GET['idDH']:'';
	$qr=mysql_query("SELECT users.*,donhang.* FROM users INNER JOIN donhang ON users.idUser=donhang.idUser WHERE idDH=$idDH");
	$row_dathang=mysql_fetch_array($qr);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="700" border="0" style="font-size:18px;">
  <tr>
    <td height="35" colspan="2" style="text-align: center; padding-right:20px; font-size: 24px;color:#00F">Thông tin khách hàng</td>
  </tr>
  <tr>
    <td width="250" height="35" style="text-align: right;padding-right:20px"><strong>Khách hàng:</strong></td>
    <td width="240">&nbsp;&nbsp;<?php echo $row_dathang['HoTen'];?></td>
  </tr>
  <tr>
    <td height="28" style="text-align: right;padding-right:20px"><strong>Ngày đặt hàng:</strong></td>
    <td>&nbsp;&nbsp;<?php echo $row_dathang['ThoiDiemDatHang'];?></td>
  </tr>
  <tr>
    <td height="30" style="text-align: right;padding-right:20px"><strong>Điện thoại:</strong></td>
    <td>&nbsp;&nbsp;<?php echo $row_dathang['Dienthoai'];?></td>
  </tr>
  <tr>
    <td height="32" style="text-align: right;padding-right:20px"><strong>Email:</strong></td>
    <td>&nbsp;&nbsp;<?php echo $row_dathang['Email'];?></td>
  </tr>
  <tr>
    <td height="37" style="text-align: right;padding-right:20px"><strong>Địa chỉ:</strong></td>
    <td>&nbsp;&nbsp;<?php echo $row_dathang['DiaChi'];?></td>
  </tr>
  <tr>
    <td height="32" style="text-align: right;padding-right:20px"><strong>Trạng thái:</strong></td>
    <td>&nbsp;&nbsp;<?php if($row_dathang['TinhTrang']) {echo "Đã giao hàng"; }else echo "Chưa giao hàng";?></td>
  </tr>
  <tr>
    <td height="31" style="text-align: right;padding-right:20px"><strong>Yêu cầu:</strong></td>
    <td>&nbsp;&nbsp;<?php echo $row_dathang['GhiChu'];?></td>
  </tr>
</table>
<table width="100%" border="0" style="margin-top:10px">
  <tr>
    <td height="38" colspan="5" bgcolor="#CCCCCC" style="font-weight: bold; font-size: 18px; color:#06F">Danh mục sản phẩm</td>
  </tr>
  <tr bgcolor="#0099FF" style="text-align: center">
    <td width="23%" height="38"><strong>Hình ảnh</strong></td>
    <td width="23%"><strong>Sản phẩm</strong></td>
    <td width="17%"><strong>Giá</strong></td>
    <td width="18%"><strong>Số lượng</strong></td>
    <td width="19%"><strong>Thành tiền</strong></td>
  </tr>
  <?php
  	$q=mysql_query("SELECT donhangchitiet.*,sanpham.* FROM donhangchitiet INNER JOIN sanpham ON donhangchitiet.idSP=sanpham.idSP WHERE idDH=$idDH");
	while($row=mysql_fetch_array($q)){
  ?>
  <tr bgcolor="#CCCCCC" style="text-align: center">
    <td align="center"><img src="../upload/sanpham/hinhchinh/<?php echo $row['UrlHinh'];?>" width="147" height="118" /></td>
    <td><?php echo $row['TenSP'];?></td>
    <td><?php echo $row['Gia'];?></td>
    <td><?php echo $row['SoLuong'];?></td>
    <td><?php echo $row['ThanhTien'];?></td>
    
  </tr>
  <?php
	}
  ?>
</table>

</body>
</html>
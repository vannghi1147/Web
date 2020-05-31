<?php
	error_reporting(0);
	require("../lib/dbcon.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td width="12%" height="36" bgcolor="#0066FF" style="text-align: center"><strong>STT</strong></td>
    <td width="33%" bgcolor="#0066FF" style="text-align: center"><strong>Khách khàng</strong></td>
    <td width="28%" bgcolor="#0066FF" style="text-align: center"><strong>Địa điểm giao hàng</strong></td>
    <td width="14%" bgcolor="#0066FF" style="text-align: center"><strong>Ghi chú</strong></td>
    <td width="13%" bgcolor="#0066FF" style="text-align: center"><strong>Chức năng</strong></td>
  </tr>
  <?php
  	$qr=mysql_query("SELECT * FROM donhang");
	$s=1;
	while($row_donhang=mysql_fetch_array($qr)){		
  ?>
  <tr bgcolor="#CCCCCC" style="text-align: center">
    <td><?php echo $s++?></td>
    <td align="center"><p><a href="<?php echo "?p=chitietdathang&idDH=".$row_donhang['idDH']; ?>"><img src="../images/app_48.png" width="47" height="36" align="left" /></a><?php echo $row_donhang['TenNguoiNhan'];?></p></td>
    <td><?php echo $row_donhang['DiaDiemGiaoHang'];?></td>
    <td><?php echo $row_donhang['GhiChu'];?></td>
    <td>
		 <p>
		   <input type="submit" name="button2" id="button2" value="  Xóa  " onclick="if(confirm(' Bạn muốn xóa không ??')==true){location.href='<?php echo "?p=$p&action=del&idDH=".$row_donhang['idDH']; ?>'}" />
	  </p>
    </td>
  </tr>
  <?php
	}
  ?>
</table>
</body>
</html>
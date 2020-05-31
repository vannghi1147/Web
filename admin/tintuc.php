<?php
	error_reporting(0);
	require("../lib/dbcon.php");
	$sql=("SELECT * FROM tintuc ");
	$result=mysql_query($sql);	
	$row_tintuc=mysql_fetch_assoc($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellspacing="3" cellpadding="3" align="center" style="text-align:center">
  <tr bgcolor="#00FFFF">
    <td width="7%"><strong>STT</strong></td>
    <td width="8%"><strong>Tin tức</strong></td>
    <td width="11%"><strong>Giới thiệu</strong></td>
    <td width="19%"><strong>Chi tiết</strong></td>
    <td width="21%"><strong>Hình ảnh</strong></td>
    <td width="9%"><strong>Nguồn </strong></td>
    <td width="7%"><strong>Hiện thị</strong></td>
    <td width="6%"><strong>Sắp xếp</strong></td>
    <td width="12%"><strong>Tính năng</strong></td>
  </tr>
  <?php 	
  		$s=1;
  		do{
  ?>
  <tr bgcolor="#CCCCCC">
    <td><?php echo $s++ ;?></td>
    <td><?php echo $row_tintuc['tintuc'] ;?></td>
    <td><?php echo $row_tintuc['gioithieu']; ?></td>
    <td><?php echo $row_tintuc['chitiet']; ?></td>
    <td><?php if($row_tintuc['hinhanh']!=''){?><img src="<?php echo"../upload/tintuc/".$row_tintuc['hinhanh'];?>" alt="" name="hinhanh" width="150" height="100" id="hinhanh2" /> <?php }else{ echo" Không có hình"; }?></td>
    <td><?php echo $row_tintuc['nguon']; ?></td>
    <td><form id="form1" name="form1" method="post" action="">
      <input name="checkbox" type="checkbox" id="checkbox" <?php if($row_tintuc['hienthi']){ echo "checked='checked'" ;} ?> />
    </form></td>
    <td><?php echo $row_tintuc['sapxep']?></td>
    <td>
      <input type="submit" name="button" id="button" value="  Sửa  " onclick="location.href='<?php echo "?p=$p&action=edit&id=".$row_tintuc['IDtintuc']; ?>';" />
      <input type="submit" name="button2" id="button2" value="  Xóa  " onclick="if(confirm(' Bạn muốn xóa không ??')==true){location.href='<?php echo "?p=$p&action=del&id=".$row_tintuc['IDtintuc']; ?>'}" />
    </td>
  </tr>
  <?php
		}while($row_tintuc=mysql_fetch_assoc($result));
  ?>
</table>
</body>
</html>
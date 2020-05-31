<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellspacing="3" cellpadding="3" align="center" style="text-align:center">
  <tr bgcolor="#00FFFF">
    <td width="6%"><strong>STT</strong></td>
    <td width="10%"><strong>Loại sản phầm</strong></td>
    <td width="8%"><strong>Sản phẩm</strong></td>
    <td width="9%"><strong>Tên SP không dấu</strong></td>
    <td width="10%"><strong>Nhà sản xuất</strong></td>
    <td width="10%"><strong>Mô tả</strong></td>
    <td width="8%"><strong>Hình ảnh</strong></td>
    <td width="10%"><strong>Giá bán</strong></td>
 	<td width="9%"><strong>Ghi chú</strong></td>
    <td width="6%"><strong>Số lưọng tồn</strong></td>
    <td width="9%"><strong>Ẩn hiện</strong></td>
    <td width="14%"><strong>Tính năng</strong></td>
  </tr>  
  <?php 
  	$sql=("SELECT sanpham.*,loaisp.TenLoai FROM sanpham INNER JOIN loaisp ON sanpham.idLoai=loaisp.idLoai" );
	$result=mysql_query($sql);
	$s=1;
	while($row_sanpham=mysql_fetch_array($result)){				
  ?>  
  <tr bgcolor="#CCCCCC">
    <td><?php echo $s++ ;?></td>
    <td><?php echo $row_sanpham['TenLoai']; ?></td>
    <td><?php echo $row_sanpham['TenSP'] ;?></td>
    <td><?php echo $row_sanpham['TenSP_KD']; ?></td>
    <td><?php echo $row_sanpham['NhaSX']; ?></td>
    <td><?php echo $row_sanpham['MoTa']; ?></td>
    <td><?php if($row_sanpham['UrlHinh']!=''){?><img src="<?php echo"../upload/sanpham/hinhchinh/".$row_sanpham['UrlHinh'];?>" alt="" name="hinhanh" width="100" height="70" id="hinhanh2" /> <?php }else{ echo" Không có hình"; }?></td>
    <td><?php echo $row_sanpham['Gia']; ?></td>
    <td><?php echo $row_sanpham['GhiChu']; ?></td>
    <td><?php echo $row_sanpham['SoLuongTonKho']?></td>
    <td><form id="form1" name="form1" method="post" action="">
      <input name="checkbox" type="checkbox" id="checkbox" <?php if($row_sanpham['AnHien']){ echo "checked='checked'" ;} ?> />
    </form></td>  
    <td>
      <input type="submit" name="button" id="button" value="  Sửa  "  onclick="location.href='<?php echo "?p=$p&action=edit&id=".$row_sanpham['idSP']; ?>';"/>
      <input type="submit" name="button2" id="button2" value="  Xóa  " onclick="if(confirm(' Bạn muốn xóa không ??')==true){location.href='<?php echo "?p=$p&action=del&id=".$row_sanpham['idSP']; ?>'}" />
    </td>  
  </tr>
   
 <?php
		}
  ?>   
</table>
</body>
</html>
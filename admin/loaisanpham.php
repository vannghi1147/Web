<?php
	require_once("../lib/dbcon.php");
	//require_once("../system/function.php");	
	
	

		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="80%" border="0" cellspacing="3" cellpadding="3" align="center" style="text-align:center ">
  <tr bgcolor="#00FFFF">
    <td width="10%" height="39"><strong>STT</strong></td>
    <td width="14%"><strong>Loại sản phẩm</strong></td>     
    <td width="15%"><strong>Tên không dấu</strong></td>
    <td width="12%"><strong>Thứ tự</strong></td>
    <td width="14%"><strong>Hiện thị</strong></td>    
    <td width="17%"><strong>Tính năng</strong></td>
  </tr>
  <?php
  		$stt=1;
		$sql=("SELECT * FROM loaisp");
		$result=mysql_query($sql);
  		while($row=mysql_fetch_array($result)){
  ?>
  <tr bgcolor="#CCCCCC">  
    <td height="49"><?php echo $stt++ ;?></td>
    <td><?php echo $row['TenLoai'] ;?></td>   
   <td><?php echo $row['TenLoai_KD']; ?></td>
    <td><?php echo $row['ThuTu'] ;?></td>    
   <td>
      <input name="checkbox" type="checkbox" id="checkbox" <?php if($row['AnHien']){ echo "checked='checked'" ;} ?> />
  </td>    
    <td>
      <input type="submit" name="button" id="button" value="  Sửa  " onclick="location.href='<?php echo "?p=$p&action=edit&id=".$row['idLoai']; ?>';"/>
      <input type="submit" name="btnxoa" id="btnxoa" value="  Xóa  " onclick="if(confirm(' Bạn muốn xóa không ??')==true){location.href='<?php echo "?p=$p&action=del&id=".$row['idLoai']; ?>'}" />
    </td>
  </tr>
  <?php
		}
  ?>
</table>
</body>
</html>
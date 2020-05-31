<?php
	require_once("../system/config.php");
	require_once("../system/function.php");		
	
	$sql=("SELECT * FROM banner");
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellspacing="3" cellpadding="3" align="center" style="text-align:center ">
  <tr bgcolor="#00FFFF">
    <td width="8%" height="39"><strong>STT</strong></td>
    <td width="11%"><strong>Nội dung</strong></td>
    <td width="60%">Hình ảnh</td>
    <td width="7%">Sắp xếp</td>
    <td width="14%"><strong>Tính năng</strong></td>
  </tr>
  <?php
  		$stt=1;
  		do{
  ?>
  <tr bgcolor="#CCCCCC">
    <td><?php echo $stt++ ;?></td>
    <td><?php echo $row['TenBanner'] ;?></td>
    <td><?php if($row['UrlHinh']!=''){?><img src="<?php echo"../upload/hinhsilede/".$row['UrlHinh'];?>" alt="" name="hinhanh" width="100%" height="180" id="hinhanh2" /> <?php }else{ echo" Không có hình"; }?></td>
    <td><?php echo $row['sapxep'] ;
?></td>
    <td>
      <input type="submit" name="button" id="button" value="  Sửa  " onclick="location.href='<?php echo "?p=$p&action=edit&id=".$row['idBanner']; ?>';"/>
      <input type="submit" name="btnxoa" id="btnxoa" value="  Xóa  " onclick="if(confirm(' Bạn muốn xóa không ??')==true){location.href='<?php echo "?p=$p&action=del&id=".$row['idBanner']; ?>'}" />
    </td>
  </tr>
  <?php
		}while($row=mysql_fetch_assoc($result));
  ?>
</table>
</body>
</html>
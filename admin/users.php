<?php 
	
	require_once('../system/config.php');
	require_once('../system/function.php');
	//goi han ket noi db
	//$Username=db_connect();
	//doc du lieu laisp
	
	$p=(isset($_GET['p']))?$_GET['p']:'users';
	$action=(isset($_GET['action']))?$_GET['action']:'';
	
	$sql="select * from users";
	$result=mysql_query($sql);
	//doc dong du lieu
	$row_users=mysql_fetch_assoc($result);
	//print_r($row_users);
	//if($result){echo "ket noi thanh cong";}else echo"that bai";
	 $i=1;


?>
<link href="../css/admin.css" rel="stylesheet" type="text/css" />

<div class="content">
  <table width="100%" border="0" cellspacing="2" cellpadding="2">
    <tr bgcolor="#00CCFF" class="tieude">
      <td width="60" align="center" style="text-align: center; font-weight: bold; font-style: italic;"><strong>STT</strong></td>
      <td width="89" style="text-align: center"><strong>Họ tên</strong></td>
      <td width="111" align="left" style="text-align: center"><strong>Username</strong></td>
      <td width="107" align="left" style="text-align: center"><strong>Pass</strong></td>
      <td width="107" align="left" style="text-align: center"><strong>Địa chỉ</strong></td>
      <td width="95" align="center" style="text-align: center"><strong>Điện thoại</strong></td>
      <td width="71" align="center" style="text-align: center"><strong>Email</strong></td>
      <td width="92" align="center" style="text-align: center"><strong>Quyền hạn</strong></td>
      <td width="75" align="center" style="text-align: center"><strong>Ngày sinh</strong></td>
      <td width="75" align="center" style="text-align: center"><strong>Giới tính</strong></td>
      <td width="119" align="center" style="text-align: center"><strong>Chức năng</strong></td>
    </tr>
    <!-- Hien thi danh sach loai san pham -->
    <?php do{?> 
    <tr >
      <td width="60" align="center" bgcolor="#CCCCCC"><?php echo $i++; ?></td>
      <td bgcolor="#CCCCCC"><?php echo $row_users['HoTen'];?></td>
      <td align="left" bgcolor="#CCCCCC"><?php echo $row_users['Username'];?></td>
      <td align="left" bgcolor="#CCCCCC"><?php echo $row_users['Password'];?></td>
      <td align="left" bgcolor="#CCCCCC"><?php echo $row_users['DiaChi'];?></td>
      <td align="center" bgcolor="#CCCCCC"><?php echo $row_users['Dienthoai'];?></td>
      <td align="center" bgcolor="#CCCCCC"><?php echo $row_users['Email'];?></td>
      <td align="center" bgcolor="#CCCCCC">
      <?php if($row_users['idGroup']) {echo "Admin"; }else echo "Thành viên";?>
      </td>
      <td align="center" bgcolor="#CCCCCC"><?php echo $row_users['NgaySinh'];?></td>
      
      <td align="center" bgcolor="#CCCCCC"><?php if($row_users['GioiTinh']) {echo "Nam"; }else echo "Nữ";?></td>
      
      <td align="center" bgcolor="#CCCCCC">
      <input type="submit" name="button" id="button" value="  Sửa  "  onclick="location.href='<?php echo "?p=$p&action=edit&idUser=".$row_users['idUser']; ?>';"/>     
      
      
       <input type="submit" name="button2" id="button2" value="  Xóa  " onclick="if(confirm(' Bạn muốn xóa không ??')==true){location.href='<?php echo "?p=$p&action=del&idUser=".$row_users['idUser']; ?>'}" />      
       
       
       
       </td>
      </tr>
<?php } while($row_users=mysql_fetch_assoc($result));?>

  </table>
  

</div>
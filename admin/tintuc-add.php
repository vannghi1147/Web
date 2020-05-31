<?php
	require_once("tintuc-function.php");
	
	$xuly=(isset($_POST['xuly']))?1:0;
	if($xuly){
		$tintuc=(isset($_POST['tintuc']))?$_POST['tintuc']:'';
		$gioithieu=(isset($_POST['gioithieu']))?$_POST['gioithieu']:'';
		$chitiet=(isset($_POST['chitiet']))?$_POST['chitiet']:'';
		$nguon=(isset($_POST['nguon']))?$_POST['nguon']:'';		
		$hinhanh=(isset($_FILES['hinhanh']))?$_FILES['hinhanh']['name']:'';
		$hienthi=(isset($_POST['hienthi']))?1:0;
		$sapxep=(isset($_POST['sapxep']))?$_POST['sapxep']:0;
	
		$path="../upload/tintuc/";
		if($hinhanh!=''){
			upload($_FILES['hinhanh'],$path);
		}
		$result=tintuc_them($tintuc,$gioithieu,$chitiet,$hinhanh,$nguon,$hienthi,$sapxep);		
	}
?>

<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="80%" border="0" align="center" cellpadding="5">
    <tr bgcolor="#0000FF" style="text-align: center; font-size: 24px; font-weight: bold;" >
      <td colspan="2">Điền đầy đủ thông nội dung tin tức</td>
    </tr>
    <tr>
      <td width="120" bgcolor="#00FFFF" style="text-align: center">Tin tức</td>
      <td bgcolor="#CCCCCC"><label for="tintuc"></label>
      <input type="text" name="tintuc" id="tintuc"></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Hình ảnh</td>
      <td bgcolor="#CCCCCC"><label for="hinhanh"></label>
      <input type="file" name="hinhanh" id="hinhanh"></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Giới thiệu</td>
      <td bgcolor="#CCCCCC"><label for="gioithieu"></label>
        <label for="gioithieu"></label>
      <textarea name="gioithieu" id="gioithieu" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Chi tiết</td>
      <td bgcolor="#CCCCCC"><textarea name="chitiet" id="chitiet" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Nguồn</td>
      <td bgcolor="#CCCCCC"><input type="text" name="nguon" id="nguon" /></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Hiển thị</td>
      <td bgcolor="#CCCCCC"><input type="checkbox" name="hienthi" id="hienthi">
      <label for="hienthi"></label></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Sắp xếp</td>
      <td bgcolor="#CCCCCC"><label for="textfield"></label>
      <input type="text" name="sapxep" id="sapxep" /></td>
    </tr>
    <tr>
      <td><input name="xuly" type="hidden" id="xuly" value="1"></td>
      <td><p>
        <input type="submit" name="btnluu" id="btnluu" value="   Lưu   ">
      </p>
      <p align="center"><font color="#0099FF" size="+2" ><?php
      	if(isset($_POST['btnluu'])){
			echo " Thêm thành công";
		}
	  ?></font> </p></td>
    </tr>
  </table>
</form>
<script type="text/javascript" src="../fckeditor/fckeditor.js"></script>
<script type="text/javascript" src="../js/loadfck.js"></script>

<script type="text/javascript">
	// Ham loadfck(<'Ten dieu khien'>,<Do rong>,<Chieu_cao>,<'Basic' hoac 'Default'>);
	loadfck('gioithieu',500,200,'Basic');
	loadfck('chitiet',500,200,'Basic');
</script>
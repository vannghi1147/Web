<?php
	require_once("loaisp-function.php");
	require_once("../system/function.php");
	
	$xuly=(isset($_POST['xuly']))?1:0;
	if($xuly){
		$TenLoai=(isset($_POST['TenLoai']))?$_POST['TenLoai']:'';
		$TenLoai_KD=(isset($_POST['TenLoai_KD']))?$_POST['TenLoai_KD']:'';		
		$AnHien=(isset($_POST['AnHien']))?1:0;
		$ThuTu=(isset($_POST['ThuTu']))?$_POST['ThuTu']:0;
		
		$result=loaisp_them($TenLoai,$TenLoai_KD,$AnHien,$ThuTu);		
	}
?>

<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="80%" border="0" align="center" cellpadding="5">
    <tr>
      <td colspan="2" bgcolor="#0000FF" style="text-align: center; font-weight: bold; font-size: 24px;">Điền đầy đủ thông tin loại sản phẩm</td>
    </tr>
    <tr>
      <td width="121" bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Loại sản phẩm</td>
      <td width="539" bgcolor="#CCCCCC">
      <input type="text" name="TenLoai" id="TenLoai"></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Tên không dấu</td>
      <td bgcolor="#CCCCCC">
        <input type="text" name="TenLoai_KD" id="TenLoai_KD" />
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Ẩn hiện</td>
      <td bgcolor="#CCCCCC"><input type="checkbox" name="AnHien" id="AnHien">
      <label for="hienthi"></label></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Thứ tự</td>
      <td bgcolor="#CCCCCC"><label for="textfield"></label>
      <input name="ThuTu" type="text" id="ThuTu" value="0" /></td>
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
	  ?></font></p></td>
    </tr>
  </table>
</form>

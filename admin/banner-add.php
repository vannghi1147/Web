<?php
	require_once("banner-function.php");
	require_once("../system/function.php");
	
	$xuly=(isset($_POST['xuly']))?1:0;
	if($xuly){
		$TenBanner=(isset($_POST['TenBanner']))?$_POST['TenBanner']:'';		
		$UrlHinh=(isset($_FILES['UrlHinh']))?$_FILES['UrlHinh']['name']:'';		
		$sapxep=(isset($_POST['sapxep']))?$_POST['sapxep']:0;	
		$path="../upload/hinhsilede/";
		if($UrlHinh!=''){
			upload($_FILES['UrlHinh'],$path);
		}
		$result= banner_them($TenBanner,$UrlHinh,$sapxep);		
	}
?>

<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="50%" border="0" align="center" cellpadding="5">
    <tr bgcolor="#0066FF">
      <td colspan="2" style="text-align: center; font-weight: bold; font-size: 24px;">Điền đầy đủ thông tin cho Banner</td>
    </tr>
    <tr>
      <td width="121" bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Nội dung</td>
      <td width="539" bgcolor="#CCCCCC">
        <label for="loaisp"></label>
        <input type="text" name="TenBanner" id="TenBanner">
      </td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Hình ảnh</td>
      <td bgcolor="#CCCCCC"><p>
        <label for="hinhanh"></label>
        <input type="file" name="UrlHinh" id="UrlHinh">
      </p></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Sắp xếp</td>
      <td bgcolor="#CCCCCC"><label for="textfield"></label>
      <input name="sapxep" type="text" id="sapxep" value="0" /></td>
    </tr>
    <tr>
      <td><input name="xuly" type="hidden" id="xuly" value="1">
      <input name="idSP" type="hidden" id="idSP" value="<?php echo $row_sanpham['idSP']; ?>" />
      <input name="hinhanh_old" type="hidden" id="hinhanh_old" value="<?php echo $row_sanpham['UrlHinh']; ?>" /></td>
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
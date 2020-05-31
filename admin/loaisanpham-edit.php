<?php
	require_once("loaisp-function.php");
	require_once("../system/function.php");
	$id=(isset($_GET['id']))?$_GET['id']:'';
	$sql="SELECT * FROM loaisp WHERE idLoai=$id";
	$loaisp=mysql_query($sql);
	$row_loaisp=mysql_fetch_assoc($loaisp);
	
	$xuly=(isset($_POST['xuly']))?1:0;
	if($xuly){
		$TenLoai=(isset($_POST['TenLoai']))?$_POST['TenLoai']:'';
		$idLoai=(isset($_POST['idLoai']))?$_POST['idLoai']:'';
		$TenLoai_KD=(isset($_POST['TenLoai_KD']))?$_POST['TenLoai_KD']:'';		
		$AnHien=(isset($_POST['AnHien']))?1:0;
		$ThuTu=(isset($_POST['ThuTu']))?$_POST['ThuTu']:0;
		
	
		$result=loaisp_capnhat($idLoai,$TenLoai,$TenLoai_KD,$AnHien,$ThuTu);	
	}
?>

<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="80%" border="0" align="center" cellpadding="5">
    <tr bgcolor="#0000FF">
      <td colspan="2" style="text-align: center; font-size: 24px; font-weight: bold;">Điền đầy đủ thông tin loại sản phẩm cần sửa</td>
    </tr>
    <tr>
      <td width="136" bgcolor="#00FFFF" style="text-align: center">Loại sản phẩm</td>
      <td width="504" bgcolor="#CCCCCC"><label for="TenLoai"></label>
      <input name="TenLoai" type="text" id="TenLoai" value="<?php echo $row_loaisp['TenLoai']; ?>"></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Tên không dấu</td>
      <td bgcolor="#CCCCCC"><label for="TenLoai_KD"></label>
        <label for="gioithieu">
          <input name="TenLoai_KD" type="text" id="TenLoai_KD" value="<?php echo $row_loaisp['TenLoai_KD']; ?>" />
        </label></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Ẩn hiện</td>
      <td bgcolor="#CCCCCC"><input name="AnHien" type="checkbox" id="AnHien" <?php if($row_loaisp['AnHien']==1){echo "checked='checked'"; }?>>
      <label for="hienthi"></label></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Thứ tự</td>
      <td bgcolor="#CCCCCC"><label for="textfield"></label>
      <input name="ThuTu" type="text" id="ThuTu" value="<?php echo $row_loaisp['ThuTu']; ?>" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: center"><input name="xuly" type="hidden" id="xuly" value="1">
      <input name="idLoai" type="hidden" id="idLoai" value="<?php echo $row_loaisp['idLoai']; ?>" />
      </td>
      <td><p>
        <input type="submit" name="btnluu" id="btnluu" value="     Lưu     ">
      </p>
      <p align="center"><font color="#0099FF" size="+2" ><?php
      	if(isset($_POST['btnluu'])){
			echo " Sửa thành công";
		}
	  ?></font> </p></td>
    </tr>
  </table>
</form>


<?php
	require_once("sanpham-function.php");
	require_once("../system/function.php");
	
	$xuly=(isset($_POST['xuly']))?1:0;
	if($xuly){
		$TenSP=(isset($_POST['TenSP']))?$_POST['TenSP']:'';
		$TenSP_KD=(isset($_POST['TenSP_KD']))?$_POST['TenSP_KD']:'';
		$NhaSX=(isset($_POST['NhaSX']))?$_POST['NhaSX']:'';
		$MoTa=(isset($_POST['MoTa']))?$_POST['MoTa']:'';
		$UrlHinh=(isset($_FILES['UrlHinh']))?$_FILES['UrlHinh']['name']:'';
		$Gia=(isset($_POST['Gia']))?$_POST['Gia']:'';
		$baiviet=(isset($_POST['baiviet']))?$_POST['baiviet']:'';
		$idLoai=(isset($_POST['idLoai']))?$_POST['idLoai']:'';
		$SoLuongTonKho=(isset($_POST['SoLuongTonKho']))?$_POST['SoLuongTonKho']:'';
		$AnHien=(isset($_POST['AnHien']))?1:0;
		$GhiChu=(isset($_POST['GhiChu']))?$_POST['GhiChu']:'';
	
		$path="../upload/sanpham/hinhchinh/";
		if($UrlHinh!=''){
			upload($_FILES['UrlHinh'],$path);
		}
		$result=sanpham_them($idLoai,$TenSP,$TenSP_KD,$NhaSX,$MoTa,$UrlHinh,$Gia,$baiviet,$SoLuongTonKho,$GhiChu,$AnHien);		
	}
?>

<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="72%" border="0" align="center" cellpadding="5">
    <tr>
      <td colspan="2" bgcolor="#0000FF" style="text-align: center; font-weight: bold; font-size: 24px;">Điền đầy đủ thông tin  sản phẩm</td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Loại sản phẩm</td>
      <td bgcolor="#CCCCCC"><select name="idLoai" size="1" id="idLoai">
        <?php 
	  	$qr="SELECT * FROM loaisp";
		$sp=mysql_query($qr);
		while($row_sp=mysql_fetch_assoc($sp)){
				
	  ?>
        <option value="<?php echo $row_sp['idLoai'];?> "><?php echo $row_sp['TenLoai'];?></option>
        <?php }?>
      </select></td>
    </tr>
    <tr>
      <td width="133" bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Sản phẩm</td>
      <td width="515" bgcolor="#CCCCCC"><label for="TenSP"></label>
      <input type="text" name="TenSP" id="TenSP"></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Tên SP không dấu</td>
      <td bgcolor="#CCCCCC"><label for="TenSP_KD">
        <input type="text" name="TenSP_KD" id="TenSP_KD" />
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Nhà sản xuất</td>
      <td bgcolor="#CCCCCC"><input type="text" name="NhaSX" id="NhaSX" /></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Hình ảnh</td>
      <td bgcolor="#CCCCCC"><input type="file" name="UrlHinh" id="UrlHinh" /></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Mô tả</td>
      <td bgcolor="#CCCCCC">        
      <textarea name="MoTa" id="MoTa" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Bài viết</td>
      <td bgcolor="#CCCCCC"><textarea name="baiviet" id="baiviet" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Ghi chú</td>
      <td bgcolor="#CCCCCC"><label for="ghichu"></label>
      <textarea name="GhiChu" id="GhiChu" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Giá</td>
      <td bgcolor="#CCCCCC"><input type="text" name="Gia" id="Gia" /></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Số lượng tồn</td>
      <td bgcolor="#CCCCCC"><input type="text" name="SoLuongTonKho" id="SoLuongTonKho" /></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Ẩn hiện</td>
      <td bgcolor="#CCCCCC"><input type="checkbox" name="AnHien" id="AnHien">
      <label for="hienthi"></label></td>
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
	loadfck('MoTa',500,200,'Basic');
	loadfck('baiviet',500,200,'Basic');
</script>

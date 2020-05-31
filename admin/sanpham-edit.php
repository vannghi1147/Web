<?php
	require_once("sanpham-function.php");
	require_once("../system/function.php");
	$id=(isset($_GET['id']))?$_GET['id']:'';
	$sql="SELECT * FROM sanpham WHERE idSP=$id";
	$sanpham=mysql_query($sql);
	$row_sanpham=mysql_fetch_assoc($sanpham);
	
	$xuly=(isset($_POST['xuly']))?1:0;
	if($xuly){
		$idSP=(isset($_POST['idSP']))?$_POST['idSP']:'';
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
		$hinhanh_old=(isset($_POST['hinhanh_old']))?$_POST['hinhanh_old']:'';
		$path="../upload/sanpham/hinhchinh/";
		if($UrlHinh==''){
			$UrlHinh=$hinhanh_old;
		}else{
			if($hinhanh_old !=''){
				if(file_exists($path.$hinhanh_old)){
					unlink($path.$row_sanpham['UrlHinh']);
				}
			}
			upload($_FILES['UrlHinh'],$path);	
		}
		$result= sanpham_capnhat($idSP,$idLoai,$TenSP,$TenSP_KD,$NhaSX,$MoTa,$UrlHinh,$Gia,$baiviet,$SoLuongTonKho,$GhiChu,$AnHien);		
	}
?>

<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="85%" border="0" align="center" cellpadding="5">
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
        <option value="<?php echo $row_sp['idLoai'];?>" <?php if($row_sp['idLoai']==$row_sanpham['idLoai']){echo" selected='selected'";}?>><?php echo $row_sp['TenLoai'];?></option>
        <?php }?>
      </select></td>
    </tr>
    <tr>
      <td width="132" bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Sản phẩm</td>
      <td width="643" bgcolor="#CCCCCC"><label for="TenSP"></label>
      <input type="text" name="TenSP" id="TenSP" value="<?php echo $row_sanpham['TenSP'];?>"></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Tên SP không dấu</td>
      <td bgcolor="#CCCCCC"><label for="TenSP_KD">
        <input type="text" name="TenSP_KD" id="TenSP_KD" value="<?php echo $row_sanpham['TenSP_KD'];?>"/>
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Nhà sản xuất</td>
      <td bgcolor="#CCCCCC"><input type="text" name="NhaSX" id="NhaSX" value="<?php echo $row_sanpham['NhaSX'];?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Hình ảnh</td>
      <td bgcolor="#CCCCCC"><input type="file" name="UrlHinh" id="UrlHinh">
      </p>
      <p><?php if($row_sanpham['UrlHinh']!=''){?><img src="<?php echo"../upload/sanpham/hinhchinh/".$row_sanpham['UrlHinh'];?>" alt="" name="hinhanh" width="100" height="70" id="hinhanh2" /> <?php }else{ echo" Không có hình"; }?></p></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Mô tả</td>
      <td bgcolor="#CCCCCC">        
      <textarea name="MoTa" id="MoTa" cols="60" rows="5"><?php echo $row_sanpham['MoTa'];?></textarea></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Bài viết</td>
      <td bgcolor="#CCCCCC"><textarea name="baiviet" id="baiviet" cols="60" rows="5"><?php echo $row_sanpham['baiviet'];?></textarea></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Ghi chú</td>
      <td bgcolor="#CCCCCC"><label for="ghichu"></label>
      <textarea name="GhiChu" id="GhiChu" cols="45" rows="5"><?php echo $row_sanpham['GhiChu'];?></textarea></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Giá</td>
      <td bgcolor="#CCCCCC"><input type="text" name="Gia" id="Gia" value="<?php echo $row_sanpham['Gia'];?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Số lượng tồn</td>
      <td bgcolor="#CCCCCC"><input name="SoLuongTonKho" type="text" id="SoLuongTonKho" value="<?php echo $row_sanpham['SoLuongTonKho'];?>" /></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Ẩn hiện</td>
      <td bgcolor="#CCCCCC"><input type="checkbox" name="AnHien" id="AnHien" <?php if($row_sanpham['AnHien']==1){echo "checked='checked'"; }?>>
      <label for="hienthi"></label></td>
    </tr>
   <tr>
      <td bgcolor="#FFFFFF" style="text-align: center"><input name="xuly" type="hidden" id="xuly" value="1">
      <input name="idSP" type="hidden" id="idSP" value="<?php echo $row_sanpham['idSP']; ?>" />
      <input name="hinhanh_old" type="hidden" id="hinhanh_old" value="<?php echo $row_sanpham['UrlHinh']; ?>" /></td>
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
<script type="text/javascript" src="../fckeditor/fckeditor.js"></script>
<script type="text/javascript" src="../js/loadfck.js"></script>

<script type="text/javascript">
	// Ham loadfck(<'Ten dieu khien'>,<Do rong>,<Chieu_cao>,<'Basic' hoac 'Default'>);
	loadfck('MoTa',600,200,'Basic');
	loadfck('baiviet',600,200,'Basic');
</script>

<?php
	error_reporting(0);
	require("../system/function.php");
	require("../lib/dbcon.php");
	require_once("tintuc-function.php");
	$id=(isset($_GET['id']))?$_GET['id']:'';
	$sql="SELECT * FROM tintuc WHERE IDtintuc=$id";
	$tintuc=mysql_query($sql);
	$row_tintuc=mysql_fetch_assoc($tintuc);	
	$xuly=(isset($_POST['xuly']))?1:0;
	if($xuly){		
		$IDtintuc=(isset($_POST['IDtintuc']))?$_POST['IDtintuc']:'';
		$tintuc=(isset($_POST['tintuc']))?$_POST['tintuc']:'';
		$gioithieu=(isset($_POST['gioithieu']))?$_POST['gioithieu']:'';
		$chitiet=(isset($_POST['chitiet']))?$_POST['chitiet']:'';
		$nguon=(isset($_POST['nguon']))?$_POST['nguon']:'';		
		$hinhanh=(isset($_FILES['hinhanh']))?$_FILES['hinhanh']['name']:'';
		$hienthi=(isset($_POST['hienthi']))?1:0;
		$sapxep=(isset($_POST['sapxep']))?$_POST['sapxep']:0;
		$hinhanh_old=(isset($_POST['hinhanh_old']))?$_POST['hinhanh_old']:'';
		$path="../upload/tintuc/";
		if($hinhanh==''){
			$hinhanh=$hinhanh_old;
		}else{
			if($hinhanh_old !=''){
				if(file_exists($path.$hinhanh_old)){
					unlink($path.$row_tintuc['hinhanh']);
				}
			}
			upload($_FILES['hinhanh'],$path);	
		}
		$result= tintuc_capnhat($IDtintuc,$tintuc,$gioithieu,$chitiet,$hinhanh,$nguon,$hienthi,$sapxep);		
	}
?>

<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="80%" border="0" align="center" cellpadding="5">
    <tr bgcolor="#0000FF">
      <td colspan="2" style="text-align: center; font-size: 24px; font-weight: bold;">Điền đầy đủ thông tin Tin tức cần sửa</td>
    </tr>
    <tr>
      <td width="120" bgcolor="#00FFFF" style="text-align: center">Tin tức</td>
      <td bgcolor="#CCCCCC"><label for="tintuc"></label>
      <input name="tintuc" type="text" id="tintuc" value="<?php echo $row_tintuc['tintuc']; ?>"></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Hình ảnh</td>
      <td bgcolor="#CCCCCC"><p>
        <label for="hinhanh"></label>
        <input type="file" name="hinhanh" id="hinhanh">
      </p>
      <p><?php if($row_tintuc['hinhanh']!=''){?><img src="<?php echo"../upload/tintuc/".$row_tintuc['hinhanh'];?>" alt="" name="hinhanh" width="100" height="70" id="hinhanh2" /> <?php }else{ echo" Không có hình"; }?></p></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Giới thiệu</td>
      <td bgcolor="#CCCCCC">      
      <textarea name="gioithieu" id="gioithieu" cols="45" rows="5"><?php echo $row_tintuc['gioithieu'] ?>
      </textarea></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Chi tiết</td>
      <td bgcolor="#CCCCCC"><textarea name="chitiet" id="chitiet" cols="45" rows="5"><?php echo $row_tintuc['chitiet']; ?></textarea></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Nguồn</td>
      <td bgcolor="#CCCCCC"><input name="nguon" type="text" id="nguon" value="<?php echo $row_tintuc['nguon']; ?>" /></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Hiển thị</td>
      <td bgcolor="#CCCCCC"><input name="hienthi" type="checkbox" id="hienthi" <?php if($row_tintuc['hienthi']==1){echo "checked='checked'"; }?>>
      <label for="hienthi"></label></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center">Sắp xếp</td>
      <td bgcolor="#CCCCCC">
      <input name="sapxep" type="text" id="sapxep" value="<?php echo $row_tintuc['sapxep']; ?>" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: center"><input name="xuly" type="hidden" id="xuly" value="1">
      <input name="IDtintuc" type="hidden" id="IDtintuc" value="<?php echo $row_tintuc['IDtintuc']; ?>" />
      <input name="hinhanh_old" type="hidden" id="hinhanh_old" value="<?php echo $row_tintuc['hinhanh']; ?>" /></td>
      <td><p>
        <input type="submit" name="btnluu" id="btnluu" value="     Lưu     ">
      </p>
      <p align="center"><font color="#0099FF" size="+2" ><?php
      	if(isset($_POST['btnluu'])){
			echo " Sửa thành công";
		}
	  ?></font></p></td>
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

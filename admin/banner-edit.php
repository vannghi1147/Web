<?php
	require_once("banner-function.php");
	require_once("../system/function.php");
	$id=(isset($_GET['id']))?$_GET['id']:'';
	$sql="SELECT * FROM banner WHERE idBanner=$id";
	$lienhe=mysql_query($sql);
	$row_banner=mysql_fetch_assoc($lienhe);
	
	$xuly=(isset($_POST['xuly']))?1:0;
	if($xuly){
		$idBanner=(isset($_POST['idBanner']))?$_POST['idBanner']:'';
		$TenBanner=(isset($_POST['TenBanner']))?$_POST['TenBanner']:'';		
		$UrlHinh=(isset($_FILES['UrlHinh']))?$_FILES['UrlHinh']['name']:'';		
		$sapxep=(isset($_POST['sapxep']))?$_POST['sapxep']:0;
		$hinhanh_old=(isset($_POST['hinhanh_old']))?$_POST['hinhanh_old']:'';
		$path="../upload/hinhsilede/";
		if($UrlHinh==''){
			$UrlHinh=$hinhanh_old;
		}else{
			if($hinhanh_old !=''){
				if(file_exists($path.$hinhanh_old)){
					unlink($path.$row_banner['UrlHinh']);
				}
			}
			upload($_FILES['UrlHinh'],$path);	
		}
		
		$result= banner_capnhat($idBanner,$TenBanner,$UrlHinh,$sapxep);	
	}
?>

<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%" border="0" align="center" cellpadding="5">
    <tr bgcolor="#0066FF">
      <td colspan="2" style="text-align: center; font-weight: bold; font-size: 24px;">Điền đầy đủ thông tin cho Banner</td>
    </tr>
    <tr>
      <td width="77" bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Nội dung</td>
      <td width="494" bgcolor="#CCCCCC">
        <label for="loaisp"></label>
        <input name="TenBanner" type="text" id="TenBanner" value="<?php echo $row_banner['TenBanner'];?>">
      </td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Hình ảnh</td>
      <td bgcolor="#CCCCCC"><p>
        <label for="hinhanh"></label>
        <input type="file" name="UrlHinh" id="UrlHinh">
      </p>
      <p><?php if($row_banner['UrlHinh']!=''){?><img src="<?php echo"../upload/hinhsilede/".$row_banner['UrlHinh'];?>" alt="" name="hinhanh" width="738" height="239" id="hinhanh2" /> <?php }else{ echo" Không có hình"; }?></p></td>
    </tr>
    <tr>
      <td bgcolor="#00FFFF" style="text-align: center; font-weight: bold;">Sắp xếp</td>
      <td bgcolor="#CCCCCC"><label for="textfield"></label>
      <input name="sapxep" type="text" id="sapxep" value="<?php echo $row_banner['sapxep'];?>"/></td>
    </tr>
    <tr>
      <td><input name="xuly" type="hidden" id="xuly" value="1">
      <input name="idBanner" type="hidden" id="idBanner" value="<?php echo $row_banner['idBanner']; ?>" /></td>
      <td><p>
        <input type="submit" name="btnluu" id="btnluu" value="   Lưu   ">
      </p>
      <p align="center"><font color="#0099FF" size="+2" ><?php
      	if(isset($_POST['btnluu'])){
			echo " Sửa thành công";
		}
	  ?></font></p></td>
    </tr>
  </table>
</form>
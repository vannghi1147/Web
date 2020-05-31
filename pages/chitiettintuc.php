<?php 
	//require_once('../system/config.php');
	//require_once('../system/function.php');

	$IDtintuc=(isset($_GET['id']))?$_GET['id']:'';
	// Tang so luot xem
	// Kiem tra san pham nay da tang so luot chua ?
	if(!isset($_SESSION["sp$IDtintuc"])){
		$sql = "UPDATE tintuc SET soluot = soluot + 1 WHERE IDtintuc = $IDtintuc";
		$result = mysql_query($sql);
		$_SESSION["sp$IDtintuc"]=1;
	}	
	$sql = "SELECT * FROM tintuc WHERE IDtintuc = $IDtintuc";
	$result = mysql_query($sql);
	$r = mysql_fetch_assoc($result);	
	
?>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0">
  <tr>
        <td colspan="3">
    	<div class="tieude-sanpham">
				<h3><span>Chi tiết tin tức</span></h3>
		</div>
    </td>
  </tr>
</table>
<div id="tintuc">
<div class="detail">
	<div class="tentintuc">Tên tin tức: <?php echo $r['tintuc']; ?></div>
    <div class="soluot">Số lượt xem: <?php echo $r['soluot']." lượt"; ?></div>
	<div class="hinh"><img src="upload/tintuc/<?php echo $r['hinhanh']; ?>" alt="" name="" width="534" height="348" /></div>
    <?php /*?><div class="gioithieu" style="text-align:center"><?php echo $r['gioithieu']; ?></div><?php */?>
    <div class="chitiettin"><?php echo $r['chitiet']; ?></div>
</div>
</div>
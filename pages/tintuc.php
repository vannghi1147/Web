
<?php
	//require_once("../lib/dbcon.php");
	//require_once('../system/function.php');	
	

	$sql = "SELECT * FROM tintuc ORDER BY sapxep DESC";

	//echo $sql;
	$result = mysql_query($sql);
	
?>

<table width="100%" border="0">
  <tr>
        <td colspan="3">
    	<div class="tieude-sanpham">
				<h3><span>Tin tức</span></h3>
		</div>
    </td>
  </tr>
</table>

<div id="tintuc">
<?php while($r = mysql_fetch_assoc($result)){ ?>
<div class="item3">
	<div class="tentintuc"><a href="?p=chitiettintuc&id=<?php echo $r['IDtintuc']?>"><?php echo $r['tintuc']; ?></a></div>
    <div class="ngaydang">Ngày đăng: <?php echo $r['ngaydang']; ?></div>
    <div class="soluot">Số lượt xem: <?php echo $r['soluot']." lượt"; ?></div>
	<img name="" src="upload/tintuc/<?php echo $r['hinhanh']; ?>" alt="" />
    <span class="gioithieu"><?php echo $r['gioithieu']; ?></span>
</div>
<?php } ?>
</div>

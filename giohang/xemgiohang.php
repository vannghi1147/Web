<?php
//session_start();
error_reporting(0);
mysql_connect("localhost","root","");
mysql_select_db("webdoan");
mysql_query("set names 'utf8'");
if(!isset($_SESSION["dayHinhAnh"]))$_SESSION["dayHinhAnh"]==array();
if(!isset($_SESSION["dayTenSP"]))$_SESSION["dayTenSP"]==array();
if(!isset($_SESSION["dayDonGia"]))$_SESSION["dayDonGia"]==array();
if(!isset($_SESSION["daySoLuong"]))$_SESSION["daySoLuong"]==array();	
if(isset($_GET['action'])){
	$idSP=$_GET['idSP'];
	settype($idSP,"int");
	$qr="SELECT * FROM sanpham
		  WHERE idSP=$idSP";
	$row=mysql_query($qr);
	$giohang=mysql_fetch_array($row);	
	$_SESSION["dayidSP"][$idSP]=$giohang['idSP'];
	$_SESSION["dayTenSP"][$idSP]=$giohang['TenSP'];
	$_SESSION["dayDonGia"][$idSP]=$giohang['Gia'];
	$_SESSION["dayHinhAnh"][$idSP]=$giohang['UrlHinh'];
	$_SESSION["daySoLuong"][$idSP]+=1;

}

?>

<?php
$sosp = count($_SESSION["dayTenSP"]);
?>

<?php
if($sosp>0) {
?>
<table width="100%" border="0">
  <tr>
    <td colspan="7">
    	<div class="tieude-sanpham">
				<h3> Chi tiết giỏ hàng</h3>
		</div>
    </td>
  </tr>
  <tr style="text-align:center; color:#FC0; font-size:20px">
  	<td height="38">STT</td>
    <td>Hình ảnh</td>
    <td>Tên sản phẩm</td>
    <td>Đơn giá</td>
    <td>Số lượng</td>
    <td>Thành tiền</td>
    <td>&nbsp;</td>
  </tr>
  <?php 
     $tongsoluong=0; 
     $tongtien=0;
     $a=1;	
	//reset($_SESSION["dayidSP"]);
    reset($_SESSION["dayHinhAnh"]);
  	reset($_SESSION["dayTenSP"]);
	reset($_SESSION["dayDonGia"]);
	reset($_SESSION["daySoLuong"]);	
  for($i=0; $i < $sosp; $i++) {	
  ?>
  <tr style="color:#CCC;text-align:center">
    <td><?php echo $a++;?></td>
     <td style="text-align:center"><img src="upload/sanpham/hinhchinh/<?php echo current($_SESSION["dayHinhAnh"])?>" width="123" height="94" /></td>
    <td><?php echo current($_SESSION["dayTenSP"]) ?></td>
    <td><?php echo number_format(current($_SESSION["dayDonGia"])) ?> VNĐ</td>
    <td><?php $sl=current($_SESSION["daySoLuong"]);
			  echo $sl;		  
			   ?></td>
    <td><?php $thanhtien = current($_SESSION["dayDonGia"]) * current($_SESSION["daySoLuong"]);
			  echo number_format($thanhtien);
	?>
VNĐ</td>
    <td><a href="index.php?p=xoagiohang$idSP=<?php echo number_format(current($_SESSION["dayidSP"])) ;?>"><img src="images/close_pop.png" width="32" height="32" alt="Xóa" /></a></td>
  </tr>
  <?php  
  	//next($_SESSION["dayidSP"]);	
    next($_SESSION["dayHinhAnh"]);
  	next($_SESSION["dayTenSP"]);
	next($_SESSION["dayDonGia"]);
	next($_SESSION["daySoLuong"]);
	$tongtien = $tongtien + $thanhtien;
	$tongsoluong=$tongsoluong+$sl;
  }
  ?>
</table>
<hr>
<table width="100%" border="0" style="margin-top:10px;text-align:center"> 
  <tr>
    <td style="font-size:20px;color:#CCC;text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tổng tiền </td>
    <td style="text-align:left;color:#F90"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($tongtien) ?></td>
    <td style="text-align:left;color:#F90">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size:20px;color:#CCC;text-align:right">Tồng số lượng</td>
    <td style="text-align:left; color:#F90"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tongsoluong;?></td>
    <td style="text-align:left; color:#F90">&nbsp;</td>
  </tr>
  <tr style="font-size:20px;color:#CCC">
    <td width="28%" style="text-align:right">&nbsp;&nbsp;Tiếp tục mua hàng <a href="index.php"><img src="images/them.png" alt="Tiếp tục mua hàng" width="40" height="40" align="absmiddle" /></a></td>
    <td width="36%" style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Xóa tất cả <a href="index.php?p=xoagiohang"><img src="images/xoa.png" alt="Xóa hết sản phẩm" width="40" height="40" align="absmiddle" /></a></td>
    <td width="36%" style="text-align:left">&nbsp;&nbsp;&nbsp;Liên hệ đặt hàng <a href="index.php?p=lienhedathang"><img src="images/shopping-cart-icon.png" width="40" height="40" align="absmiddle" /></a></td>
  </tr>
</table>

<?php
}else{
	echo "Chưa có sp trong giỏ";	
}
?>
<hr>

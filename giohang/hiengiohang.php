<?php
error_reporting(0);
session_start();
mysql_connect("localhost","root","");
mysql_select_db("webdoan");
mysql_query("set names 'utf8'");
//require("../lib/dbcon.php");
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
	$_SESSION["dayTenSP"][$idSP]=$giohang['TenSP'];
	$_SESSION["dayDonGia"][$idSP]=$giohang['Gia'];
	$_SESSION["dayHinhAnh"][$idSP]=$giohang['UrlHinh'];
	$_SESSION["daySoLuong"][$idSP]+=1;

}

?>

<?php
$sosp = count($_SESSION["dayTenSP"]);	
	if($sosp>=0) {
?>	

    <span style="font-size:14px"><font color="#000000">Số sản phẩm:</font><font color="#FF0000">
    <?php  
	$soluong=0;	
	$tongtien=0;
	 reset($_SESSION["dayHinhAnh"]);
	reset($_SESSION["dayTenSP"]);	
	reset($_SESSION["dayDonGia"]);	  			
    reset($_SESSION["daySoLuong"]);
     for($i=0; $i < $sosp; $i++) {	
    ?>
     <input name="soluong" type="hidden" value="<?php $sl=current($_SESSION["daySoLuong"]) ?>">
     <input name="tien" type="hidden" value="<?php number_format($thanhtien = current($_SESSION["dayDonGia"]) * current($_SESSION["daySoLuong"]))?>"> 
     <?php
	 	 next($_SESSION["dayHinhAnh"]);
	 	next($_SESSION["dayTenSP"]);
	    next($_SESSION["daySoLuong"]);
		next($_SESSION["dayDonGia"]);
		$soluong=$soluong+$sl;			
		$tongtien = $tongtien + ($thanhtien);			
      }
      ?>
      <?php echo number_format($soluong);?>
    </font></span>
    
    
    
    <span style="font-size:14px"><font color="#000000">Tổng tiền:</font><font color="#FF0000">
    <?php echo number_format($tongtien);?>
    </font></span>
    <span style="font-size:14px"> - <a style="text-decoration:none" href="index.php?p=xoagiohang"> <font color="#000000">Xóa tất cả</font></a></span>
    <span style="font-size:14px"> - <a style="text-decoration:none" href="index.php?p=xemgiohang"><font color="#000000">Giỏ hàng</font></a></span>  
    
<?php
}else{	
?>
	
gdfgdfgdf
	<?php /*?><div style="margin-top:-100px;margin-left:50px" >
	<span>Số sản phẩm:<font color="#FF0000">0</font></span>  
    <span>Tổng tiền:<font color="#FF0000">0</font></span>
    <span> - Xóa tất cả</span>
    <span> - Giỏ hàng</span>  
    </div> <?php */?>
<?php
}
?>
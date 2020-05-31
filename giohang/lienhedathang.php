<?php
error_reporting(0);
$xuly=(isset($_POST['xuly']))?1:0;
if($xuly){
	if(isset($_SESSION['idUser'])){
		if($_SESSION['code']==$_POST['code']){
			$idUser = $_SESSION['idUser'];
			$ThoiDiemDatHang = $_POST["ThoiDiemDatHang"];
			$TenNguoiNhan = $_POST["TenNguoiNhan"];		
			$TenNguoiNhan = $_POST["TenNguoiNhan"];
			$DiaDiemGiaoHang = $_POST["DiaDiemGiaoHang"];
			$TinhTrang=0;
			$GhiChu = $_POST["GhiChu"];
			$qr = "INSERT INTO donhang
					VALUES(
						null,
						$idUser,
						'$ThoiDiemDatHang',
						'$TenNguoiNhan',
						'$DiaDiemGiaoHang',
						$TinhTrang,
						'$GhiChu'
					)
			";
			mysql_query($qr);
			
			$idDH = mysql_insert_id();
			
			reset($_SESSION["dayTenSP"]);
			reset($_SESSION["dayDonGia"]);
			reset($_SESSION["daySoLuong"]);
			$sosp = count($_SESSION["dayTenSP"]);
			for($i=0; $i < $sosp; $i++) {
				 $idSP = key($_SESSION["dayTenSP"]);
				 $SoLuong = current($_SESSION["daySoLuong"]);
				 $ThanhTien = $SoLuong * current($_SESSION["dayDonGia"]);
				 $qr = "INSERT INTO donhangchitiet 
						VALUES(
							null,
							$idDH ,
							$idSP ,
							$SoLuong ,
							$ThanhTien
						)
				 ";
				 mysql_query($qr);
				 
				 next($_SESSION["dayTenSP"]);
				 next($_SESSION["dayDonGia"]);
				 next($_SESSION["daySoLuong"]);		
			}
		
		}else{
			$msg = "<font color='#CCCCCC' style='font-size:16px' > Mã xác nhận sai, vui lòng nhập lại thông tin </font>";
		}
	}else{
		$thongbao="<font color='#CCCCCC'>Bạn phải đăng nhập mới được đặt hàng </font>";
		$dnhap="<a style='text-decoration:none;color:#FC0;font-size:20px' href='#login-box' class='login-window'>&nbsp;&nbsp;Đăng nhập</a>";
	}
}
?>
<table width="100%" border="0">
  <tr>
            <td colspan="7">
                <div class="tieude-sanpham">
                        <h3> Liên hệ đặt hàng</h3>
                </div>
            </td>
  </tr>
</table>
<form action="" method="post" name="form_dathang" id="form_dathang">
<table width="600" border="0" align="center">    	
        <tr>
            <td width="200" align="right" style="color:#CCC">Tên người nhận:</td>
            <td><input style="width:250px;margin-left:20px" type="text" name="TenNguoiNhan" id="TenNguoiNhan"></td>
        </tr>
        <tr>
            <td width="200" align="right" style="color:#CCC">Địa điểm giao hàng:</td>
            <td><input style="width:250px;margin-left:20px" type="text" name="DiaDiemGiaoHang" id="DiaDiemGiaoHang"></td>
        </tr>
        <tr>
            <td width="200" height="142" align="right" style="color:#CCC">Ghi chú:</td>
            <td><textarea style="width:250px;margin-left:20px" name="GhiChu" id="GhiChu" cols="45" rows="10"></textarea></td>
        </tr>
        <tr>
          <td align="right" style="color:#CCC"> Mã xác nhận</td>
          <td ><label for="code"></label>
          <input style="width:250px;margin-left:20px" type="text" name="code" id="code" /> 
          <img src="lib/captchas.php" width="53" height="22" align="absmiddle" /></td>
        </tr>
        <tr>
          <td height="62" colspan="2" align="center"><input style="width:100px;height:40px" type="submit" name="btnThanhToan" id="btnThanhToan" value="  Thanh toán   " /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
            <?php 
		if($xuly){
			if(!isset($msg) && isset($_SESSION['idUser'])){ 
		  		echo "<font color='#CCCCCC' style='font-size:16px' >Đơn đặt hàng của bạn đã được gửi thành công--- Chúng tôi sê sớm liên hệ với bạn</font>";
			}else{
				echo $thongbao;	
				echo $dnhap;			
				echo $msg;
			}
		}
	  ?>  
       </td>
        </tr>
    </table>
    <input name="idUser" type="hidden" id="idUser" value="22" />
  <input name="ThoiDiemDatHang" type="hidden" id="ThoiDiemDatHang" value="<?php echo date('Y-m-d'); ?>" />
  <input name="xuly" type="hidden" id="xuly" value="1" />
</form>

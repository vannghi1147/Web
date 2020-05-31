<link href="../css/css.css" rel="stylesheet" type="text/css">
<?php
	$TenSP_KD=$_GET['TenSP_KD'];
			
	//mysql_query("UPDATE sanpham
		//	SET SoLanXem=SoLanXem+1
			//WHERE idSP=$idSP");
	$row_sanpham=chitietsanpham($TenSP_KD);
	$idloaisp=$row_sanpham['idLoai'];
	$idSP=$row_sanpham['idSP'];
?>
<?php
	$chitietsp=chitietsanpham($TenSP_KD);
		$idloaisp=$chitietsp['idLoai'];
		$idSP=$chitietsp['idSP'];
?>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<table width="100%" style="color:#CCC;float:left">
  <tr >
    <td colspan="3">
    	<div class="tieude-sanpham">
				<h3><span>Sản phẩm <?php echo $chitietsp['TenSP'] ?></span></h3>
		</div>
    </td>
  </tr>
  <tr>
    <td width="20%" rowspan="6" align="center" style="margin-left:10px"><img src="upload/sanpham/hinhchinh/<?php echo $chitietsp['UrlHinh'] ?>" width="187" height="179" /></td>
    <td colspan="2" style="font-size:18px;color:#F90;text-transform:uppercase;text-align:left;padding-left:150px"><?php echo $chitietsp['TenSP'] ?></td>
  </tr>
  <tr>
    <td width="20%" style="text-align:left;padding-left:10px" >Loại sản phẩm</td>
    <td width="60%" style="text-align:left;padding-left:10px"><?php echo $chitietsp['TenLoai'] ?></td>
  </tr>
  <tr>
    <td style="text-align:left;padding-left:10px">Nhà sản xuất</td>   
    <td style="text-align:left;padding-left:10px"><?php echo $chitietsp['NhaSX'] ?></td>
  </tr>
  <tr>
    <td style="text-align:left;padding-left:10px">Thời gian bảo hành</td>
    <td style="text-align:left;padding-left:10px"><?php echo $chitietsp['BaoHanh'] ?> tháng</td>
  </tr>
  <tr>
    <td style="text-align:left;padding-left:10px">Giá bán</td>
    <td style="text-align:left;padding-left:10px;font-size:20px"><font color="#FF0000"><?php echo number_format($chitietsp['Gia']) ?></font> VNĐ</td>
  </tr>
  <tr>
    <td colspan="2" style="text-align:left;padding-left:10px">    

    <div id="cart"><a class="dathang" idSp="<?php echo $row_spmoi['idSP'] ?>"href="index.php?p=xemgiohang">Đặt mua</a></div>  
    
    </td>
  </tr>
</table>
<div class="clear"></div>
<div class="gachchan"></div>
<div class="clear"></div>
<table width="100%" border="0" style="margin-top:20px;color:#FFF;float:left">
  <tr>
    <td style="text-align:left;padding-left:20px"><?php echo $chitietsp['MoTa'] ?></td>
  </tr>
  <tr>
    <td style="text-align:center;padding-top:10px;padding-bottom:10px"><img src="upload/sanpham/hinhchinh/<?php echo $chitietsp['UrlHinh'] ?>" width="559" height="301" /></td>
  </tr>
</table>
<div id="tabchitiet" style="float:left">
  <div id="TabbedPanels1" class="TabbedPanels">
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">Mô tả</li>
      <li class="TabbedPanelsTab" tabindex="0">Bài viết</li>
    </ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
      	<?php
            	$mota=motachitiet($idSP);
				$row_mota=mysql_fetch_array($mota);
			?>
            <table width="698px" border="1" cellspacing="0" >
                  <tr>
                    <td colspan="2" style="text-align:center;font-size:24px">Thông số chi tiết <?php echo $chitietsp['TenSP']?></td>
                  </tr>
                  <tr>
                    <td width="35%" style="text-align:left;padding-left:10px">Chất liệu</td>
                    <td width="65%" style="text-align:left;padding-left:10px"><?php echo $row_mota['ChatLieu'] ?></td>
                  </tr> 
                  <tr>
                    <td style="text-align:left;padding-left:10px">Kích thước</td>
                    <td style="text-align:left;padding-left:10px"><?php echo $row_mota['KichThuoc'] ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding-left:10px">Màu sắc</td>
                    <td style="text-align:left;padding-left:10px"><?php echo $row_mota['MauSac'] ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding-left:10px">Công nghệ sản xuất</td>
                    <td style="text-align:left;padding-left:10px"><?php echo $row_mota['CongngheSX']; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding-left:10px">Tiêu chuẩn kỹ thuật</td>
                    <td style="text-align:left;padding-left:10px"><?php echo $row_mota['TieuChuanKT'];?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding-left:10px">Ưu nhược điểm</td>
                    <td style="text-align:left;padding-left:10px"><?php echo $row_mota['UuNhuoc'] ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding-left:10px">Thời gian giao hàng</td>
                    <td style="text-align:left;padding-left:10px"><?php echo $row_mota['GiaoHang'] ?></td>
                  </tr>
            </table>
      
      </div>
      <div class="TabbedPanelsContent">
			<?php echo $chitietsp['baiviet']?>
      </div>
    </div>
  </div>
</div>
 <div class="clear"></div>
<table width="100%" border="0" style="float:left">
	<tr>
    	<td >
    		<div class="tieude-sanpham">
				<h3><span>Sản phẩm cùng loại</span></h3>
			</div>
        </td>
    </tr>
	<tr>
    <?php
    	$spmoi=sanphamcungloai($idloaisp);
		while($row_spmoi=mysql_fetch_array($spmoi)){
	?>
    <td style="float:left; margin-left:5px;margin-right:5px" width="162px" height="280px">
        	<table width="162" border="0" cellspacing="3" cellpadding="3" align="center" >
           <tr>
                <td colspan="2" height="40" style="text-align:center">
                    <a href="index.php?p=chitietsanpham&TenSP_KD=<?php echo $row_spmoi['TenSP_KD'] ?>" class="tensp"> 
                    <?php echo $row_spmoi['TenSP']?></a>
                 </td>
           </tr>
           <tr>
                <td colspan="2" align="center">
            	<div class="thumbnail-item">
               <a href="index.php?p=chitietsanpham&TenSP_KD=<?php echo $row_spmoi['TenSP_KD'] ?>"><img src="upload/sanpham/hinhchinh/<?php echo $row_spmoi['UrlHinh']?>" 00="" align="center" width="156" height="128" border="0" title="<?php echo $row_spmoi['TenSP']?>" alt="<?php echo $row_spmoi['TenSP']?>" id="img_preview">
                </a>
                <div class="tooltip">
                 <img src="upload/sanpham/hinhchinh/<?php echo $row_spmoi['UrlHinh']?>" alt="" width="350" height="300" />
				</div> 
				</div>
                 </td>
           </tr>
           <tr>
                <td colspan="2" align="center" height="25">         
                    <span class="giaban">
                        <?php echo $row_spmoi['Gia']?> VNĐ			
                    </span>            
            
             	</td>
           </tr>              
           <tr>
                    <td width="140"  height="60x" >             

                        <div id="cart"><a class="dathang" idSp="<?php echo $row_spmoi['idSP'] ?>"href="index.php?p=xemgiohang">Đặt mua</a></div>        		        
                    </td>
           </tr>            	
         </table>	
	</td>
    <?php
		}
	?>
    </tr>
</table>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>

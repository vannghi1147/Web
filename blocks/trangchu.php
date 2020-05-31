<link href="../css/css.css" rel="stylesheet" type="text/css">
<?php
	//require("../lib/trangchu.php");
	//require("../lib/dbcon.php");
	//$idloai=$_GET['idLoai'];
	//settype($idloai,"int");
	
?>
<table width="100%" border="0" style="float:left" >
	<tr>  
    	<td >
   			<div class="tieude-sanpham">
				<h3>Sản phẩm mới nhất</h3>
			</div>
        </td>
    </tr>
	<tr>
    <?php
    	$spmoi=sanphammoi();
		while($row_spmoi=mysql_fetch_array($spmoi)){
	?>
	<td style="float:left; margin-left:5px;margin-right:5px;margin-bottom:10px" width="162px" height="280" >
        	<table width="162" border="0" cellspacing="3" cellpadding="3" align="center" >
           <tr>
                <td colspan="2" height="40" style="text-align:center">
                    <a href="#" class="tensp"> 
                    <?php echo $row_spmoi['TenSP']?></a>
                 <img src="images/news.gif" width="20" height="12" /></td>
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
                        <?php echo number_format($row_spmoi['Gia'])?> VNĐ			
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

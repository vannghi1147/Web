<link href="../css/css.css" rel="stylesheet" type="text/css">
<?php
	//require("../lib/trangchu.php");
	//require("../lib/dbcon.php");
	//$idloai=$_GET['idLoai'];
	//settype($idloai,"int");
	if(isset($_GET['page']))
		{
			$page=$_GET['page'];
			settype($page,"int");
		}else{
			$page=1;
		}
	$from=($page-1)*SOTRANGCL;	
	
?>
<table width="100%" border="0" style="float:left" >
	<tr>  
    	<td >
   			<div class="tieude-sanpham">
				<h3>Sản phẩm nội thất</h3>
			</div>
        </td>
    </tr>
	<tr>
    <?php
    	$spmoi=sanpham($from);
		while($row_spmoi=mysql_fetch_array($spmoi)){
	?>
	<td style="float:left; margin-left:5px;margin-right:5px;margin-bottom:10px" width="162px" height="280" >
        	<table width="162" border="0" cellspacing="3" cellpadding="3" align="center" >
           <tr>
                <td colspan="2" height="40" style="text-align:center">
                    <a href="#" class="tensp"> 
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
<div id="tintrongloai_phantrang">
<?php
	$tam=mysql_query("SELECT *
		   	  		  FROM sanpham");
	$sotin=mysql_num_rows($tam);
	$sotrang=$sotin/SOTRANGCL;	
	$tongsotrang=ceil($sotrang);
	for($i=1;$i<=$tongsotrang;$i++)
	{
?>
	<a <?php if($i==$page){ echo "style='background-color:#F00'"; }?> href="index.php?p=noithat&page=<?php echo $i; ?> "><?php echo $i; ?></a>
<?php
	}
?>
<div id="sotrang">Trang <?php echo $page." / ". $tongsotrang ?></div>
</div>
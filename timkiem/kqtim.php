<?php 
 	$tukhoa=$_GET['tukhoa'];
	$min=$_GET['min'];
		settype($min,"int");
	$max=$_GET['max'];
		settype($max,"int");
	if(isset($_GET['page']))
		{
			$page=$_GET['page'];
			settype($page,"int");
		}else{
			$page=1;
		}
	$from=($page-1)*SOTRANG;	
?>
<?php 
		if($tukhoa!=''){
?>
<table width="100%" border="0" style="float:left">
	<tr>  
    	<td >
   			<div class="tieude-sanpham">
				<h3>Từ khóa đang tìm: <?php echo $tukhoa; ?> - Giá từ <?php echo number_format($min)?>  - Đến <?php echo number_format($max)?> </h3>
			</div>
        </td>
    </tr>    
	<tr>  
     <?php 
		$tin=timkiem($tukhoa,$min,$max,$from);
		while($row_spmoi=mysql_fetch_array($tin)){			
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
	$tam=mysql_query("SELECT sanpham.*,loaisp.*
		   	 		  FROM sanpham,loaisp		     		  
			    	  WHERE sanpham.idLoai=loaisp.idLoai
					  AND TenSP REGEXP '$tukhoa'
					  AND (Gia BETWEEN $min AND $max)");
	//$row_timkiem=mysql_fetch_array($tam);
	$sotin=mysql_num_rows($tam);
	$sotrang=$sotin/SOTRANG;	
	$tongsotrang=ceil($sotrang);
	for($i=1;$i<=$tongsotrang;$i++)
	{
?>
	<a <?php if($i==$page){ echo "style='background-color:#F00'"; }?> href="index.php?tukhoa=<?php echo $tukhoa;?>&min=<?php echo $min ;?>&max=<?php echo $max ;?>&p=timkiem&page=<?php echo $i; ?> "><?php echo $i; ?></a>
<?php
	}
?>
<div class="clear"></div>
<div id="sotrang">Trang <?php echo $page." / ". $tongsotrang ?></div>
</div>  
<?php
		}else{		
?> 
<table width="100%" border="0" style="float:left">
	<tr>  
    	<td >
   			<div class="tieude-sanpham">
				<h3>Từ khóa đang tìm: <?php echo $tukhoa; ?></h3>
			</div>
        </td>
    </tr>  
    <tr>
    	<td>
           <font color="#CCCCCC" style="font-size:20px"> Không tìm thấy từ khóa</font>
        </td>
    </tr>  
</table>
<?php
		}
?>
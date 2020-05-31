<?php
	$qr=mysql_query("SELECT * FROM loaisp");
	while($row_loaisp=mysql_fetch_array($qr)){	
?>
	<a title="<?php echo $row_loaisp['TenLoai'];?>" style="display:block;" class="dongssanpham" href="index.php?p=sphamtrongloai&TenLoai_KD=<?php echo $row_loaisp['TenLoai_KD'];?>"><?php echo $row_loaisp['TenLoai'];?></a>
<?php
	}
?>
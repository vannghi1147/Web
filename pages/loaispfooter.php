 <marquee direction="right" onmousemove="this.stop();" onmouseout="this.start();" scrollamount="3" scrolldelay="10">
    <?php
        $qr=mysql_query("SELECT * FROM loaisp ORDER BY idLoai DESC");
        while($row_loaisp=mysql_fetch_array($qr)){	
    ?>
      <font color="#FFFFFF">|| </font> <a href="index.php?p=sphamtrongloai&TenLoai_KD=<?php echo $row_loaisp['TenLoai_KD'];?>"><?php echo $row_loaisp['TenLoai'];?></a>
	<?php
		}
	?>
    </marquee>    

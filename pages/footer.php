<ul>
       
<?php
	$qr=mysql_query("SELECT * FROM menu");
	while($row_menu=mysql_fetch_array($qr)){
?>
     <li><a href="index.php?p=<?php echo $row_menu['Link'];?>"><?php echo $row_menu['TenMenu'];?></a></li>  
<?php
	}
?>                    
</ul>


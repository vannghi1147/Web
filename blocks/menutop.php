<ul id="MenuBar1" class="MenuBarHorizontal">
<?php
	$menu=mysql_query("select *from menu");
	while($row=mysql_fetch_array($menu)){
?>
  <li><a  class="MenuBarItemSubmenu" href="index.php?p=<?php echo $row['Link'];?>"><?php echo $row['TenMenu']?></a>  	  
  </li>  
   <?php
 	}
 
 ?>
</ul>



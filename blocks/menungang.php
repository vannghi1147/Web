<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<ul id="MenuBar1" class="MenuBarHorizontal">
<?php
$menu=mysql_query("select *from menu");
while($row=mysql_fetch_array($menu))
{
?>
<li><a href="index.php?p=<?php echo $row['link']; ?>" class="MenuBarItemSubmenu"><?php echo $row['TenMenu']?></a>
    <ul>
    
    <?php
	if($row['hienCL']==1)
	{
		$chungloai=mysql_query("select *from chungloai");
		while($row_chungloai=mysql_fetch_array($chungloai)){
	?>
      	<li><a href="index.php?p=chungloai&idCL=<?php echo $row_chungloai['idCL'];?>"><?php echo $row_chungloai['TenCL'];?></a></li>
	<?php
     }
        }
     ?>
</ul>
  </li>
  
 <?php
 }
 
 ?>
</ul>


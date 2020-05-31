<div>
Chào 
  <?php 
  	if($_SESSION['GioiTinh']==1){
		echo " anh ".$_SESSION['HoTen'];
	}else{ 
		echo " chị ".$_SESSION['HoTen'];
	}	
	?> 
<?php
	if(isset($_SESSION['idUser']) && $_SESSION['idGroup']==1){
?>
 &nbsp;&nbsp;<a style="text-decoration:none;color:#FC0" href="admin/index.php" class="quantri">Trang Quản Trị </a>
  <?php
	}
?>
  <a style="text-decoration:none;color:#FC0" class="dangxuat" href="login/logout.php"> --- Đăng xuất </a> -- <a style="text-decoration:none;color:#FC0" href="index.php?p=chgpass">Đổi mật khẩu</a></p>
</div>
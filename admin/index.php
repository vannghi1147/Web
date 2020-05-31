<?php	
	ob_start();
	session_start();
	if(!isset($_SESSION['idUser']) && $_SESSION['idGroup']!=1){
		header("location:../index.php");
	}else{
	require_once("../lib/dbcon.php");
	//require_once("../system/function.php");	
	
	//$link=db_connect();	
	//if(!checklogin()){
		//header("Location:login.php");
	//}
	$sql=("SELECT * FROM loaisp");
	
	$p=(isset($_GET['p'])?$_GET['p']:'loaisanpham');
	$action=(isset($_GET['action'])?$_GET['action']:'');
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Noi dung keyword giup SEO tren Google" />
<title>Shop _ DB</title>
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container">
      <div id="header" align="center">Quản trị website Nội Thất Dang Dang</div>
      <div id="content">
        <div id="left">
          <div class="title1" align="center">Menu</div>
          <div class="content">
            <ul>
              <li><a href="../index.php">Xem trang chủ <img src="../images/home_48.png" alt="Trang chủ" width="48" height="40" align="absmiddle" /></a></li>
              <li><a href="?p=loaisanpham">Danh sách loại sản phẩm</a></li>
              <li><a href="?p=sanpham">Danh sách sản phẩm</a></li>              
              <li><a href="?p=tintuc">Danh sách tin tức</a></li>
              <li><a href="?p=users">Danh sách USERS</a></li>
              <li><a href="?p=banner">Danh sách Banner</a></li>
              <li><a href="?p=dondathang">Đặt hàng</a></li> 
              <li><a href="?p=logout">Logout</a></li>
              <li><a href="?p=chgpass">Đổi mật khẩu</a></li>
             
            </ul>
          </div>
        </div>
        <div id="right">
          <div class="title2">Nội dung quản trị      
          <input type="button" name="btnThem" id="btnThem" value="   Thêm mới   " onclick="location.href='<?php  echo "?p=$p&action=add";?>';" />
          </font>
        
          </div>
          <div class="content">
            	<?php  
					switch($action){
						case "add":{ 
							require_once("$p-add.php");
							break;
						}
						case "edit":{ 
							require_once("$p-edit.php");
							break;
						}
						case "del":{ 
							require_once("$p-del.php");
							break;
						}
						default:
							require_once("$p.php");							
					}									
				?>
          </div>
        </div>
        <div class="clear"></div>
      </div>
      <div id="footer">&copy; Bản quyền thuộc về Nhóm 9 - IT</div>
      </div>
    </div>
</body>
</html>
<?php 
   error_reporting(0);
   unset($_SESSION["dayHinhAnh"]);
   unset($_SESSION["dayTenSP"]);
   unset($_SESSION["dayDonGia"]);
   unset($_SESSION["daySoLuong"]);
   header("location:index.php?p=xemgiohang");
?>
<?php	
	ob_start();
	session_start();
	require("../lib/dbcon.php");
	
	$username=$_POST["Username"];
	$password=$_POST["Password"];
	$password=md5($password);
	
	$qr=("SELECT *
		 from users 
		 WHERE Username='$username'
		 AND Password='$password'");
	$user=mysql_query($qr);
	$n=mysql_num_rows($user);
	if($n==1)
	{
		$row=mysql_fetch_array($user);
		$_SESSION["idUser"]=$row['idUser'];
		$_SESSION["Username"]=$row['Username'];
		$_SESSION["Password"]=$row['Password'];
		$_SESSION["HoTen"]=$row['HoTen'];
		$_SESSION["Email"]=$row['Email'];
		$_SESSION["GioiTinh"]=$row['GioiTinh'];
		$_SESSION["idGroup"]=$row['idGroup'];		
	}
	header("location:".$_SESSION['url']);
?>
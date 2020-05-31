<?php 
	session_start();
	//Remmember start session
	//imagecreatefromgif :: create a new image 
	//from file or URL
	$img = imagecreatefromgif("../images/bg-captcha.gif"); 
	//displaying the random text on the captcha 
	$numero = rand(1000, 9999); 
	// Copy code to before form
	$_SESSION['code'] = $numero; 
	//The function imagecolorallocate creates a 
	//color using RGB (red,green,blue) format.
	$white = imagecolorallocate($img, 255, 255, 255); 
	imagestring($img, 10, 8, 3, $numero, $white);
	header ("Content-type: image/gif"); imagegif($img); 
?>
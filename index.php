<?php 		
	session_start();	
	ob_start();
	require("lib/trangchu.php");
	require("lib/dbcon.php");
	require_once("system/config.php");
	require_once("system/function.php");
	$_SESSION['url']=$_SERVER['REQUEST_URI'];	
	error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title> 
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js' type='text/javascript'></script>
<script type="text/javascript" src="jquery-1.8.2.min.js"></script>
<script>
	$(document).ready(function() {
		$(".dathang").click(function(){
			var masp=$(this).attr("idSP");
			//alert(masp);
			$.get("giohang/hiengiohang.php",{idSP:masp,action:'add'},function(data){
				$("#giohang").html(data);				
			});
		});
	});
</script>
<!-----Dang nhap-------->
<link href="css/dangnhap.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function() {
		<!--From dang nhap-->
		$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
	<!--End From Dang nhap-->
});
</script>
<!---END dang nhap-->	
<!------TOoltip-------->
	<link href="css/tooltip.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">

	// Load this script once the document is ready
	$(document).ready(function () {
		
		// Get all the thumbnail
		$('div.thumbnail-item').mouseenter(function(e) {

			// Calculate the position of the image tooltip
			x = e.pageX - $(this).offset().left;
			y = e.pageY - $(this).offset().top;

			// Set the z-index of the current item, 
			// make sure it's greater than the rest of thumbnail items
			// Set the position and display the image tooltip
			$(this).css('z-index','15')
			.children("div.tooltip")
			.css({'top': y + 10,'left': x + 20,'display':'block'});
			
		}).mousemove(function(e) {
			
			// Calculate the position of the image tooltip			
			x = e.pageX - $(this).offset().left;
			y = e.pageY - $(this).offset().top;
			
			// This line causes the tooltip will follow the mouse pointer
			$(this).children("div.tooltip").css({'top': y + 10,'left': x + 20});
			
		}).mouseleave(function() {
			
			// Reset the z-index and hide the image tooltip 
			$(this).css('z-index','1')
			.children("div.tooltip")
			.animate({"opacity": "hide"}, "fast");
		});

	});


	</script>
<!--------------->
<!--Chi tiet--------------->
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<!----------END Chi tiet---------->
<!--BANNER--->
<link rel='stylesheet' id='camera-css'  href='script/banner/camera.css' type='text/css' media='all'> 
<style>
		#back_to_camera {
			clear: both;
			display: block;
			height: 80px;
			line-height: 40px;
			padding: 20px;
		}
		.fluid_container {
			margin: 0 auto;
			max-width: 1000px;
			width: 100%;
		}
</style>

    <!--///////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //		Scripts
    //
    ///////////////////////////////////////////////////////////////////////////////////////////////////--> 
    
<script type='text/javascript' src='script/banner/jquery.min.js'></script>
    <script type='text/javascript' src='script/banner/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='script/banner/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='script/banner/camera.min.js'></script> 
    
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_1').camera({
				thumbnails: true
			});

			//jQuery('#camera_wrap_2').camera({
			//	height: '400px',
			//	loader: 'bar',
			//	pagination: false,
			//	thumbnails: true
			//});
		});
	</script>
<!----END BANNER--->
<!--Menu-->
     <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
     <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<!---END Menu--->
</head>
<body>  
<div id="wapper"> 	 
  <div id="content">
  	<div id="top">
        <div id="logo">
            <div class="hinhlogo">
            	<span class="hinhlogo"><img src="images/1.png" width="238" height="128" /></span>
            </div>
        </div>        
        <div id="menu">
        	<div id="dangnhap">  
			<?php
				if(isset($_SESSION['idUser'])){
					require("login/login_hello.php");
				}else{
			?>
            	  Chào bạn ,Bạn có thể <a href="#login-box" class="login-window">đăng nhập</a> hoặc <a style="text-decoration:none;color:#FC0" href="index.php?p=dangkythanhvien" class="dangky-window">tạo tài khoản</a>
            <?php
				}
		  ?>
                     
            </div>                    
        	<?php require("login/dangnhap.php");?>             			
            <?php require("blocks/menutop.php");?>   
          <script type="text/javascript">
				var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
			</script>
        </div>         
    </div>   
  	<div id="lefcontent">   
        <div class="timkiem">
                <div class="tieude-timkiem">Tìm kiếm</div>
                 <?php require("timkiem/timkiem.php");?>0
        </div>
        <div id="danhmucsanpham">
                <div class="tieude-timkiem">Danh mục sản phẩm</div>
                 <?php require("blocks/menudung.php");?>          
        </div>
         <div id="hotro">
                <div class="tieude-timkiem">Hỗ trợ</div>
                <div id="hinhhotro"><?php require("pages/hotro.php");?> </div>    	
         </div>  
        <div id="thongke">     	
                <div class="tieude-timkiem">Thống kê truy cập</div>
                <div id="sotruycap">
                    <img src="Hitcounter/counter.php" />
                </div>    	
         </div>     
    </div>	
    <div id="right-content">
    <?php
		$p=(isset($_GET['p'])?$_GET['p']:'trangchu');
    	if($p=='dangkythanhvien'){
				require("login/dangkythanhvien.php");
		}else{
	?>
      	<div id="banner">        
        	<?php require("pages/banner2.php");?>
           
        </div>
        <div id="noidung">
        	<p>
              <?php
            	$p=(isset($_GET['p'])?$_GET['p']:'trangchu');
				switch($p)
				{		
					case "noithat": 		require("pages/noithat.php");
											break;	
					case "chitietsanpham": 	require("pages/chitietsanpham.php");
											break;
					case "sphamtrongloai": 	require("pages/sphamtrongloai.php");
											break;
					case "sphamtheoCL": 	require("pages/sphamtheoCL.php");
											break;
					case "gioithieu": 		require("pages/gioithieu.php");
											break;	
					case "timkiem": 		require("timkiem/kqtim.php");
											break;
					case "xemgiohang": 		require("giohang/xemgiohang.php");
											break;
					case "lienhe": 		    require("pages/lienhe.php");
											break;	
					case "tintuc": 		    require("pages/tintuc.php");
											break;
					case "chitiettintuc": 	require("pages/chitiettintuc.php");
											break;	
					case "chgpass": 	    require("login/chgpass.php");
											break;															
					case "lienhedathang": 	require("giohang/lienhedathang.php");
											break;
					case "xoagiohang": 		require("giohang/xoagiohang.php");
											break;	
					case "xoasp": 			require("giohang/xoasp.php");
											break;	
					case "xoa1sp": 		    require("giohang/xoa1sp.php");
											break;																																															
					case "huongdan": 		require("pages/huongdan.php");
											break;							
					default :				require("blocks/trangchu.php");
				}
			?>
        	</p>
      </div>
      <?php } ?>
    </div>
    <div class="clear"></div>
    <div id="footer">
		<?php require("pages/footer.php");?> 
        <div class="clear"></div>
        <div id="noidungfooter">
        	<p>Công Ty TNHH Nội Thất MY HOME</p>
        	<p>Địa chỉ: 177C - Trần Văn Đang -Quận 3 - TP.HCM</p>
<p>Điện thoại: 0974.19.73.77</p>
        </div>
    </div>
  `</div>
<div id="chuchay">
	<?php require("pages/loaispfooter.php");?>
   
</div>   
<style type="text/css">  
    #co453569{display:block; margin:0; padding:0; background-color:#CCC; border-style:solid; border-width:0.5px; border-color:#111 #999 #999 #111; line-height:1.6em; overflow:hidden;border-left:solid 5px #000;border-top:solid 5px #000;color:#000;font: 12px Arial, Helvetica, sans-serif; color:#666; position:fixed; _position: absolute; right:0; bottom:0 }
  </style>            
        <div id="co453569" style="height:40px;width:450px"> 
          <!-- code ads -->
          <img src="images/cart-icon.png" width="30" height="25" style="margin-left:10px;margin-top:5px" />          
           <div id="giohang" style="margin-top:-20px;margin-left:45px" >         
          
		  <?php
          	require("giohang/hiengiohang.php");
		  ?>
          </div>
          <!-- code ads -->   
      </div>   

</div>
<?php require("blocks/chuyenlentren.php");?>
</body>
</html>
<?php
	error_reporting(0);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<style type="text/css">
    * html div#fl813691 {position: absolute; overflow:hidden;
    top:expression(eval(document.compatMode &&
    document.compatMode=='CSS1Compat') ?
    documentElement.scrollTop
    +(documentElement.clientHeight-this.clientHeight)
    : document.body.scrollTop
    +(document.body.clientHeight-this.clientHeight));}
    #fl813691{font: 12px Arial, Helvetica, sans-serif; color:#666; position:fixed; _position: absolute; right:0; bottom:0; }
    #eb951855{ width:430px; margin-bottom:20px; background:url(http://c.uploadanh.com/upload/2/49/0.4667527_2763_1.gif) no-repeat right top;}
    #cob263512{background:url(http://c.uploadanh.com/upload/2/49/0.4667526_2763_1.gif) no-repeat left top; height:50px; padding-left:7px;}
    #coh963846{color:#690;display:block; height:20px; line-height:20px; font-size:11px; width:172px;}
    #coh963846 a{color:#690;text-decoration:none;}
    #coc67178{float:right; padding:0; margin:0; list-style:none; overflow:hidden; height:15px;}
    #coc67178 li{display:inline;}
    #coc67178 li a{background-image:url(button.gif); background-repeat:no-repeat; width:30px; height:0; padding-top:15px; overflow:hidden; float:left;}
    #coc67178 li a.close{background-position: 0 0;}
    #coc67178 li a.close:hover{background-position: 0 -15px;}
    #coc67178 li a.min{background-position: -30px 0;}
    #coc67178 li a.min:hover{background-position: -30px -15px;}
    #coc67178 li a.max{background-position: -60px 0;}
    #coc67178 li a.max:hover{background-position: -60px -15px;}
    #co453569{display:block; margin:0; padding:0; height:500px; background-color:#CCC; border-style:solid; border-width:0.5px; border-color:#111 #999 #999 #111; line-height:1.6em; overflow:hidden;border-left:solid 5px #000;border-top:solid 5px #000;color:#000}
  </style> 
     <div id="fl813691" style="height:500px;"> 
      <div id="eb951855"> 
      <div id="cob263512">    
        <div id="coh963846"> 
          <ul id="coc67178"> 
            <li id="pf204652hide"><a class="min" href="javascript:pf204652clickhide();" title="Ẩn đi">Ẩn</a></li> 
            <li id="pf204652show" style="display: none;"><a class="max" href="javascript:pf204652clickshow();" title="Hiện lại">Xem </a></li>            
          </ul>          
        </div>
        <div id="co453569"> 
          <!-- code ads -->
          <img src="images/cart-icon.png" width="30" height="25" style="margin-left:10px" />          
           <div id="giohang" style="margin-top:-20px;margin-left:50px" >           
          <?php
          	require("hiengiohang.php");
		  ?>
          </div>
          <!-- code ads -->        
        </div> 
      </div>
      </div>
    </div> 
    <script> 
      pf204652bottomLayer = document.getElementById('fl813691');
      var pf204652IntervalId = 0;
      var pf204652maxHeight = 500;//Chieu cao khung quang cao
      var pf204652minHeight = 20;
      var pf204652curHeight = 0;
      function pf204652show( ){
        pf204652curHeight += 2;
        if (pf204652curHeight > pf204652maxHeight){
        clearInterval ( pf204652IntervalId );
        }
        pf204652bottomLayer.style.height = pf204652curHeight+'px';
      }
      function pf204652hide( ){
        pf204652curHeight -= 3;
        if (pf204652curHeight < pf204652minHeight){
        clearInterval ( pf204652IntervalId );
        }
        pf204652bottomLayer.style.height = pf204652curHeight+'px';
      }
      pf204652IntervalId = setInterval ( 'pf204652show()', 5 );
      function pf204652clickhide(){
        document.getElementById('pf204652hide').style.display='none';
        document.getElementById('pf204652show').style.display='inline';
        pf204652IntervalId = setInterval ( 'pf204652hide()', 5 );
      }
      function pf204652clickshow(){
        document.getElementById('pf204652hide').style.display='inline';
        document.getElementById('pf204652show').style.display='none';
        pf204652IntervalId = setInterval ( 'pf204652show()', 5 );
      }
      function pf204652clickclose(){
        document.body.style.marginBottom = '0px';
        pf204652bottomLayer.style.display = 'none';
      }
    </script>
</body>
</html>
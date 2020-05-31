<?php

	//Goi ham ket noi DB
	//$link = db_connect();
	
	$xuly = (isset($_POST['xuly']))?1:0;
	if($xuly){
		$passold = (isset($_POST['passold']))?$_POST['passold']:'';
		$passphp1 = (isset($_POST['passphp1']))?$_POST['passphp1']:'';
		$passphp2 = (isset($_POST['passphp2']))?$_POST['passphp2']:'';
		if($passphp1!=$passphp2){
			$kq="Password xác nhận không đúng";
		}else{
			if(chgpass($_SESSION['Username'],$passold,$passphp1)){
				$kq="Đổi password thành công !";
				redirect('index.php',0);
			}else{
				$kq="Đổi password thất bại, kiểm tra password cũ !";		
			}
		}
	}
?>
<table width="400" border="0" align="center" cellpadding="5" cellspacing="1" >
  <tr> 
    <td ><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
	<form name="adminForm" action="" method="POST">
        
        <tr>
          <td align="center" valign="middle"><img src="images/chgpass.jpg" width="176" height="165" /></td>
          <td width="50%" align="left">
            <table width="100%" border="0" cellspacing="0" cellpadding="4">
              <tr>
                <td style="color:#CCC"><strong>Nhập password cũ</strong><br />
                  <input type="password" name="passold" class="inputbox" style="width:180px;" id="passold" tabindex="0"/>
                  </td>
                </tr>
              <tr>
                <td style="color:#CCC"><strong>Password mới</strong><br />
                  <input name="passphp1" type="password" style="width:180px;" id="passphp1" tabindex="1"/></td>
              </tr>
              <tr>
                <td style="color:#CCC"><strong>Xác nhận password mới</strong><br />
                  <input name="passphp2" type="password" style="width:180px;" id="passphp2" tabindex="2"/></td>
                </tr>
              <tr>
                <td><input name="Submit" type="submit" value="Change password" />
                  <input name="xuly" type="hidden" id="xuly" value="1" /></td>
                </tr>
            </table></td>
        </tr>
        <tr>
          <td height="30" colspan="2" align="center" style="font-style: italic; color: #090;" ><?php if(isset($kq)){ echo $kq; }?>&nbsp;</td>
        </tr>
        <input type="hidden" />
	</form>
      </table></td>
  </tr> 
</table>
<script type="text/javascript">	document.adminForm.usr.focus(); </script>

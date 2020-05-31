<?php
	//require_once('../admin/lienhe-function.php');
	require_once('phpmailer/class.phpmailer.php');
	function sendmail($hoten,$email,$chude,$noidung){
		$mail             = new PHPMailer();
		$mail->IsSMTP(); 						   // telling the class to use SMTP											  
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
		$mail->Username   = "xuancanh335@gmail.com";  // GMAIL username
		$mail->Password   = "01687578335";           // GMAIL password	
		
		$mail->SetFrom($email,$hoten);	
		$mail->AddReplyTo($email,$hoten);	
		
		$mail->Subject    = $chude;	
		$mail->Body       = $noidung;		
		$address = "xuancanh335@gmail.com";
		$mail->AddAddress($address, "Canh Nguyen");	
		if(!$mail->Send()) {
		  return 0;
		} else {
		  return 1;
		}
	}
	
 	$xuly=(isset($_POST['xuly']))?1:0;
	if($xuly){
			if($_SESSION['code']==$_POST['code']){
			$hoten=$_POST['hoten'];
			$email=$_POST['email'];
			$dienthoai=$_POST['dienthoai'];
			$chude=$_POST['chude'];
			$noidung=$_POST['noidung'];
			$kq=sendmail($hoten,$email,$chude,$noidung);
			//lienhe_them($hoten,$email,$dienthoai,$chude,$noidung,0,0);
		}else{
			$msg = "Mã xác nhận sai, vui lòng nhập lại thông tin";
		}
	}

?>
<form id="form1" name="form1" method="post" action="">
<h1 align="center" style="color:#CCC">Liên hệ khách hàng</h1>
  <table width="100%" border="0" align="center" >  
    <tr >
      <td height="37" colspan="2" style="text-align:center;color:#FFF;font-size:16px;">Điền đầy đủ thông tin -- chúng tôi sẽ sớm liên hệ với bạn sớm nhất</td>
    </tr>
    <tr >
      <td width="32%" style="text-align:right;color:#CCC">Họ và tên</td>
      <td width="68%" > &nbsp; &nbsp; &nbsp;<input type="text" name="hoten" size="40" id="to" />
      <font color="#FF0000">(*)</font></td>
    </tr>
    <tr>
      <td style="text-align:right;color:#CCC">Email</td>
      <td> &nbsp; &nbsp; &nbsp;<input type="text" size="40" name="email" id="to3" />
        <font color="#FF0000">(*)</font></td>
    </tr>
    <tr>
      <td  style="text-align:right;color:#CCC">Điện thoại</td>
      <td >&nbsp; &nbsp; &nbsp;<input type="text" size="40" name="dienthoai" id="to2" />
      <font color="#FF0000">(*)</font></td>
    </tr>
    <tr>
      <td  style="text-align:right;color:#CCC" >Chủ đề</td>
      <td> &nbsp; &nbsp; &nbsp;<select name="chude"  id="chude">
          <option  value="San pham" selected="selected">Sản phẩm</option>
          <option value="hop tac">Hợp tác</option>
          <option value="cong tac">Góp ý</option>
          <option value="cong tac">Bảo hành</option>
      </select></td>
    </tr>
    <tr>
      <td  style="text-align:right;color:#CCC">Nội dung:</td>
      <td> &nbsp; &nbsp; &nbsp;<textarea name="noidung" cols="32" rows="10"></textarea></td>
    </tr>
    <tr>
      <td style="text-align: right;color:#CCC">Mã xác nhận</td>
      <td style="text-align: left"> &nbsp; &nbsp; &nbsp;<input type="text" class="code" name="code" id="code" />
        <img src="lib/captchas.php" alt="xacnhan" width="53" height="22" align="absmiddle"></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align: center"><input name="xuly" type="hidden" id="xuly" value="1" />
        <input type="submit" name="gui" id="gui" value="    Gửi    " />        &nbsp;
      <input type="reset" name="resest" id="resest" value="  Reset  " /></td>
    </tr>
    <tr>
      <td colspan="2" style="border="0"><label for="noidung"><span style="text-align: center">
        <?php 
		if($xuly){
			if(!isset($msg)){ 
		  		echo $kq?"Goi mail lien he thanh cong !":"Goi mail that bai, vui long lien he truc tiep qua dien thoai!";
			}else{
				echo $msg;
			}
		}
	  ?>
      </span></label></td>
    </tr>
  </table>
</form>


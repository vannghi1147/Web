<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style>
#form_wapper{
	width:700px;
	margin:0 auto;	
	padding:5px;
	font-size:17px;
}
#form_head{
	font-weight:bold;
	font-size:24px;
	padding:15px;		
	text-align: center;
	color: #FFF;
	text-transform: uppercase;
}
#form_wapper #tb {
	color: #F00;
}
.form_title{
    font-weight:bold;
    border-bottom:#CCCCCC solid 1px;
    padding:5px;
}
.form_field{
    padding:10px;
}
.tieude{
    width:150px;
    float:left;
    text-align:right;
    padding:2px 10px 0px 0px;
}
form select{
    width:70px;
}
form .tinh{
    width:150px;
}
#form_wapper span{
  color:red;
}
.control{
    margin-left: 150px;
}
</style>
</head>

<body>

    <?php
	error_reporting(0);
	$con=mysql_connect("localhost","root","");
if(!$con)
{
    echo "Lỗi kết nối ".mysql_error();
}
$select=mysql_select_db("webdoan",$con);
	
	
	
        header("content-type: text/html; charset= utf-8");
        $xuly=(isset($_POST['xuly']))?1:0;
		if($xuly){  // Nếu ấn nút Xác nhận
            // Lấy giá trị các field từ form
			if($_SESSION['code']==$_POST['code']){
				$fullname = $_POST["fullname"];
				$bd_d = $_POST["bd_d"];
				$bd_m = $_POST["bd_m"];
				$bd_y = $_POST["bd_y"];
				$sex = $_POST["sex"];
				$city = $_POST["city"];
				$username = $_POST["username"];
				$email = $_POST["email"];
				$pass = $_POST["pass"];
				$dt = $_POST["dt"];
				$repass = $_POST["repass"];
				// Ngày đăng ký
				$ngaydk = date("Y-m-d");
				// Khai báo mảng lỗi
				$error = array();
				// kiểm tra ngày hợp lệ
				if(($bd_d != "" || $bd_m != "" || $bd_y != "") && !checkdate($bd_m,$bd_d,$bd_y)){
					$error[] = "Ngày sinh không hợp lệ!";
				}
				else{
					$bd = $bd_y."-".$bd_m."-".$bd_d; // định dạng insert vào mysql
				}
				// Kiểm tra username 
				if($username == ""){
					$error[] = "Chưa điền username!";
				}
				else{
					// Kiểm tra Username tồn tại trong CSDL
					$query = mysql_query("SELECT * FROM users WHERE username in ('".$username."')");
					if(mysql_num_rows($query) != 0){
						$error[] = "Username ".$username." đã tồn tại!";
					}
				}
				// Kiểm tra email
				if($email == ""){
					$error[] = "Chưa điền Email!";
				}
				else{
					// Dùng Regular Expression kiểm tra định dạng email
					if(!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email)){
						$error[] = "Email không hợp lệ!";
					}
					else{
						// Kiểm tra Username tồn tại trong CSDL
						$query = mysql_query("SELECT * FROM users WHERE email in ('".$email."')");
						if(mysql_num_rows($query) != 0){
							$error[] = "Email ".$email." đã tồn tại!";
					   }
					}
				}
				if($pass == "" && $repass == ""){
					$error[] = "Chưa nhập mật khẩu!";
				}
				else if($pass != $repass){
					$error[] = "Mật khẩu không khớp!";
				}
				else{
					$pass = md5($pass); // mã hóa md5 password
				}
				// Kiểm tra lỗi và thông báo
				$tb = "";
				if(count($error)!= 0){
					foreach($error as $e){
						$tb .= "<br>".$e;
					}
				}
				else{
					// Submit vào CSDL
					 $query = mysql_query("INSERT INTO users (Username,Password,HoTen,GioiTinh,DiaChi,NgaySinh,Dienthoai,Email,NgayDangKy) 
									values ('".$username."','".$pass."','".$fullname."','".$sex."','".$city."','".$bd."','".$dt."','".$email."','".$ngaydk."')");
					// Email chào mừng đăng ký thành công tại đây
					mail($email,"Chào bạn ".$username,"Cảm ơn bạn đã đăng ký website...");
					// Thông báo
					$tb = "Bạn đã đăng ký thành công";
					echo "<meta http-equiv='refresh' content='3;URL='../index.php'>";
				} 
			}else{
				$xacnhan="<font color='#000000' style='font-size:18px' > Mã xác nhận sai, vui lòng nhập lại thông tin </font>";
			}
        }
    ?>

    <form name="dangky" action="" method="post">
    <div id="form_wapper">
      <div id="form_head">
            Đăng ký tài khoản</div>
        <?php
            if($tb !=''){
        ?>     
      <div id="tb"><?php echo $tb; ?></div>
        <?php    
            }
        ?>
        <div class="form_title">
               Thông tin đăng ký
        </div>
       <div class="form_field">
         <table width="100%" border="0" cellspacing="2" cellpadding="2">
           <tr>
              <td colspan="2" >Bạn phải khai báo đầy đủ mục có dánh dấu *. </td>
            </tr>
            <tr>
              <td width="21%" style="color:#CCC">Tên đầy đủ: </td>
              <td width="79%"><input name="fullname" type="text" size="30" /></td>
            </tr>
            <tr>
              <td style="color:#CCC">Ngày sinh: </td>
              <td><select name="bd_d">
                <?php 
                    for($i = 1; $i <=31 ; $i++)
                    {    
                ?>
                <option value="<?php echo $i; ?>"><?php echo ($i <= 9) ? "0".$i : $i; ?></option>
                <?php
                    }
                ?>
              </select>
                <select name="bd_m">
                  <?php 
                    for($i = 1; $i <=12 ; $i++)
                    {    
                ?>
                  <option value="<?php echo $i; ?>"><?php echo ($i <= 9) ? "0".$i : $i; ?></option>
                  <?php
                    }
                ?>
              </select>
                <select name="bd_y">
                  <?php 
                    for($i = (date("Y") - 100); $i <= (date("Y") - 10) ; $i++)
                    {    
                ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  <?php
                    }
                ?>
              </select></td>
            </tr>
            <tr>
              <td style="color:#CCC">Giới tính: </td>
              <td><select name="sex">
                <option value="">[Giới]</option>
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
              </select></td>
            </tr>
            <tr>
              <td style="color:#CCC">Điện thoại:</td>
              <td><input type="text" name="dt" id="dt" /></td>
            </tr>
            <tr>
              <td style="color:#CCC">Nơi sống: </td>
              <td><select class="city" name="city">
                <option>[Chọn tỉnh]</option>
                <option value="An Giang">An Giang </option>
                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu </option>
                <option value="Bắc Giang">Bắc Giang </option>
                <option value="Bắc Kạn">Bắc Kạn </option>
                <option value="Bạc Liêu">Bạc Liêu </option>
                <option value="Bắc Ninh">Bắc Ninh </option>
                <option value="Bến Tre">Bến Tre </option>
                <option value="Bình Định">Bình Định </option>
                <option value="Bình Dương">Bình Dương </option>
                <option value="Bình Phước">Bình Phước </option>
                <option value="Bình Thuận">Bình Thuận </option>
                <option value="Bình Thuận">Bình Thuận </option>
                <option value="Cà Mau">Cà Mau </option>
                <option value="Cao Bằng">Cao Bằng </option>
                <option value="Đắk Lắk">Đắk Lắk </option>
                <option value="Đắk Nông">Đắk Nông </option>
                <option value="Điện Biên">Điện Biên </option>
                <option value="Đồng Nai">Đồng Nai </option>
                <option value="Đồng Tháp">Đồng Tháp </option>
                <option value="Đồng Tháp">Đồng Tháp </option>
                <option value="Gia Lai">Gia Lai </option>
                <option value="Hà Giang">Hà Giang </option>
                <option value="Hà Nam">Hà Nam </option>
                <option value="Hà Tĩnh">Hà Tĩnh </option>
                <option value="Hải Dương">Hải Dương </option>
                <option value="Hậu Giang">Hậu Giang </option>
                <option value="Hòa Bình">Hòa Bình </option>
                <option value="Hưng Yên">Hưng Yên </option>
                <option value="Khánh Hòa">Khánh Hòa </option>
                <option value="Kiên Giang">Kiên Giang </option>
                <option value="Kon Tum">Kon Tum </option>
                <option value="Lai Châu">Lai Châu </option>
                <option value="Lâm Đồng">Lâm Đồng </option>
                <option value="Lạng Sơn">Lạng Sơn </option>
                <option value="Lào Cai">Lào Cai </option>
                <option value="Long An">Long An </option>
                <option value="Nam Định">Nam Định </option>
                <option value="Nghệ An">Nghệ An </option>
                <option value="Ninh Bình">Ninh Bình </option>
                <option value="Ninh Thuận">Ninh Thuận </option>
                <option value="Phú Thọ">Phú Thọ </option>
                <option value="Quảng Bình">Quảng Bình </option>
                <option value="Quảng Bình">Quảng Bình </option>
                <option value="Quảng Ngãi">Quảng Ngãi </option>
                <option value="Quảng Ninh">Quảng Ninh </option>
                <option value="Quảng Trị">Quảng Trị </option>
                <option value="Sóc Trăng">Sóc Trăng </option>
                <option value="Sơn La">Sơn La </option>
                <option value="Tây Ninh">Tây Ninh </option>
                <option value="Thái Bình">Thái Bình </option>
                <option value="Thái Nguyên">Thái Nguyên </option>
                <option value="Thanh Hóa">Thanh Hóa </option>
                <option value="Thừa Thiên Huế">Thừa Thiên Huế </option>
                <option value="Tiền Giang">Tiền Giang </option>
                <option value="Trà Vinh">Trà Vinh </option>
                <option value="Tuyên Quang">Tuyên Quang </option>
                <option value="Vĩnh Long">Vĩnh Long </option>
                <option value="Vĩnh Phúc">Vĩnh Phúc </option>
                <option value="Yên Bái">Yên Bái </option>
                <option value="Phú Yên">Phú Yên </option>
                <option value="Tp.Cần Thơ">Tp.Cần Thơ </option>
                <option value="Tp.Đà Nẵng">Tp.Đà Nẵng </option>
                <option value="Tp.Hải Phòng">Tp.Hải Phòng </option>
                <option value="Tp.Hà Nội">Tp.Hà Nội </option>
                <option value="TP  HCM">TP HCM </option>
              </select></td>
            </tr>
          </table>
      </div>
         <div class="form_title">
               Thông tin tài khoản
        </div>
       <div class="form_field">
         <p>
            <label class="tieude" style="color:#CCC">Tên truy cập: </label>
            <input type="text" name="username" /> 
            <span>(*)</span> <br>
           <label class="tieude" style="color:#CCC">Địa chỉ Email: </label>
            <input type="text" name="email" /> 
            <span>(*)</span> <br>
           <label class="tieude" style="color:#CCC">Mật khẩu: </label>
            <input type="password" name="pass" /> 
            <span>(*)</span> <br>
           <label class="tieude" style="color:#CCC">Xác nhận mật khẩu: </label>
            <input type="password" name="repass" /> 
         <span>(*)</span></p>
         <p> 
           <label class="tieude" style="color:#CCC">Mã xác nhận: </label>
           <input style="width:145px" type="text" name="code" id="code" /> 
           <img src="lib/captchas.php" width="53" height="22" align="absmiddle" />
         </p> 
         <blockquote>
           <blockquote>
             <p>
               <?php
            	if($xuly){
					if(isset($xacnhan)){ 
		  				echo $xacnhan;	
					}
			}
			
			?>
             </p>
           </blockquote>
         </blockquote>       
          <div class="control">
           <input type="submit" name="send" value="  Đăng ký  " /> 
             <input  type="reset" name="reset" value="  Nhập lại  " />
             <input name="xuly" type="hidden" value="1" />
        </div>
      </div>
    </div>
    </form> 


</body>
</html>
<form name="form1" method="get" action="index.php">
  <table width="100%" border="0">
    <tr>
      <td style="color:#CCC" >Từ khóa</td>
      <td style="text-align:left"><input type="text" name="tukhoa" id="tukhoa" autocomplete="on" placeholder="Nhập vào từ khóa"></td>
    </tr>
    <tr>
      <td style="color:#CCC">Giá từ</td>
      <td><select name="min" id="min" style="width:100px">        
      <?php 
	  	 for($i=1;$i<20;$i++){
	  ?>
      	<option value="<?php echo $i*1000000;?>"><?php echo $i?> Triệu</option>
      <?php
		 }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td style="color:#CCC">Đến</td>
      <td><select name="max" id="max" style="width:100px">
      <?php 
	  	 for($i=1;$i<20;$i++){
	  ?>
      	<option  selected=1 value="<?php echo $i*1000000;?>"><?php echo $i?> Triệu</option>
      <?php
		 }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td ><input name="p" type="hidden" id="p" value="timkiem" /></td>
      <td><input type="submit" name="btntim" id="btntim" value="   Tìm   "></td>
    </tr>
  </table>
</form>

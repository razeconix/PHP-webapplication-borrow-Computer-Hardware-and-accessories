<?php
  session_start();

	mysql_connect("localhost","root","12345678");
	mysql_select_db("db_books");
	$strSQL = "SELECT * FROM tb_hardware WHERE hadrware_id = '".$_SESSION['id']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
<html>
<head>
<title>ข้อมูลผู้ใช้</title>

<div class="container">
<div class="form">
<form name="form1" method="post" action="save_profile.php">
<br>
  <table width="400" border="1" style="width: 400px">
    <tbody>
      <tr>
        <td width="125"> &nbsp;UserID</td>
        <td width="180">
          <?php echo $objResult["UserID"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Username</td>
        <td>
          <?php echo $objResult["Username"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Password</td>
        <td><input name="txtPassword" type="password" id="txtPassword" value="<?php echo $objResult["Password"];?>">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Confirm Password</td>
        <td><input name="txtConPassword" type="password" id="txtConPassword" value="<?php echo $objResult["Password"];?>">
        </td>
      </tr>
      <tr>
        <td>&nbsp;Name</td>
        <td><input name="txtName" type="text" id="txtName" value="<?php echo $objResult["Name"];?>"></td>
      </tr>
      <tr>
        <td>&nbsp;Email</td>
        <td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $objResult["Email"];?>"></td>
      </tr>
      <tr>
        <td>&nbsp;Address</td>
        <td><input name="txtAddress" type="text" id="txtAddress" value="<?php echo $objResult["Address"];?>"></td>
      </tr>
      <tr>
        <td>&nbsp;Tel</td>
        <td><input name="txtTel" type="text" id="txtTel" value="<?php echo $objResult["Tel"];?>"></td>
      </tr>
      <tr>
        <td> &nbsp;Status</td>
        <td>
          <?php echo $objResult["Status"];?>
        </td>
      </tr>
    </tbody>
  </table>

  <br>
  <input type="submit" name="Submit" value="Save">
</form>
</div>
</div>
<!-- Bootstrap core JavaScript -->
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>
</body>
</html>
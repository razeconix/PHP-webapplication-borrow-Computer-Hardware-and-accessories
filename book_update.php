<?php
date_default_timezone_set("Asia/Bangkok");
?>
<?php
session_start();
$page = 'hardware';
$_SESSION["hardware_id"];?>
<?php
include "header.php";
include  "fucntion_query.php";

$hardware_id = $_GET['hardware_id'];
$hardware =  GetBook($hardware_id);

//print_r($book);
?>

<body>

	<!-- Navigation -->
	<?php include "navbar.php"; ?>
	<!-- Page Content -->



		<div class="jumbotron">

			<div class="row">
				<div class="col col-lg-3">
				</div>
				<div class="col-lg-6 ">
					<h2 class="display-5 text-center">แก้ไข</h2>
					<br>
					<form class="container" action="update_book.php" method="post" id="needs-validation" novalidate enctype="multipart/form-data">

						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom04">ชื่ออุปกรณ์<span style="color: red"> *</span></label>
								<input type="text" class="form-control" id="validationCustom04" placeholder="ชื่ออุปกรณ์" name="hardware_name" value="<?=$hardware->hardware_name?>" required>
								<div class="invalid-feedback">
									กรุณาระบุชื่ออุปกรณ์.
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom07">เลือกประเภทอุปกรณ์ <span style="color: red"> *</span></label>
								<select class="custom-select" name="type_id" id="validationCustom07" required>
									<option value="" selected>ประเภทอุปกรณ์ </option>
									<?php $brand=$conn->query('SELECT * from tb_type'); ?>
									<?php while ($row = $brand->fetch_assoc()) {?>
									<option  value="<?=$row['type_id'] ?>"><?=$row['type_name'] ?></option>
									<?php } ?>

								</select>

							</div>
						</div>

						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom07">ระบุแบรนด์ <span style="color: red"> *</span></label>
								<select class="custom-select" name="brand_id" id="validationCustom07" required>
									<option value="" selected>ระบุแบรนด์ </option>
									<?php $brand=$conn->query('SELECT * from tb_brand'); ?>
									<?php while ($row = $brand->fetch_assoc()) {?>
									<option  value="<?=$row['brand_id'] ?>"><?=$row['brand_name'] ?></option>
									<?php } ?>


								</select>

							</div>
						</div>


						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom07">เลือกสถานะอุปกรณ์ <span style="color: red"> *</span></label>
								<select class="custom-select" name="hardware_status" id="validationCustom07" required>
									<option value="" selected>เลือกสถานะ </option>

									<option  value="ปกติ" <?=$hardware->hardware_status=='ปกติ' ? 'selected' : '';?>>ปกติ</option>
									<option value="หาย" <?=$hardware->hardware_status=='หาย' ? 'selected' : '';?>>หาย</option>
									<option value="อื่นๆ" <?=$hardware->hardware_status=='อื่นๆ' ? 'selected' : '';?>>อื่นๆ</option>

								</select>

							</div>
						</div>

						<br>
						<div class="row">
							<div class="col-md-6 mb-3">
								<input type="hidden" name="hardware_id" value="<?=$hardware_id?>">
								<a href="delete_book.php?id=<?=$hardware_id?>" onclick="return checkDelete()"><button class="btn btn-danger" type="button">ลบอุปกรณ์</button></a>
								<button class="btn btn-warning" type="submit" onclick="myFunction()">บันทึกการแก้ไข</button>
							</div>
						</div>
					</form>

					<script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
              	"use strict";
              	window.addEventListener("load", function() {
              		var form = document.getElementById("needs-validation");
              		form.addEventListener("submit", function(event) {
              			if (form.checkValidity() == false) {
              				event.preventDefault();
              				event.stopPropagation();
              			}
              			form.classList.add("was-validated");
              		}, false);
              	}, false);
              }());
          </script>
      </div>
  </div>
</div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
function myFunction() {
    alert("แก้ไขข้อมูลเรียบร้อย !");
}
function checkDelete(){
    return confirm('คุณต้องการที่จะลบข้อมูลโครงงานนี้ ?');
}
</script>

</body>

</html>

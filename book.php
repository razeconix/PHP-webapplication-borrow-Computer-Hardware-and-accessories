<?php
date_default_timezone_set("Asia/Bangkok");

?>
<?php
session_start();
$page = 'book';
$_SESSION["id"];?>
<?php
include "header.php";
include  "fucntion_query.php";
require_once 'connect_db.php';

?>
<body>

	<!-- Navigation -->
	<?php include "navbar.php"; ?>
	<!-- Page Content -->


	<div class="jumbotron">
		<div class="jumbotron">


			<div class="row">
				<div class="col col-lg-3">
				</div>
				<div class="col-lg-6 ">
					<h2 class="display-5 text-center">เพิ่มอุปกรณ์ใหม่</h2>
					<br>
					<form class="container" action="save_book.php" method="post" id="needs-validation" novalidate enctype="multipart/form-data">

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
                                    <option value="" selected>เลือกประเภท </option>
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
						<br>
						<div class="row">
							<div class="col-md-5 mb-3">
								<button class="btn btn-primary" type="submit">บันทึก</button>
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

</body>

</html>

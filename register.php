
<?php  
session_start();  
include  "fucntion_query.php";
$page = 'register';

$data = $_REQUEST;

if(isset($data['submit'])){
  $user = insertUser($data);
  if($user >= 1){
     $_SESSION["regis"] = 1;
     header("Location: admin-page.php");
  }
}

?> 
<?php include "header.php" ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Parason Software - Home</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- Navigation -->
  <?php include "navbar.php"; ?>
  <!-- Page Content -->
  <main class="side-main">
    <!--================ Hero sm Banner start =================-->      
    <section class="hero-banner mb-10px">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="hero-banner__img">
              <img class="img-fluid" src="img/banner/hero-banner.png" alt="">
            </div>
          </div>
          <div class="col-lg-5 pt-5">



      <div class="row">
        <div class="col col-lg-3">
        </div>
        <div class="col-lg-10 text-center ">
        <div class="hero-banner__content"> 
              <h1>ลงทะเบียน</h1>
</div>
         <br>
         <form class="container" id="needs-validation" novalidate method="post">
           <div class="row">
             <div class="col-md-6 mb-3">

               <label for="validationServer01">StudentID</label>
               <input type="text" class="form-control " id="validationServer01" placeholder="รหัสนักศึกษา"  required name="username">
               <div class="invalid-feedback">
                 กรุณากรอกรหัสนักศึกษา.
               </div>
             </div>
             <div class="col-md-6 mb-3">
               <label for="validationServer02">Password</label>
               <input type="password" class="form-control " id="validationServer02" placeholder="รหัสผ่าน" required name="password">
               <div class="invalid-feedback">
                 กรุณากรอกรหัสรหัสผ่าน.
               </div>
             </div>
           </div>
           <div class="row">
             <div class="col-md-6 mb-3">
               <label for="validationServer03">Firstname</label>
               <input type="text" class="form-control " id="validationServer03" placeholder="ชื่อ" required name="name">
               <div class="invalid-feedback">
                 กรุณากรอกรหัสชื่อ.
               </div>
             </div>
             <div class="col-md-6 mb-3">
               <label for="validationServer04">Lastname</label>
               <input type="text" class="form-control " id="validationServer04" placeholder="นามสกุล" required 
               name=" lastname">
               <div class="invalid-feedback">
                 กรุณากรอกรหัสนามสกุล.
               </div>
             </div>
           </div>

           <button class="button bg" type="submit" name="submit">ลงทะเบียน</button>
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

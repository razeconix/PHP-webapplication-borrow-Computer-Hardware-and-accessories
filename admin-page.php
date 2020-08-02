
<?php
  session_start(); 
  include  "fucntion_query.php";
  $page = 'admin';
  $data = $_REQUEST;

  if(isset($data['submit'])){
     $login = checkLogin($data['username'],$data['password']);

     if(!is_null($login)){
      $user = getUser($login->user_id);
      if($user->status == 0){
        //user
        $_SESSION["book_id"] = $data['book_id'];
        $_SESSION["status"] = $user->status;
        $_SESSION["id"] = $user->user_id; 
        header("Location: manage-lend.php");
      }else{
        //admin
        $_SESSION["status"] = $user->status;
        $_SESSION["id"] = $user->user_id; 
        header("Location: manage-lend-admin.php");
      }
     }else{
      $_SESSION["check"] = 0; 
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
            
         <form class="container" id="needs-validation" novalidate method="post">
           <div class="row">
             <div class="col-md-6 mb-3 ">
               <label for="validationServer01">Username</label>
               <input type="hidden" value="<?=@$_GET['book_id']?>" name="book_id">
               <input type="text" class="form-control" id="validationServer01" placeholder="ชื่อผู้ใช้" name="username"  required>
               <div class="invalid-feedback">
                 กรุณากรอก user name.
               </div>
             </div>
             <br>
             <div class="col-md-6 mb-3">
               <label for="validationServer02">Password</label>
               <input type="password" class="form-control " id="validationServer02" placeholder="รหัสผ่าน" name="password" required>
               <div class="invalid-feedback">
                 กรุณากรอกรหัสรหัสผ่าน.
               </div>
             </div>
           </div>

           <center><button class="button bg" type="submit" name="submit">เข้าสู่ระบบ</button></center>
         </form>
            
          </div>
        </div>
      </div>
    </section>
    <!--================ Hero sm Banner end =================-->
      

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
    <script type="text/javascript">
      $(document).ready(function () {
          $(".alert").fadeIn().delay(2000).fadeOut(1000, function () { $(this).remove(); });
      });
    </script>

  </body>

  </html>

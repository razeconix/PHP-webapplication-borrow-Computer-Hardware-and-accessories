<?php
date_default_timezone_set("Asia/Bangkok");

?>
<?php
session_start();
$page = 'lend';
?>
<?php
include "header.php";
include  "fucntion_query.php";
?>

<body>

  <!-- Navigation -->
  <?php include "navbar.php"; ?>
  <!-- Page Content -->

    <div class="jumbotron">

      <div class="row">
        <div class="col-lg-12 ">
         <h2 class="display-5 text-center">ข้อมูลอุปกรณ์ทั้งหมด</h2>
         <br>

         <div class="container">
          <table id="example" class="table table-hover table-bordered table-dark" cellspacing="0" width="100%">
            <thead>
              <tr class="table-active">
                <th width="5%">ลำดับ</th>
                <th width="30%">ชื่ออุปกรณ์</th>
                <th width="20%">ประเภทอุปกรณ์</th>
                <th width="20%">แบรนด์</th>
                <th width="10%">เข้าระบบ</th>
                <th width="5%">สถานะ</th>
              </tr>
            </thead>

            <tbody>
             <?php
             $book = GetDataBooks();
             $link = '#';
             for ($i=0; $i < count($book) ; $i++) {
               if($book[$i]->hardware_status == 'ปกติ'){
                 $status = 'info';
                 $link = "href='admin-page.php?book_id=".$book[$i]->hardware_id."'";
               }elseif ($book[$i]->hardware_status == 'ถูกยืม') {
                 $status = 'warning';
               }elseif ($book[$i]->hardware_status == 'หาย') {
                 $status = 'danger';
               }else {
                 $status = 'secondary';
               }
               if(isset($_SESSION["status"])){
                if($_SESSION["status"] != 0){
                  $link = "href='book_update.php?hardware_id=".$book[$i]->hardware_id."'";
                }
              }

              ?>
              <tr>
               <td><?=$i+1;?></td>
               <td>
                <a <?=$link?> >
                  <?php  if(isset($_SESSION["status"])){if($_SESSION["status"] != 0){?>
                  <img width="20" src="./images/pen.png">
                  <?php }}?>
                  <?=$book[$i]->hardware_name?></a>

                </td>
                <td>
                        <input type="hidden" class="custom-control-input"  value="<?=$book[$i]->type_name?>" name="type_name[]" >
                        <?=$book[$i]->type_name?></td>

                        <td>
                          <input type="hidden" class="custom-control-input"  value="<?=$book[$i]->brand_name?>" name="brand_name[]" >
                          <?=$book[$i]->brand_name?></td>

                <td><?=DateThai($book[$i]->hardware_date)?></td>
                <td><h5><span class="badge badge-<?=$status?>"><?=$book[$i]->hardware_status?></span></h5></td>
              </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.0.0-beta/dt-1.10.16/datatables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
</body>

</html>

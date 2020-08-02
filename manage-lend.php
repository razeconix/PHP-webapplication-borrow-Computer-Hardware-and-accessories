<?php
date_default_timezone_set("Asia/Bangkok");

?>
<?php
session_start();
$page = 'lend';?>
<?php
include "header.php";
include  "fucntion_query.php";
?>

<body>

  <!-- Navigation -->
  <?php include "navbar.php"; ?>
  <!-- Page Content -->


    <nav  aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?="ยินดีต้อนรับ คุณ".$user->name." ".$user->lastname?></li>
      </ol>
    </nav>

    <div class="jumbotron">
      <div class="row">
        <div class="col-lg-12 ">
         <h2 class="display-5 text-center">อุปกรณ์ทั้งหมด</h2>
         <br>

         <form action="save_history.php" method="post">
           <div class="container">
            <table id="example" class="table table-hover table-bordered table-dark" cellspacing="0" width="100%">
              <thead >
                <tr class="table-active">
                  <th width="5%">ลำดับ</th>
                  <th width="30%">ชื่ออุปกรณ์</th>
                  <th width="20%">ประเภทอุปกรณ์</th>
                  <th width="20%">แบรนด์</th>
                  <th width="10%">อัปโหลด</th>
                  <th width="5%">สถานะ</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $book = GetDataBooks();
                for ($i=0; $i < count($book) ; $i++) {
                  $disabled = '';
                  if($book[$i]->hardware_status == 'ปกติ'){
                    $status = 'info';
                  }elseif ($book[$i]->hardware_status == 'ถูกยืม') {
                    $status = 'warning';
                    $disabled = 'disabled';
                  }elseif ($book[$i]->hardware_status == 'หาย') {
                    $status = 'danger';
                    $disabled = 'disabled';
                  }else {
                    $status = 'secondary';
                    $disabled = 'disabled';
                  }
                  $checked ='';
                  if($_SESSION["book_id"] == $book[$i]->hardware_id){
                     $checked = 'checked';
                  }
                  ?>
                  <tr>
                    <td><?=$i+1;?></td>
                    <td >
                      <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"  value="<?=$book[$i]->hardware_id?>" name="book_id[]" <?=$disabled?> <?=$checked?>>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description"><?=$book[$i]->hardware_name?></span>
                        <a href="<?=$book[$i]->hardware_detail != '' ? $book[$i]->hardware_detail : '#';?>" target="_blank"><?=$book[$i]->hardware_detail != '' ? '<span class="badge badge-dark">(บทย่อ)</span>' : '';?></a>
                      </label>
                    </td>
                    <td><?=$book[$i]->type_name?></td>
                    <td><?=$book[$i]->brand_name?></td>
                    <td><?=DateThai($book[$i]->hardware_date)?></td>
                    <td><h5><span class="badge badge-<?=$status?>"><?=$book[$i]->hardware_status?></span></h5></td>
                  </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>

            <div class="row">
              <div class="col-lg-5"></div>
              <div class="col-lg-7">
                <input type="submit" class="btn btn-success " name="submit" id="submit" value="ยืม">
              </div>
            </div>
          </form>

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
      $('#example').DataTable({
        paging: false
      });

      $("form").submit(function(){

          var checked = []
          $("input[name='book_id[]']:checked").each(function ()
          {
              checked.push(parseInt($(this).val()));
          });

          if(checked.length == 0){
            alert("กรุณาเลือกโครงงานที่ต้องการยืม !");
            return  false;
          }else{
            alert("ทำการยืมเรียบร้อย !");
            return  true;
          }

      });
    } );
  </script>
</body>

</html>

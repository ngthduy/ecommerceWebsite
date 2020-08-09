<?php
  if (isset($_POST['submit_cmt'])) {
    if (isset($_SESSION['email'])) {
        $date_cmt = date("Y-m-d");
        $user -> cmt($_SESSION['email'],$_REQUEST['id'],$_POST['my_cmt'],$date_cmt );
    }
    else{
      echo '<script type="text/javascript">alert("Vui lòng đăng nhập để viết bình luận");</script>';
    }
  }
  
  $tbl = "SELECT * FROM sanpham s join binhluan bl on s.masp = bl.id_sp_cmt join user u on u.email = bl.id_user_cmt 
          where masp = ".$_REQUEST['id']." ORDER BY bl.date_cmt DESC LIMIT 0,5";
  $data = $user -> getalldata($tbl);
  if ($data != 0) {
    foreach ($data as $row ) {
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cmt">
            <div class="row">
              <div class="col-lg-5 col-md-3 col-sm-3 col-xs-7">
                <h4><p style="font-weight:bold; ">'.$row['fullname'].'</p></h4>
              </div>
              <div class="col-lg-7 col-md-9 col-sm-9 col-xs-5">
                <h5><p style="font-weight:bold; ">'.date("d-m-Y", strtotime($row['date_cmt'])).'</p></h5>
                
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              '.$row['noidung_cmt'].'
              </div>
            </div>
          </div>';
    }
  }else {
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cmt">
            <b>Không có bình luận.</b>
          </div>';
  }

?>

<div class="showcase block block-border-bottom-grey">
  <div class="container">
    <h2 class="block-title">
        Đơn Hàng
    </h2>
    <div class="row">
      
      <?php
        if (isset($_REQUEST['trang'])) {
          $trang = $_REQUEST['trang'];
          settype($trang,"int");// ép kiểu số nguyên
        } else {
          $trang = 1;
        }
        $sptren1trang = 2;
        $from = ( $trang - 1 ) * $sptren1trang;
        $tbl = "SELECT * FROM bill b join orderdetail od on b.id_bill = od.id_bill join sanpham sp on sp.masp = od.id_sp join statusbill sb on sb.id_statusbill = b.status WHERE email = '".$_SESSION['email']."' ORDER BY date_recive DESC LIMIT $from , $sptren1trang ";
        $total =  $user->num_row($tbl);
        $data = $user -> getalldata($tbl);
        $sotrang = ceil($total / $sptren1trang);
        foreach ($data as $row ) {
          echo '
                <div class="row  detail_order clear">
                  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 clear">
                    <a href="chitietsanpham/'.$row['masp'].'/'.$user -> makeurl($row['tensp']).'">
                      <img src="public/img/sanpham/'.$row['hinh_sp'].'" width="80px" height="50px">
                    </a>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
                    <span>'.$row['tensp'].'</span>
                  </div>
                  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 ">
                    <p>Qty: '.$row['qty'].'</p>
                    <p>Size: '.$row['size_sp'].'</p>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
                    <p>Tổng Tiền:</p>
                    <span>'.$user->change_money($row['amount_order']) .' ₫</span>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
                    <p>Ngày đặt hàng:</p>
                    <span>'.$row['date_order'].'</span>
                    <p>Ngày nhận hàng:</p>
                    <span>'.$row['date_recive'].'</span>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
                    <p>Trạng thái giao hàng:</p>
                    <span>'.$row['trangthai'].'</span>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
                    <p>Hình thức thanh toán:</p>
                    <span>'.$row['payment'].'</span>
                  </div>
                </div>
              

                ';

              }
      ?>
    </div>
    <br>
    <div class="phantrang">
    <?php
          $total_page = "SELECT * FROM bill b join orderdetail od on b.id_bill = od.id_bill join sanpham sp on sp.masp = od.id_sp join statusbill sb on sb.id_statusbill = b.status WHERE email = '".$_SESSION['email']."' ORDER BY date_recive DESC ";
          $total =  $user->num_row($total_page);
          $sotrang = ceil($total / $sptren1trang);
          for ($i=1; $i <= $sotrang ; $i++) { 
            echo '<span style="color: black">
              <a href="donhang/'.$i.'">Trang '.$i.'</a> 
            </span>';
          }
        ?>
    </div>      
  </div>
</div>
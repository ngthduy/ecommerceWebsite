<?php
  if (isset($_SESSION['email']) && $_SESSION['email'] != null ) {
    if (isset($_SESSION['cart']) && $_SESSION['cart'] != null ) {
      if (isset($_POST['submit-cod'])) {
        if (isset($_SESSION['total_disc'])) {
          $amount_bill = $_SESSION['total_disc'];
        } else {
          $amount_bill = $_SESSION['total'];
        }
        $id_bill = $user -> payment_cod_bill($_SESSION['email'],$amount_bill,$_SESSION['recive_date']);
        foreach ($_SESSION['cart'] as $key => $val) {
          foreach ($val as $key1 => $val1) {
            $amount_order = $val1['price'] * $val1['qty'];
            $user -> payment_cod_order($id_bill,$key,$key1,$val1['qty'],$amount_order);
          }
        }
        unset($_SESSION['cart']);
        unset($_SESSION['rate']);
        unset($_SESSION['total']);
        unset($_SESSION['total_disc']);
        unset($_SESSION['recive_date']);
        //header('location: ../listcart');
        $user->alert("Đặt hàng thành công");
        $user->location("listcart");
      }
    }
    else {
      header('location: listcart');
    }
  }
  else {
    $user->alert("Vui lòng đăng nhập");
    $user->location("dangnhap");
  }
  
  
?>
<div class="showcase block block-border-bottom-grey">
  <div class="container">
    <h2 class="block-title">
        Thanh Toán
    </h2>
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="row">
          <form method="POST">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 payment" align="center">
              <a href="thanhtoan/cod"><span class="icon-payment"><i class="fa fa-fw fa-money"></i></span></a>
              <p>Thanh Toán Khi Nhận Sản Phẩm (COD)</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 payment" align="center">
              <a href="thanhtoan/visa"><span class="icon-payment"><i class="fa fa-credit-card"></i></span></a>
              <p>Thẻ Tín Dụng/Thẻ Ghi Nợ</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 payment" align="center">
              <a href="thanhtoan/atm"><span class="icon-payment"><i class="fab fa-cc-mastercard"></i></span></a>
              <p>Thẻ ATM</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 payment" align="center">
              <a href="thanhtoan/paypal"><span class="icon-payment"><i class="fab fa-cc-paypal"></i></span></a>
              <p>Thanh Toán PayPal</p>
            </div>
          </form>
          <?php
            if (isset($_REQUEST['by'])) {
              switch ($_REQUEST['by']) {
                case 'cod':{
                  $tbl = "SELECT * FROM user WHERE email = '$tk' || phone = '$tk' ";
                  $data = $user -> getalldata($tbl);
                  foreach ($data as $row ) {
                    if(isset($row['address'])){
                      echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cod" >
                      <h3><b>Thanh Toán Khi Nhận Sản Phẩm (COD)</b></h3>
                      <p>Bạn có thể thanh toán bằng tiền mặt khi nhận hàng tại nhà</p>
                      <form method="POST">
                        <button type="submit" class="btn btn-default" value="1" name="submit-cod">Xác Nhận</button>
                      </form>
                    </div>
                  ';
                    }else{
                      echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cod" >
                      <h3><b>Thanh Toán Khi Nhận Sản Phẩm (COD)</b></h3>
                      <p>Bạn có thể thanh toán bằng tiền mặt khi nhận hàng tại nhà</p>
                      <form method="POST">
                        <button type="submit" disabled="true" class="btn btn-default" value="1" name="submit-cod">Xác Nhận</button>
                      </form>
                    </div>
                  ';
                    }
                  }
                  break;
                }
                case 'visa':{
                  echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <h3><b>Thẻ Tín Dụng / Thẻ Ghi Nợ</b></h3>
                          <form method="POST">
                            <div class="form-group">
                              <label>Mã Thẻ:</label>
                              <input type="text" class="form-control" name="" placeholder="Mã Thẻ">
                            </div>
                            <div class="form-group">
                              <label>Tên Trên Thẻ:</label>
                              <input type="text" class="form-control" name="" placeholder="Tên Trên Thẻ">
                            </div>
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                  <label>Ngày Hết Hạn:</label>
                                  <input type="text" class="form-control" name="" placeholder="Ngày/Tháng">
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                  <label>CVV:</label>
                                  <input type="text" class="form-control" name="" placeholder="CVV">
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-default" disabled="true"><a href="">Xác Nhận Đặt Hàng</a></button>
                          </form>
                        </div>
                      </div>
                    </div>
                  ';
                  break;
                }
                case 'atm':{
                  echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                      <h3><b>Thẻ ATM</b></h3>
                      <p>Bạn cần có:</p>
                      <p>1. Thẻ ATM</p>
                      <p>2. Đã đăng ký dịch vụ THANH TOÁN TRỰC TUYẾN và / hoặc NGÂN HÀNG ĐIỆN TỬ (Internet Banking)</p>
                      <p>3. Số dư tài khoản PHẢI LỚN HƠN tổng giá trị đơn hàng</p>
                      <button class="btn btn-default" disabled="true"><a href="">Xác Nhận Đặt Hàng</a></button>
                    </div>
                  ';
                  break;
                }
                case 'paypal':{
                  echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                          <h3><b>Thanh Toán PayPal</b></h3>
                          <p>Bạn có thể thanh toán bằng tiền mặt khi nhận hàng tại nhà</p>
                          <button class="btn btn-default" disabled="true" ><a href="">Xác Nhận Đơn Hàng</a></button>
                        </div>';
                  break;
                }
                  
              }
            }
          ?>
          
          

        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 payment-info">
        
            <p align="center" style="font-size: 20px"><b>Thông Tin Nhận Hàng</b></p>
            <?php
            $tbl = "SELECT * FROM user WHERE email = '".$_SESSION['email']."' ";
            $data = $user -> getalldata($tbl);
            foreach ($data as $row ) {
                  echo '
                    <p><i class="fa fa-street-view"></i> <b>'.$row['fullname'].'</b> <a href="quanlitaikhoan">Chỉnh sửa</a></p>';
                    if(isset($row['address'])){
                      echo '<p>'.$row['address'].'</p>';
                    }else{
                      echo '<p style="color: red">Vui lòng nhập địa chỉ mới có thể thanh toán</p>';
                    }
              echo '<p><i class="fa fa-phone"></i> '.$row['phone'].'</p>
                    <p><i class="fa fa-envelope"></i> '.$row['email'].'</p>
                  ';
                }
                
              ?>
              
              
              <p align="center" style="font-size: 20px"><b>Thông Tin Đơn Hàng</b></p>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <p>Ngày Nhận Hàng:</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <?php 

                  $_SESSION['recive_date'] = mktime(0, 0, 0, date('m'), date('d')+5, date('Y'));
                  echo '<p><b>'.date('d/m/Y', $_SESSION['recive_date']).'</b></p>';
                  ?>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <p>(Ngày nhận hàng sau ngày đặt hàng <b>5</b> ngày)</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <p>Tổng Tiền:</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <p><?php 
                  if(isset($_SESSION['total_rate'])) 
                    {echo $user->change_money($_SESSION['total_disc'])." ₫";}
                     else {echo $user->change_money($_SESSION['total'])." ₫";}
                     ?></p>
                </div>
              </div>
              

        </div>
      </div>
      
    </div>      
  </div>
</div>



<?php 
  if (isset($_SESSION['email']) && isset($_SESSION['pw'])  ) {

  } else {
    header('location: dangnhap');
  }
  
?>
<div class="showcase block block-border-bottom-grey">
  <div class="container">
    <h2 class="block-title">
        <a href="quanlitaikhoan">Quản Lí Tài Khoản</a>
    </h2>
    <div class="row">
    <?php
    $tbl = "SELECT * FROM user WHERE email = '$tk' || phone = '$tk' ";
          $data = $user -> getalldata($tbl);
          foreach ($data as $row ) {
                
              }
      if (isset($_REQUEST['func'])) {
        switch ($_REQUEST['func']) {
          case 'edit':{
            echo '
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="block-title"><b>Chỉnh sửa thông tin cá nhân</b> </h4>
                  <form method="POST">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                          <label >Họ và tên</label>
                          <input type="text" name="fullname" class="form-control" value="'.$row['fullname'].'">
                        </div>
                        
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                          <label>Giới Tính</label>';
                          if (!isset($row['sex'])) {
                            echo '<span style="color: red"> Vui lòng chọn giới tính</span>';
                          }
                          echo '<select class="form-control" name="my_sex">
                               
                               ';
                              if(isset($row['sex']) && $row['sex'] == 'Nam'){
                                echo '
                                  <option value="Nam">Nam</option>
                                  <option value="Nữ">Nữ</option>
                                ';
                               }else{
                                echo '
                                  <option value="Nữ">Nữ</option>
                                  <option value="Nam">Nam</option>
                                ';
                               }
                               echo '
                          </select>
                        </div>

                        <div class="row">
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <div class="form-group">
                              <label>Ngày:</label>
                              <select class="form-control" name="day_bir">
                                ';
                                  for ($i=1; $i <= 31; $i++) { 
                                    if($i == date("d", strtotime($row['date_bir'])) ){
                                      echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    }else{
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                  }
                                
                        echo '</select>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <div class="form-group">
                              <label>Tháng:</label>
                              <select class="form-control" name="month_bir">';
                                  for ($i=1; $i <= 12; $i++) { 
                                    if ($i == date("m", strtotime($row['date_bir'])) ) {
                                      echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    }
                                    else {
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                  }
                                
                        echo '
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                              <label>Năm Sinh:</label>
                              <select class="form-control" name="year_bir">';
                              $year = date("Y");
                                  for ($i= $year; $i >= 1980; $i--) { 
                                    if ($i == date("Y", strtotime($row['date_bir']))) {
                                      echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    } else {
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    
                                  }
                                
                        echo '
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                          <label >Email</label>
                          <input type="text" name="my_email" class="form-control" value="'.$row['email'].'" disabled="" >
                        </div>
                        <div class="form-group">
                          <label >Số điện thoại: </label>
                          <input type="number" name="my_phone" class="form-control" value="'.$row['phone'].'">
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <button type="submit" class="btn btn-primary" name="submit_edit" value="'.$row['email'].'">Lưu thay đổi</button>
                        
                      </div>

                    </div

                    
                  </form>
              </div>

            ';
            break;
          }
          case 'address':{
            echo '
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="block-title"><b>Chỉnh sửa địa chỉ giao hàng</b> </h4>
                  <form method="POST">
                    <div class="row">
                      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>Địa Chỉ Giao Hàng:</label>
                          <textarea class="form-control" rows="5" name="my_address">'.$row['address'].'</textarea>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" name="submit_address" value="'.$row['email'].'">Lưu Địa Chỉ</button>
                        </div>
                      </div>
                    </div

                    
                  </form>
              </div>

            ';
            
            break;
          }
          
          
        }
      } else {

      
      
    ?>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 per-inf ">
      <h4 class="block-title"><b>Thông tin cá nhân</b> | <a href="quanlitaikhoan/edit" class="a">Chỉnh sửa</a></h4>
        
        <?php
          $tbl = "SELECT * FROM user WHERE email = '$tk' || phone = '$tk' ";
          $data = $user -> getalldata($tbl);
          foreach ($data as $row ) {
                echo '<p>'.$row['fullname'].'</p>';
                if(isset($row['phone'])){
                  echo '<p>'.$row['phone'].'</p>';
                }else{
                  echo '<p style="color: red">Vui lòng nhập số điện thoại</p>';
                }      
                if ($row['date_bir']!= null) {
                  echo '<p>'.date("d-m-Y", strtotime($row['date_bir'])).'</p>';
                }
              }
            ?>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 address">
        <h4 class="block-title"><b>Số địa chỉ</b> | <a href="quanlitaikhoan/address" class="a">Chỉnh sửa</a></h4>
          <?php
          $tbl = "SELECT * FROM user WHERE email = '$tk' || phone = '$tk' ";
          $data = $user -> getalldata($tbl);
          foreach ($data as $row ) {
            if(isset($row['address'])){
              echo '<p>'.$row['address'].'</p>';
            }else{
              echo '<p style="color: red">Vui lòng nhập địa chỉ</p>';
            }
                
          }
          ?>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pay-inf">
        <h4 class="block-title"><b>Thông tin thanh toán</b></h4>
        <?php
          $tbl = "SELECT * FROM user WHERE email = '$tk' || phone = '$tk' ";
          $data = $user -> getalldata($tbl);
          foreach ($data as $row ) {
                echo '<p>'.$row['address'].'</p>
                      <p>'.$row['phone'].'</p>';
              }
        ?>
      </div>
      

      <?php
      }
      ?>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 recent-orders">
        <h4 class="block-title"><b>Đơn hàng gần đây</b> 
        
        </h4>
          
            <?php
              $tbl = "SELECT * FROM bill b join orderdetail od on b.id_bill = od.id_bill join sanpham sp on sp.masp = od.id_sp join statusbill sb on sb.id_statusbill = b.status WHERE email = '".$_SESSION['email']."' ORDER BY date_recive DESC LIMIT 0,3";
              if ( $user -> num_row($tbl) == 0){
                echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 delete-all-cart">
                      <p><b>Không có đơn hàng</b></p>
                      <button class="btn btn-default"><a href="sanpham">Tiếp Tục Mua Sắm</a></button>
                      </div>';
              }else {
              echo '<a href="listorder"> >> Xem Thêm</a>';
              $data = $user -> getalldata($tbl);
              foreach ($data as $row ) {
                echo '
                <div class="row detail_order ">
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
              }
            ?>
            

      
    </div>
  </div>
</div>



<div class="showcase block block-border-bottom-grey">
  <div class="container">
    <h2 class="block-title">
        Giỏ Hàng
    </h2>
    <?php
    if (isset($_POST['delete'])) {
      $sz = $_POST['size'];
      $id = $_POST['masp'];
      $stt = $_POST['delete_stt'];
      // $array =  $_SESSION['cart'][$id][$sz];
      // // echo json_encode($array); 
      unset($_SESSION['cart'][$id][$sz]);
      unset($_SESSION['rate']);
      // if ($stt == 1) {
      //   unset($_SESSION['cart']);
      // }
      header('location: listcart');
    }
    if (isset($_REQUEST['delete_all'])) {
      unset($_SESSION['cart']);
      unset($_SESSION['rate']);
      header('location: listcart');
    }
    if (isset($_POST['minus'])) {
      $sz = $_REQUEST['size'];
      $id = $_REQUEST['masp'];
      $_SESSION['cart'][$id][$sz]['qty'] -= 1;
      unset($_SESSION['rate']);
      header('location: listcart');
    }
    if (isset($_POST['plus'])) {
      $sz = $_REQUEST['size'];
      $id = $_REQUEST['masp'];
      $_SESSION['cart'][$id][$sz]['qty'] += 1;
      unset($_SESSION['rate']);
      header('location: listcart');
    }
    if (isset($_POST['submit_discount'])) {

      if ($user -> check_discount($_POST['discount'])!=0) {
        header('location: listcart');
      } else {
        echo '<script type="text/javascript">alert("Mã Giảm Giá Không Đúng");</script>';
      }
      
    }
    if (isset($_REQUEST['submit_payment'])) {
      header('location: payment');
    }
    ?>
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 listcart">
          <?php
          if (isset($_SESSION['cart'])) {
              echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 delete-all-cart"><form method="POST"><button class="btn btn-info" name="delete_all"><i class="fa fa-trash"> Xóa Tất Cả</i></button></form></div>';
              $i = 0;
              $total = 0;
              foreach ($_SESSION['cart'] as $key => $val) {
                foreach ($val as $key1 => $val1) {
                  $total_detail = 0;
                  echo '<form method=POST>';
                  echo '<div class="row detail-cart"><div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                          <img src="public/img/sanpham/'.$val1['name_img'].'" width="120px" height="50px">
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                          '.$val1['name'].'
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                          <p>'.$user->change_money($val1['price']).' ₫</p>
                          <button class="btn btn-default" name="delete" value="'.$key1.'"><i class="fa fa-trash"></i></button>
                          <input type="hidden" name="delete_stt" value="'.$i.'">
                          <input type="hidden" name="masp" value="'.$key.'">
                          <input type="hidden" name="size" value="'.$key1.'">
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                          '.$val1['size'].'
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                           ';
                          if ($val1['qty']==1) {
                            echo '<button class="btn btn-default" name="minus" disabled="true"><i class="fa fa-minus-square"></i></button>';
                          }else{
                            echo '<button class="btn btn-default" name="minus"><i class="fa fa-minus-square"></i></button>';
                          }
                            echo '<button class="btn btn-default" name="qty" disabled="true">'.$val1['qty'].'</button>';
                          if ($val1['qty']==10) {
                            echo '<button class="btn btn-default" name="plus" disabled="true"><i class="fa fa-plus-square"></i></button>';
                          }else{
                            echo '<button class="btn btn-default" name="plus"><i class="fa fa-plus-square"></i></button>';
                          }
                      echo '</div></form>';
                          echo '</div>';
                  $i = $i + 1;
                  $total_detail = $val1['price'] * $val1['qty'];
                  $total += $total_detail;

                }
              }
              $_SESSION['total'] = $total;
              echo '</div>

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="row info-bill">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p style="font-size: 20px" align="center"><b>Thông tin đơn hàng</b></p> 
          </div>
        </div>
        <div class="row info-bill">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <b>Tổng sản phẩm:</b>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              '.$i.' loại sản phẩm
          </div>
        </div>
        <div class="row info-bill">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <b>Phí Tạm Tính:</b>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              '.$user->change_money($_SESSION['total']).' ₫
          </div>
        </div>
        <div class="row info-bill">
          <form method="POST">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <div class="form-group">
              <input type="text" name="discount" class="form-control" value="" placeholder="Nhập Mã Giảm Giá" >
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="form-group">
              <input type="submit" name="submit_discount" class="form-control btn btn-info">
            </div>
          </div>  
          </form>
        </div>
        ';
        if (isset($_SESSION['rate'])) {
          echo '
        <div class="row info-bill">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <b>Giảm Giá:</b>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
             - '.$user->change_money($_SESSION['total_rate']).' ₫
          </div>
        </div>
          ';
        }
        echo '
        <div class="row info-bill">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <b>Tổng Tiền:</b>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              ';
              
              if (isset($_SESSION['rate'])) {
                
                echo $user->change_money($_SESSION['total_disc']);
              }
              else{
                echo $user->change_money($_SESSION['total']);
              }
      echo ' ₫
          </div>
        </div>
        <div class="row info-bill">
          <form method="POST">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <button type="submit" name="submit_payment" class="form-control btn btn-primary">Xác Nhận Đơn Hàng</button>
          </div>
          </form>
        </div>     
        
      </div>';
            }
            else {
              echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 delete-all-cart">
              <p><b>Không có sản phẩm.</b></p>
              <button class="btn btn-default"><a href="sanpham">Tiếp Tục Mua Sắm</a></button>
              </div>';
            }
            
          
      
      
      ?>
    </div>
  </div>
</div>


          
          
          
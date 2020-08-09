<div class="container">
        <div class="navbar navbar-default">
          <!--mobile collapse menu button-->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <!--social media icons-->
          <div class="navbar-text social-media social-media-inline pull-right">
            <!--@todo: replace with company social media details-->
            <a href="listcart"><i class="fa fa-cart-plus cart"></i></i></a>
            <?php
              if (isset($_SESSION['cart'])) {
                $qty_in_cart = 0;
                foreach ($_SESSION['cart'] as $key => $val) {
                  foreach ($val as $key1 => $val1) {
                    $qty_in_cart = $qty_in_cart + $val1['qty'] ;
                  }
                }
                echo '<span style="color: red">( '.$qty_in_cart.' )</span>';
              }
            ?>
          </div>
          <!--everything within this div is collapsed on mobile-->
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav" id="main-menu">
              <li class="icon-link">
                <a href="trangchu"><i class="fa fa-spa"></i></a>
              </li>
              <li><a href="sanpham">sản phẩm</a></li>
              <li class="dropdown dropdown-mm">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">hãng<b class="caret"></b></a>
                <!-- Dropdown Menu -->
                <ul class="dropdown-menu dropdown-menu-mm dropdown-menu-persist">
                  <?php
                    $tbl = "SELECT ten_hang FROM hang";
                    $data = $user -> getalldata($tbl);
                    foreach ($data as $row ) {
                          echo '<li><a href="hang/'.$user -> makeurl($row['ten_hang']).'/1">   '.$row['ten_hang'].'</a></li>';
                        }
                  ?>
                </ul>
                 
              </li>
              <li><a href="listcart">giỏ hàng</a></li>
              <li><a href="lienhe">Liên Hệ</a></li>
              <?php
              if (isset($_SESSION['email']) && isset($_SESSION['pw'])  ) {
                echo '
                <li class="dropdown dropdown-mm">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tài khoản<b class="caret"></b></a>
                <!-- Dropdown Menu -->
                <ul class="dropdown-menu dropdown-menu-mm dropdown-menu-persist">
                  <li><a href="quanlitaikhoan">Quản lí tài khoản</a></li>
                  <li><a href="payment">Thanh Toán</a></li>
                  <li><a href="thaydoimatkhau">Đổi Mật Khẩu</a></li>
                  <li><a href="listorder">Quản Lí Đơn Hàng</a></li>
                </ul>
                 
              </li>
                
                ';
              } 
              

              ?>
            </ul>
          </div>
        </div>
      </div>
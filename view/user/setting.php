<div id="navigation" class="wrapper">
      <!--Hidden Header Region-->
      <div class="header-hidden collapse">
        <div class="header-hidden-inner container">
          <div class="row">
            
            <div class="col-md-6">
              <h3>
                  <b>Chúng Tôi</b>
                </h3>
              <address>
                  <strong>Upscale Neighborhood</strong>
                  <abbr title="Address"><i class="fa fa-pushpin"></i></abbr>
                  Bình Dương
                  <br>
                  <abbr title="Phone"><i class="fa fa-phone"></i></abbr>
                  0936649364
                  <br>
                  <abbr title="Email"><i class="fa fa-envelope"></i></abbr>
                  nguyenduy170898@gmail.com
                </address>
            </div>
            <div class="col-md-6" style="font-size: 20px;">
              <!--Colour & Background Switch for demo - @todo: remove in production-->
              
                <h3 class="block-title">
                    Cỏ 3 Lá
                  </h3>
                <p class="text-fancy">
                  Nếu bạn đang gặp khó khăn với thời trang, <b>Cỏ 3 Lá</b> chắc chắn sẽ mang đến cho bạn những điều may mắn và thể hiện phong cách riêng mình.
                </p>
             
              
              
            </div>
          </div>
        </div>
      </div>
      <!--Header & navbar-branding region-->
      <div class="header">
        <div class="header-inner container">
          <div class="row">
            <div class="col-md-8">
              <!--navbar-branding/logo - hidden image tag & site name so things like Facebook to pick up, actual logo set via CSS for flexibility -->
              
              
              <div class="row">
                <div class="col-md-3">
                  <span style="font-size: 40px; color: green; font-family: Garamond; "><b>Cỏ 3 lá</b></span>
                </div>
                <div class="col-md-3">
                  <a  href="trangchu">
                    <img src="public/img/co3la1.png" alt="Upscale Neighborhood Logo">
                  </a>
                </div>
              </div>
            </div>
            <!--header rightside-->
            <div class="col-md-4">
              <!--user menu-->

              <ul class="list-inline user-menu pull-right">
                <li class="user-button"><a class="btn btn-primary btn-hh-trigger" role="button" data-toggle="collapse" data-target=".header-hidden">Open</a></li>
              </ul>
              
              <?php
              if (isset($_SESSION['email']) && isset($_SESSION['pw'])  ) {
                $tk = $_SESSION['email'];
                echo '
                <ul class="list-inline user-menu pull-right">
                  <li class="user-register"><i class="text-primary ">'.$_SESSION['email'].'</i></li>
                  <li class="user-register"><i class="fa fa-sign-out-alt text-primary "></i> <a href="dangxuat" class="text-uppercase">Đăng Xuất</a></li>
                </ul>';
              } else {
                echo '
                <ul class="list-inline user-menu pull-right">
                <li class="user-register"><i class="fa fa-edit text-primary "></i> <a href="dangki" class="text-uppercase">Đăng Kí</a></li>
                <li class="user-login"><i class="fa fa-sign-in-alt text-primary"></i> <a href="dangnhap" class="text-uppercase">Đăng Nhập</a></li>
                </ul>';
              }
              

              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="showcase block block-border-bottom-grey">
  <div class="container">
    <h2 class="block-title">
        <a href="sanpham">Sản Phẩm</a>
    </h2>
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
      <?php

        $tbl = "SELECT * FROM sanpham sp join hang h on sp.hang=h.id_hang WHERE masp = ".$_REQUEST['id'];
        $user -> check_id_url($tbl,'404error');
        $data = $user -> getalldata($tbl);
        foreach ($data as $row ) {
          $_SESSION['hang'] = $row['hang'];
          echo '
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 img_chitietsp">
                <img src="public/img/sanpham/'.$row['hinh_sp'].'" >

              </div>
              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 inf_chitietsp">
                <form method="POST">
                <p><h1>'.$row['ten_hang'].'</h1></p>
                <h2><p style="color: red">'.$row['tensp'].'</p></h2>
                <h2><p style="color: red">'.$user->change_money($row['gia']).' ₫</p></h2>
                <div class="form-group">
                  <label>Size:</label>
                  <select class="form-control" name=size>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                  </select>
                  <label>Số lượng:</label>
                  <input type="number" class="form-control" name="soluong" value="1" min="1" max="10">
                  <br>
                  
                  <div class=row>
                    <div class="col-sm-5">
                      <input type="hidden" name="name_img" value="'.$row['hinh_sp'].'">
                      <button type="submit" class="btn btn-primary" name="add_cart" value="'.$row['masp'].'">
                        <i class="fa fa-plus"> Thêm Vào Giỏ Hàng</i>
                      </button>
                    </div>
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-primary" name="buy_now" value="'.$row['masp'].'">
                        <i class="fa fa-plus"> Mua Ngay</i>
                      </button>
                    </div>
                  </div>
                </div>
                </form>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form method=POST>
                      <div class="form-group">
                        <label>Viết bình luận:</label>
                        <textarea class="form-control" rows="5" name="my_cmt"></textarea>
                      </div>
                      <div class="form-group">
                        <button type="submit" name="submit_cmt" class="btn btn-info">Gửi</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
          ';
          }
          include('comment.php');
        ?> 
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 lienquan">
          <h3 align="center" style="color: #87CEFF; font-size: 22px"><b>Sản phẩm liên quan</b></h3>
          
          <?php
          $tbl = "SELECT * FROM sanpham WHERE hang = ".$_SESSION['hang']." LIMIT 0,4";
          $data = $user -> getalldata($tbl);
          foreach ($data as $row ) {
            echo '
              <div class="row sp_lienquan">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
              <a href="chitietsanpham/'.$row['masp'].'/'.$user -> makeurl($row['tensp']).'">
                <img title="'.$row['tensp'].'" src="public/img/sanpham/'.$row['hinh_sp'].'" >
              </a>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
              <p style="color: black; font-size: 15px"><a href="chitietsanpham/'.$row['masp'].'/'.$user -> makeurl($row['tensp']).'">'.$row['tensp'].'</a></p>
              <p>'.$user -> change_money($row['gia']).' ₫</p>
            </div>
          </div>
            ';
              }
          ?>

        
      </div>

    </div>      
  </div>
</div>
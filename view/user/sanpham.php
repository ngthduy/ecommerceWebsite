<div class="showcase block block-border-bottom-grey">
  <div class="container">
    <h2 class="block-title">
        Sản Phẩm
    </h2>
    <div class="row">
      <?php
        if (isset($_REQUEST['trang'])) {
          $trang = $_REQUEST['trang'];
          settype($trang,"int");// ép kiểu số nguyên
        } else {
          $trang = 1;
        }
        $tbl = "SELECT * FROM sanpham sp join hang h on sp.hang=h.id_hang ORDER BY sp.masp DESC";
        if ( $user-> sotrang($tbl,12) >= $trang ){
          $tbl_break_pro = $user->break_product($tbl,12,$trang);
          $data = $user -> getalldata($tbl_break_pro);
          foreach ($data as $row ) {
            echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">
                    <a href="chitietsanpham/'.$row['masp'].'/'.$user -> makeurl($row['tensp']).'">
                      <img src="public/img/sanpham/'.$row['hinh_sp'].'" title="'.$row['tensp'].'" >
                    </a>
                    <p style="font-size: 13px" class="text-weight-strong">
                      <a href="hang/'.$user -> makeurl($row['ten_hang']).'/1" title="'.$row['ten_hang'].'">'.$row['ten_hang'].'</a>
                      <h5>'.$user->change_money($row['gia']).' ₫</h5>
                    </p>
                    <p><a href="chitietsanpham/'.$row['masp'].'/'.$user -> makeurl($row['tensp']).'">
                      <b>'.$row['tensp'].'</b>
                      </a></p>
                    <p>
                      
                  </div>';
          }
      ?>
    </div>    
    <?php
          $user -> break_page($tbl,12,'sanpham');
        }else{
          echo '<p align="center">Không tìm thấy sản phẩm nào</p>';
        }
    ?>
         
  </div>
</div>
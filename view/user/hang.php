<div class="showcase block block-border-bottom-grey">
  <div class="container">
    <h2 class="block-title">
        <?php
        echo $hang = $user -> makehang($_REQUEST['hang']);
        ?>
    </h2>
    <div class="row">
      
      <?php
        if (isset($_REQUEST['trang'])) {
          $trang = $_REQUEST['trang'];
          settype($trang,"int");// ép kiểu số nguyên
        } else {
          $trang = 1;
        }
        $tbl = "SELECT * FROM sanpham sp join hang h on sp.hang=h.id_hang WHERE ten_hang = '$hang'";
        if ( $user-> sotrang($tbl,8) >= $trang ){
        $tbl_break_pro = $user->break_product($tbl,8,$trang);
        $data = $user -> getalldata($tbl_break_pro);
        foreach ($data as $row ) {
          echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">
        <a href="chitietsanpham/'.$row['masp'].'/'.$user -> makeurl($row['tensp']).'">
          <img src="public/img/sanpham/'.$row['hinh_sp'].'" title="'.$row['tensp'].'" >
        </a>
        <p style="font-size: 13px" class="text-weight-strong">
          
          <h5>'.$user->change_money($row['gia']).' ₫</h5>
        </p>
        <p><a href="chitietsanpham/'.$row['masp'].'/'.$user -> makeurl($row['tensp']).'">
          <b>'.$row['tensp'].'</b>
          </a></p>
        
      </div>';
        }


      ?>
    </div>
    <?php
      $user -> break_page($tbl,8,'hang/'.$user -> makeurl($row['ten_hang']));
    }else{
      echo '<p align="center">Không tìm thấy sản phẩm nào</p>';
    }
    ?>      
  </div>
</div>
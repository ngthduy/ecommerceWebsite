<div class="showcase block block-border-bottom-grey">
  <div class="container">
    <h2 class="block-title">
        Kết Quả Tìm Kiếm
    </h2>
    <div class="row">
      
      <?php
        if (isset($_REQUEST['trang'])) {
          $trang = $_REQUEST['trang'];
          settype($trang,"int");// ép kiểu số nguyên
        } else {
          $trang = 1;
        }
        $sptren1trang = 12;
        $from = ( $trang - 1 ) * $sptren1trang;
        $tbl = "SELECT * FROM sanpham sp JOIN hang h ON sp.hang = h.id_hang WHERE tensp like '%$key%' || gia like '%$key%' || ten_hang like '%$key%' LIMIT $from , $sptren1trang ";
        $total =  $user->num_row($tbl);
        if ( $total != 0) {
        $data = $user -> getalldata($tbl);
        $sotrang = ceil($total / $sptren1trang);
        foreach ($data as $row ) {
          echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">
        <a href="chitietsanpham/'.$row['masp'].'/'.$user -> makeurl($row['tensp']).'">
          <img src="public/img/sanpham/'.$row['hinh_sp'].'" title="'.$row['tensp'].'" >
        </a>
        <p style="font-size: 13px" class="text-weight-strong">
          <a href="hang/'.$user -> makeurl($row['hang']).'/1" title="'.$row['hang'].'">'.$row['ten_hang'].'</a>
          <h5>'.$row['gia'].' ₫</h5>
        </p>
        <p><a href="chitietsanpham/'.$row['masp'].'/'.$user -> makeurl($row['tensp']).'">
          <b>'.$row['tensp'].'</b>
          </a></p>
        
      </div>';
        }
      ?>
    </div>
    <br>
    <div class="phantrang">
    <?php
          $total_page = "SELECT * FROM sanpham sp JOIN hang h ON sp.hang = h.id_hang WHERE tensp like '%$key%' || gia like '%$key%' || ten_hang like '%$key%' ";
          $total =  $user->num_row($total_page);
          $sotrang = ceil($total / $sptren1trang);
          for ($i=1; $i <= $sotrang ; $i++) { 
            echo '<span style="color: black">
              <a href="sanpham/trang'.$i.'">Trang '.$i.'</a> 
            </span>';
          }
        ?>
    </div>
    <?php
    }else {
      echo '
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
          <p style="font-size: 20px">Không tìm thấy sản phẩm nào liên quan</p>
        </div>
      ';
      
    }
    ?>     
  </div>
</div>
<div class="hero" id="highlighted">
  <div class="inner">
    <div id="highlighted-slider" class="container">
      <p>Sản Phẩm Nổi Bật</p>
      <div class="item-slider" data-toggle="owlcarousel" data-owlcarousel-settings='{"singleItem":true, "navigation":true, "transitionStyle":"fadeUp"}'>
      <!--Slideshow content-->
      <?php
          $tbl = "SELECT * FROM slide s left join sanpham sp on s.id_sp_slide = sp.masp";
          $data = $user -> getalldata($tbl);
          foreach ($data as $row ) {
            echo "<div class='item'>
      <div class='row'>
      <div class='col-md-6 col-md-push-6 item-caption'>
      <h2 class='h1 text-weight-light'>
      <span class='text-primary'>".$row['tensp']."</span>
      </h2>
      <h4>
      Giá: ".$user->change_money($row['gia'])." ₫
      </h4>
      
      </div>
      <div class='col-md-6 col-md-pull-6 hidden-xs'>
      <img src='public/img/sanpham/".$row['hinh_sp']."' alt='".$row['tensp']."' width='200px' hieght='200px' class='center-block img-responsive'>
      </div>
      </div>
      </div>";
      }
        ?>

      </div>
    </div>
  </div>
</div>
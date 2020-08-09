<div class="showcase block block-border-bottom-grey">
      <div class="container">
    <div class="testimonials block-contained">
      <div class="row">
        <!--Customer testimonial-->
        <a href="#"><h3 class="block-title">
              Tin Tức
        </h3></a>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          
          <?php
          $tbl = "SELECT * FROM tintuc ORDER BY ngay desc LIMIT 2";
          $data = $user -> getalldata($tbl);
          foreach ($data as $row ) {
                echo "
                <div class='media'>
                  <div class='media-left hidden-xs'>
                    <img src='public/img/tintuc/".$row['hinh_tintuc']."'>
                    <div class='date-wrapper'> 
                      <span class='date-m'>".date("M",strtotime($row['ngay']))."</span> <span class='date-d'>".date("d",strtotime($row['ngay']))."</span> 
                    </div>
                  </div>
                  <div class='media-body'>
                    <h4 class='media-heading'><b>".$row['tieude']."</b></h4>
                    <a href='#' alt='".$row['tieude']."'>Xem Thêm<i class='fa fa-angle-right'></i></a>
                  </div>
                </div>";
              }
            ?>

        </div>

        <!--Latest Blog posts-->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 blog-roll">
          <?php
          $tbl = "SELECT * FROM tintuc ORDER BY ngay desc LIMIT 2,1";
          $data = $user -> getalldata($tbl);
          foreach ($data as $row ) {
                echo "
                <div class='media'>
                  <div class='media-left hidden-xs'>
                    <img src='public/img/tintuc/".$row['hinh_tintuc']."'>
                    <div class='date-wrapper'> 
                      <span class='date-m'>".date("M",strtotime($row['ngay']))."</span> <span class='date-d'>01</span> 
                    </div>
                  </div>
                  <div class='media-body'>
                    <h4 class='media-heading'><b>".$row['tieude']."</b></h4>
                    <a href='#' alt='".$row['tieude']."'>Xem Thêm<i class='fa fa-angle-right'></i></a>
                  </div>
                </div>";
              }
            ?>
          

        </div>
      </div>
    </div>
  </div>
</div>
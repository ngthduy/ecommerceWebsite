<div class="showcase block block-border-bottom-grey">
      <div class="container">
        <h2 class="block-title">
            Sản Phẩm Hot
        </h2>
        <p></p>
        <div class="item-carousel" data-toggle="owlcarousel" data-owlcarousel-settings='{"items":4, "pagination":false, "navigation":true, "itemsScaleUp":true}'>

        <?php
          $tbl = "SELECT * FROM hot h JOIN sanpham s ON h.masp_hot = s.masp";
          $data = $user -> getalldata($tbl);
          foreach ($data as $row ) {
            echo '<div class="item clear">
            <a href="chitietsanpham/'.$row['masp'].'/'.$user -> makeurl($row['tensp']).'" class="overlay-wrapper">
                <img src="public/img/sanpham/'.$row['hinh_sp'].'" alt="'.$row['tensp'].'" class="img-responsive underlay">
                <span class="overlay">
                  <span class="overlay-content">
                    <span class="h4">'.$row['tensp'].'
                    </span> 
                  </span>
                </span>
            </a>
            <div class="item-details bg-noise">
              <h4 class="item-title">
                  <a href="chitietsanpham/'.$row['masp'].'/'.$user -> makeurl($row['tensp']).'">'.$row['tensp'].'</a>
              </h4>
              
              <p>'.$user -> change_money($row['gia']).' ₫</p>
              
            </div>
          </div>';
              }
        ?>

          
        </div>
      </div>
    </div>
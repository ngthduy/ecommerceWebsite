<div class="modal" id="modal-payment-cod">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <p align="center"><h3 class="modal-title"><b>Thanh Toán Khi Nhận Sản Phẩm (COD)</b></h3></p>
          <!-- <button type="button" class="close" data-dismiss="modal">×</button> -->
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <p>Tổng Tiền:</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <p><?php 
              if(isset($_SESSION['total_rate'])) 
                {echo $user->change_money($_SESSION['total_disc'])." ₫";}
                 else {echo $user->change_money($_SESSION['total'])." ₫";}
                 ?></p>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <p>Vui lòng chuẩn bị số tiền tương ứng khi nhận hàng</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <p>Ngày Nhận Hàng:</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <?php 

              $_SESSION['recive_date'] = mktime(0, 0, 0, date('m'), date('d')+5, date('Y'));
              echo '<p><b>'.date('d/m/Y', $_SESSION['recive_date']).'</b></p>';
              ?>
            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <form method="POST">
            <button type="submit" class="btn btn-primary" value="1" name="submit-cod" name="submit-cod" data-dismiss="modal">Xác Nhận</button>
          </form>
          <button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Hủy</button>
        </div>
        
      </div>
    </div>
</div>


<div class="modal" id="modal_size_chart">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <p align="center"><h3 class="modal-title"><b>Kích Thước sản phẩm</b></h3></p>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <img src="public/img/size_chart.png">
            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Hủy</button>
        </div>
        
      </div>
    </div>
</div>

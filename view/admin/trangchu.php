
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="admin/">Trang Chủ</a>
  </li>
</ol>
<div class="card mb-3">
  <div class="card-header">
   <i class="fas fa-pen-fancy"></i>
     Quản Lí Hệ Thống</div>
  <div class="card-body">
    <div class="container">
    	<div class="row">
    		<div class="col-lg-4 col-md-3 col-sm-3 col-xs-3  detail-report">
    			<div class="bg-danger info-report">
    				<span>Số lượng sản phẩm:</span>
    				<?php
    					echo '<span style="font-size: 30px;">'.$ad -> num_row("SELECT * FROM sanpham").'</span>';
    				?>
    			</div>
    		</div>
    		<div class="col-lg-4 col-md-3 col-sm-3 col-xs-3 detail-report">
    			<div class="bg-info info-report">
    				<span>Tổng Khách Hàng:</span>
    				<?php
    					echo '<span style="font-size: 30px;">'.$ad -> num_row("SELECT * FROM user").'</span>';
    				?>
    				<p>
    					<span>Tổng Tiền Lượt Truy Cập:</span>
    				<?php
    					$tbl = "SELECT SUM(count_login) AS count_login FROM user";
						echo '<span style="font-size: 30px;">'.$ad -> count_avg_sum($tbl).'</span>';
    				?>
    				</p>
    			</div>
    		</div>
    		<div class="col-lg-4 col-md-3 col-sm-3 col-xs-3 detail-report">
    			<div class="bg-primary info-report">
    				<span>Tổng Đơn Hàng:</span>
    				<?php
    					echo '<span style="font-size: 30px;">'.$ad -> num_row("SELECT * FROM bill").'</span>';
    				?>
    				<p>
    					<span>Tổng Tiền Bán Hàng:</span>
    				<?php
    					$tbl = "SELECT SUM(amount_bill) AS Total_bill FROM bill";
						echo '<span style="font-size: 30px;">'.$ad -> change_money($ad -> count_avg_sum($tbl)).'</span>';
    				?>
    				</p>
    			</div>
    		</div>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3 detail-report">
                <div class="bg-success info-report">
                    <span>Tổng Đơn Hàng Trong Tuần:</span>
                    <?php
                        echo '<span style="font-size: 30px;">'.$ad -> num_row( $ad -> bill_week() ).'</span>';
                    ?>
                    <p>
                        <span>Tổng Tiền Bán Hàng Trong Tuần:</span>
                    <?php
                        $sql = $ad -> bill_week();
                        echo '<span style="font-size: 30px;">'.$ad -> change_money($ad -> total_bill_week($sql)).'</span>';
                    ?>
                    </p>
                </div>
            </div>
    	</div>
  	</div>
  </div>


<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/">Trang Chủ</a>
      </li>
      <li class="breadcrumb-item active">Danh Sách Hóa Đơn</li>
    </ol>
    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header ">
       <i class="fas fa-pen-fancy"></i>
         Danh Sách Hóa Đơn</div>
      <div class="card-body">
        <div class="container">
        <div class="table-responsive-xl">

             <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã Hóa Đơn</th>
                <th>Khách Hàng</th>
                <th>Tổng Tiền</th>
                <th>Thanh Toán</th>
                <th>Ngày Đặt</th>
                <th>Ngày Giao</th>
                <th>Trạng Thái</th>
                <th>Xem Chi Tiết</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $tbl = "SELECT * FROM bill b left join statusbill s on b.status = s.id_statusbill ";
                $data = $ad -> getalldata($tbl);
                $i = 1;
                foreach ($data as $row ) {
                  
                      echo '
                        <tr>
                          <td>'.$i.'</td>
                          <td>'.$row['id_bill'].'</td>
                          <td>'.$row['email'].'</td>
                          <td>'.$ad->change_money($row['amount_bill']).'</td>
                          <td>'.$row['payment'].'</td>
                          <td>'.date("d-m-Y",strtotime($row['date_order'])).'</td>
                          <td>'.date("d-m-Y",strtotime($row['date_recive'])).'</td>
                          <td>'.$row['trangthai'].'</td>
                          <td>
                            <a href="admin/listbill/edit/'.$row['id_bill'].'">
                            <button class="btn btn-outline-primary">Chi Tiết</button></a> 
                          </td>
                        </tr>
                      ';
                    
                  $i++;
                    }
                  
              ?>
            </tbody>
          </table>
          
        </div>
        
     
    </div>
  </div>
</div>
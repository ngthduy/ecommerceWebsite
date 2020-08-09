
<!-- Area Chart Example-->
<div class="card mb-3">
  <div class="card-header">
   <i class="fas fa-pen-fancy"></i>
     Chỉnh Sửa Sản Phẩm</div>
  <div class="card-body">
    <div class="container">
    <div class="table-responsive-xl">
        <table class="table table-bordered" width="100%" border="0" cellspacing="0">
          <thead>
            <tr>
              <th style="text-align:center;">Mã Hóa Đơn</th>
              <th style="text-align:center;">Hình</th>
              <th style="text-align:center;">Tên Sản Phẩm</th>
              <th style="text-align:center;">Size</th>
              <th style="text-align:center;">Số Lượng</th>
              <th style="text-align:center;">Tổng Tiền</th>

            </tr>
          </thead>
          <tbody>
          <?php
            $tbl = "SELECT * FROM bill b join orderdetail od on b.id_bill = od.id_bill join sanpham sp on sp.masp = od.id_sp join statusbill sb ON sb.id_statusbill = b.status WHERE od.id_bill = ".$_REQUEST['idbill'];
            $ad -> check_id_url($tbl,'admin/404error');
            $data = $ad -> getalldata($tbl);
            foreach ($data as $row ) {
              echo '
                
                  <tr style="text-align:center;">
                    <td>'.$row['id_bill'].'</td>
                    <td><img src="public/img/sanpham/'.$row['hinh_sp'].'" width="120px" height="120px"></td>
                    <td>'.$row['tensp'].'</td>
                    
                    <td>'.$row['size_sp'].'</td>
                    
                    <td>'.$row['qty'].'</td>
                    <td>'.$ad->change_money($row['amount_order']).'</td>
                  </tr>';
                }
              echo '
                <form method="POST">
                  <tr>
                    <td>
                      <select class="form-control" name="status">';
                        $tbl = "SELECT * FROM statusbill";
                        $data = $ad -> getalldata($tbl);
                        foreach ($data as $row1 ) {
                              if ($row['status']==$row1['id_statusbill']) {
                                echo '<option value="'.$row1['id_statusbill'].'" selected >'.$row1['trangthai'].'</option>';
                              } else {
                                echo '<option value="'.$row1['id_statusbill'].'">'.$row1['trangthai'].'</option>';
                              }
                                  
                                }
              echo  ' </select>
                    </td>
                    <td colspan=""   align="right">
                      <button class="btn btn-primary" name="submit-status-bill" value="Lưu"  width="100%" type="submit">Lưu</button>
                    </td>
                </form>
                    <td colspan="" align="right">
                      <a href="admin/bill">
                        <button class="btn btn-outline-info" width="100%" type="submit">Hủy</button>
                      </a>
                    </td>
                  </tr>    
                
                  
';
          ?>
            
        
          </tbody>
          
        </table>
      </div>
    </div>
  </div>
  </div>
  

  

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
              <th style="text-align:center;">Hình</th>
              <th style="text-align:center;">Tên Sản Phẩm</th>
              <th style="text-align:center;">Loại Sản Phẩm</th>
              <th style="text-align:center;">Giá</th>
              <th style="text-align:center;">Thay Đổi Hình</th>

            </tr>
          </thead>
          <tbody>
          <?php
            $tbl = "SELECT * FROM sanpham sp JOIN hang h ON sp.hang = h.id_hang WHERE masp = ".$_REQUEST['edit'];
            $ad -> check_id_url($tbl,'admin/404error');
            $data = $ad -> getalldata($tbl);
            foreach ($data as $row ) {
              echo '
                <form method="POST" enctype="multipart/form-data">                     
                  <tr>
                      <td>
                        <img src="public/img/sanpham/'.$row['hinh_sp'].'" width="100px" height="80px">
                      </td> 
                      <td>
                         <textarea class="form-control" style="height:80px;" name="edit_name_product" >'.$row['tensp'].'</textarea>
                       
                      </td>
                      <td >
                          <select name="edit_hang_product" class="form-control" style="height:60px;">';
                          $tbl = "SELECT * FROM hang";
                          $data = $ad -> getalldata($tbl);
                          foreach ($data as $row1 ) {
                              if ($row['hang']==$row1['id_hang']) {
                                echo '<option value="'.$row1['id_hang'].'" selected>'.$row1['ten_hang'].'</option>';
                              } else {
                                echo '<option value="'.$row1['id_hang'].'">'.$row1['ten_hang'].'</option>';
                              }
                              
                            }
                            
                    echo '</select>
                      </td>
                      <td>
                          <input type="number" class="form-control" name="edit_price_product" max="10000000" min="1000" step="1000" style="height:60px;" value="'.$row['gia'].'">
                      </td>
                      <td>
                          <input type="file" class="form-control" style="height:60px;" name="edit_img_product">
                      </td>
                  </tr>
                  <tr>
                    
                    <td colspan="5" align="right">
                      <button class="btn btn-primary" name="submit-edit-product" value="'.$_REQUEST['edit'].'" width="100%" type="submit">Lưu</button>
                    </td>
                  </tr>    
                </form>
                  <tr>
                    <td colspan="5" align="right">
                      <a href="admin/listproduct">
                        <button class="btn btn-outline-info" width="100%" type="submit">Hủy</button>
                      </a>
                    </td>
                  </tr>
              ';
                  
                }
          ?>
            
        
          </tbody>
          
        </table>
      </div>
    </div>
  </div>
  </div>
  
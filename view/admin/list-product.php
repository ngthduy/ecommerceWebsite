
<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/">Trang Chủ</a>
      </li>
      <li class="breadcrumb-item active">Danh Sách Sản Phẩm</li>
    </ol>
    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header ">
       <i class="fas fa-pen-fancy"></i>
         Danh Sách Sản Phẩm</div>
      <div class="card-body">
        <div class="container">
        <div class="table-responsive-xl">

             <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>Hình Ảnh</th>
                <th>Giá</th>
                <th>Thao Tác</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $tbl = "SELECT * FROM sanpham";
                $data = $ad -> getalldata($tbl);
                $i = 1;
                foreach ($data as $row ) {
                  
                      echo '
                        <tr>
                          <td>'.$i.'</td>
                          <td>'.$row['masp'].'</td>
                          <td>'.$row['tensp'].'</td>
                          <td>
                            <img src="public/img/sanpham/'.$row['hinh_sp'].'" width="100px" height="80px">
                          </td>
                          <td>'.$ad->change_money($row['gia']).'</td>
                          <td>
                            <a href="admin/listproduct/edit/'.$row['masp'].'">
                            <button class="btn btn-primary">Chỉnh Sửa</button></a>
                            <a href="admin/listproduct/delete/'.$row['masp'].'">
                            <button class="btn btn-outline-danger">Xóa</button></a>  
                            
                            
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
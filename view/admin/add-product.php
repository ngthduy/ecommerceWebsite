<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="admin/">Trang Chủ</a>
  </li>
  <li class="breadcrumb-item active">Thêm Sản Phẩm</li>
</ol>

<!-- Icon Cards-->
<div class="row">

</div>

<!-- Area Chart Example-->
<div class="card mb-3">
  <div class="card-header">
   <i class="fas fa-pen-fancy"></i>
     Thêm Sản Phẩm</div>
  <div class="card-body">
    <div class="container">
    <div class="table-responsive-xl">
        <table class="table table-bordered" width="100%" border="0" cellspacing="0">
          <thead>
            <tr>
              <th style="text-align:center;">Tên Sản Phẩm</th>
              <th style="text-align:center;">Loại Sản Phẩm</th>
              <th style="text-align:center;">Giá</th>
              <th style="text-align:center;">Hình</th>
            </tr>
          </thead>
          <tbody>
            <form method="POST" enctype="multipart/form-data">                     
              <tr>
                  <td>
                     <input type="text" class="form-control" style="height:60px;" name="name_product">
                   
                  </td>
                  <td >
                      <select name="hang_product" class="form-control" style="height:60px;">
                      <?php
                      $tbl = "SELECT * FROM hang";
                      $data = $ad -> getalldata($tbl);
                      foreach ($data as $row ) {
                            echo '<option value="'.$row['id_hang'].'">'.$row['ten_hang'].'</option>';
                          }
                        ?>
                      </select>
                  </td>
                  <td>
                      <input type="number" class="form-control" name="price_product" max="10000000" min="1000" step="1000" style="height:60px;" >
                  </td>
                  <td>
                      <input type="file" class="form-control" style="height:60px;" name="img_product">
                  </td>
              </tr>
              <tr>
                <td colspan="4" align="right">
                  <button class="btn btn-primary" name="submit-add-product" width="100%" type="submit">Đăng</button>
                </td>
              </tr>    
          </form>
        </div>
          </tbody>
          
        </table>
      
    </div>
  </div>
  </div>
  
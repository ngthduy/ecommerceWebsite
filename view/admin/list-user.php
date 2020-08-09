
<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/">Trang Chủ</a>
      </li>
      <li class="breadcrumb-item active">Danh Sách Khách Hàng</li>
    </ol>
    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header ">
       <i class="fas fa-pen-fancy"></i>
         Danh Sách Khách Hàng</div>
      <div class="card-body">
        <div class="container">
        <div class="table-responsive-xl">

             <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            
            <thead>
              <tr>
                <th>STT</th>
                <th>Email</th>
                <th>Tên</th>
                <th>Giới Tính</th>
                <th>Số lần ĐN</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $tbl = "SELECT * FROM user";
                $data = $ad -> getalldata($tbl);
                $i = 1;
                foreach ($data as $row ) {
                  
                      echo '
                        <tr>
                          <td>'.$i.'</td>
                          <td>'.$row['email'].'</td>
                          <td>'.$row['fullname'].'</td>
                          <td>'.$row['sex'].'</td>
                          <td>'.$row['count_login'].'</td>
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
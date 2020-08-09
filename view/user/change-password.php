<?php
  if (isset($_SESSION['email']) && $_SESSION['email'] != null ) {
    
  }
  else{
    $db->alert("Vui lòng đăng nhập");
    $db->location("dangnhap");
  }
?>
<div class="showcase block block-border-bottom-grey">
  <div class="container">
    <h2 class="block-title">
        Thay Đổi Mật Khẩu
    </h2>
    <div class="row">
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
      <div>
        <p>
          <span style='color: red; font-size: 20px'>Lưu Ý: </span>
          <span style='color: red'>Đổi mật khẩu thành công vui lòng đăng nhập lại</span>
        </p>
      </div>
        <form method=POST>
          <div class="form-group">
            <label>Mật Khẩu Cũ:</label>
            <input type="password" class="form-control" name="pw-old">
          </div>
          <?php if(in_array("Mật mật khẩu cũ không đúng", $error_array)) echo "<div><p style='color: red'>Mật mật khẩu cũ không đúng</p></div>"; ?>
          <div class="form-group">
            <label>Mật Khẩu Mới:</label>
            <input type="password" class="form-control" name="pw-new">
          </div>
          <?php
            if(in_array("Vui lòng điền password", $error_array)) echo "<div><p style='color: red'>Vui lòng điền password</p></div>";
            if(in_array("Vui lòng điền password tối thiểu 6 kí tự và tối đa 30 kí tự", $error_array)) echo "<div><p style='color: red'>Vui lòng điền password tối thiểu 6 kí tự và tối đa 30 kí tự</p></div>";
          ?>
          <div class="form-group">
            <label>Nhập Lại Mật Khẩu Mới:</label>
            <input type="password" class="form-control" name="pw-new-confirm">
          </div>
          <?php if(in_array("Mật khẩu không giống nhau", $error_array)) echo "<div><p style='color: red'>Mật khẩu không giống nhau</p></div>"; ?>
          <div class="form-group text-right">
            <button type="submit" name="submit_changpassword" class="btn btn-info">Thay Đổi</button>
          </div>
        </form>
      </div>
      
      
    </div>      
  </div>
</div>
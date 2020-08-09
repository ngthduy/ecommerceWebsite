<div class="services block block-bg block-border-bottom">
  <div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                  <b>Đăng Kí</b>
                </h3>
            </div>
            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="POST">
                <fieldset>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
                      <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                  </div>
                  <?php
                    if(in_array("Vui lòng điền email", $error_array)) echo "<div><p style='color: red'>Vui lòng điền email</p></div>";
                    if(in_array("Ðịnh dạng email không đúng", $error_array)) echo "<div><p style='color: red'>Ðịnh dạng email không đúng</p></div>";
                    if(in_array("Email đã tồn tại", $error_array)) echo "<div><p style='color: red'>Email đã tồn tại</p></div>";
                  ?>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
                      <input type="text" class="form-control" name="name" placeholder="Họ và Tên">
                    </div>
                  </div>
                  <?php
                    if(in_array("Vui lòng điền họ và tên", $error_array)) {echo "<div><p style='color: red'>Vui lòng điền họ và tên</p></div>";}
                    if(in_array("Vui lòng điền họ và tên tối thiểu 6 kí tự và tối đa 50 kí tự", $error_array)) {echo "<div><p style='color: red'>Vui lòng điền họ và tên tối thiểu 6 kí tự và tối đa 50 kí tự</p></div>";}
                  ?>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                      <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    </div>
                  </div>
                  <?php
                    if(in_array("Vui lòng điền password", $error_array)) echo "<div><p style='color: red'>Vui lòng điền password</p></div>";
                    if(in_array("Vui lòng điền password tối thiểu 6 kí tự và tối đa 30 kí tự", $error_array)) echo "<div><p style='color: red'>Vui lòng điền password tối thiểu 6 kí tự và tối đa 30 kí tự</p></div>";
                  ?>
                  <button class="btn btn-lg btn-primary btn-block" name="submit-reg" type="submit">Đăng Kí</button>
                </fieldset>
              </form>
              <p class="m-b-0 m-t">Đã có tài khoản <a href="dangnhap">Đăng nhập tại đây</a>.</p>
              
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
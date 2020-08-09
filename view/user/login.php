<?php
  if (isset($_SESSION['email']) && isset($_SESSION['pw'])) {
    $db->location('trangchu');
  }
?>
<div class="services block block-bg block-border-bottom">
  <div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                  <b>Đăng nhập</b>
                </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon fb"><a href="https://www.facebook.com/" class="fb"><i class="fab fa-facebook-square"></i></a></span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon gmail"><a href="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="gmail"><i class="fa fa-fw fa-envelope"> </i></a></span>
                    </div>
                  </div>
                </div>
              </div>
                      
              <form accept-charset="UTF-8" role="form" method="POST">
                <fieldset>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
                      <input type="text" class="form-control" name="email" value="<?php if (isset($_COOKIE["member_email"])) {
                        echo $_COOKIE["member_email"];
                      } ?>" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                      <input type="password" class="form-control" name="password" value="<?php if (isset($_COOKIE["member_password"])) {
                        echo $_COOKIE["member_password"];
                      } ?>" placeholder="Password">
                    </div>
                  </div>
                  <div class="checkbox">
                    <label>
                        <input name="remember" type="checkbox" value="remember" <?php if( isset($_COOKIE["member_email"]) && isset($_COOKIE["member_password"]) ) {
                          echo "checked";
                        } ?> >
                        Lưu tài khoản
                      </label>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block" name="submit-login" type="submit">Đăng nhập</button>
                </fieldset>
              </form>
              <p class="m-b-0 m-t">Chưa có tài khoản <a href="dangki">Đăng kí tại đây</a>.</p>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
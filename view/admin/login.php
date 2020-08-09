<?php
  
?>
<div class="container">
  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Đăng nhập Admin</div>
    <div class="card-body">
      <form method="POST">
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputEmail" name="user-admin" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
            <label for="inputEmail">Tài khoản Admin</label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputPassword" name="password-admin" class="form-control" placeholder="Password" required="required">
            <label for="inputPassword">Password</label>
          </div>
        </div>
        <!-- <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me">
              Remember Password
            </label>
          </div>
        </div> -->
        <button class="btn btn-primary btn-block" name="submit-login">Login</button>
      </form>
      <!-- <div class="text-center">
        <a class="d-block small mt-3" href="register.html">Register an Account</a>
        <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
      </div> -->
    </div>
  </div>
</div>

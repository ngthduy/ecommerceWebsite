<footer id="footer" class="block block-bg-grey-dark" data-block-bg-img="img/bg_footer-map.png" data-stellar-background-ratio="0.4">
    <div class="container">

      <div class="row" id="contact">

        <div class="col-md-3">
          <address>
              <strong>Upscale Neighborhood</strong>
              <br>
              <i class="fa fa-map-pin fa-fw text-primary"></i> Bình Dương
              <br>
              <i class="fa fa-phone fa-fw text-primary"></i> 0936649364
              <br>
              <i class="fas fa-envelope fa-fw text-primary"></i> nguyenduy170898@gmail.com
              <br>
            </address>
        </div>

        <div class="col-md-6">
          <h4 class="text-uppercase">
              Phản Hồi Về Chúng Tôi
          </h4>
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Tên Của Bạn" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Của Bạn" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Tiêu Đề" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Bạn Muốn Nói Gì Về Chúng Tôi"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Gửi</button></div>
            </form>
          </div>
        </div>

        <div class="col-md-3">
          <h4 class="text-uppercase">
              Theo Dõi Chúng Tôi
            </h4>
          <!--social media icons-->
          <div class="social-media social-media-stacked">
            <!--@todo: replace with company social media details-->
            <a href="https://www.facebook.com/ngthduy178"><i class="fab fa-facebook-f fa-fw"></i> Facebook</a>
            <a href="#"><i class="fab fa-google-plus-g fa-fw"></i> Google+</a>
          </div>
        </div>

      </div>

      <div class="row subfooter">
        <!--@todo: replace with company copyright details-->
        <div class="col-md-7">
          <p>Copyright © Flexor Theme</p>
          <div class="credits">
            Designed by <a href="https://www.facebook.com/ngthduy178">Nguyễn Thành Duy</a>
          </div>
        </div>
      </div>

      <a href="#top" class="scrolltop">Top</a>

    </div>
  </footer>
  <!-- Load Facebook SDK for JavaScript -->
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.3'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="443923479484574"
  logged_in_greeting="Xin chào ! Duy nè :))"
  logged_out_greeting="Xin chào ! Duy nè :))">
</div>
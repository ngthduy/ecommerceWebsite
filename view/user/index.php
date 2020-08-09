<!DOCTYPE html>
<html lang="en">
<?php

$user = new user;
$user->connect();
session_start();
ob_start(); 
// session_destroy();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'trangchu';
  }
if (isset($_SESSION['email']) && isset($_SESSION['pw'])) {
    $user -> confirm_login($_SESSION['email'],$_SESSION['pw']);
  } 
?>
<head>
  <meta charset="utf-8">
  <title>
  <?php


    if (isset($_REQUEST['tensp']))
    {

      $user->title($_REQUEST['tensp']);
    } else {
        if (isset($_REQUEST['hang'])){
          $user->title($_REQUEST['hang']);
        }else{
          $user->title($action);
        }   
    }
    ?>
  </title>
 
  <base href="http://nguyenthanhduy178.tk/co3la/"> 
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="public/img/co3la3.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="public/img/icons/114x114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/img/icons/72x72.png">
  <link rel="apple-touch-icon-precomposed" href="public/img/icons/default.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="public/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="public/lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">
  <link href="public/lib/owlcarousel/owl.theme.min.css" rel="stylesheet">
  <link href="public/lib/owlcarousel/owl.transitions.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="public/css/style.css" rel="stylesheet">
 <!--  <link href="public/css/colour-lavender.css" rel="stylesheet"> -->
  <link href="public/css/colour-blue.css" rel="stylesheet">
<!--   <link href="public/css/colour-green.css" rel="stylesheet"> -->

  <!--Your custom colour override - predefined colours are: colour-blue.css, colour-green.css, colour-lavander.css, orange is default-->
  <link href="#" id="colour-scheme" rel="stylesheet">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="public/img/favicon.ico"/>
</head>

<body class="page-index has-hero">
  <!--Change the background class to alter background image, options are: benches, boots, buildings, city, metro -->
  <div id="background-wrapper" class="buildings" data-stellar-background-ratio="0.1">

    
    <?php

    // Setting
    include('setting.php');
    // menu
    include('menu.php');
    // slide
    if ($action != 'dangki' && $action != 'dangnhap' && $action != 'quanlitaikhoan') {
      include('slide.php');
    }
    if (isset($_SESSION['email']) && $_SESSION['email'] != null) {
      include('chatbox.php');
    }
    ?>
  </div>
  
  <?php
  $error_array=array();
  switch ($action) {
    case 'trangchu':{
      include('search.php');
      include('sanphamhot.php');
      include('tintuc.php');
      include('views.php');
      include('footer.php');
      
      break;
    }
    case 'sanpham':{
      include('search.php');
      include('sanpham.php');
      include('tintuc.php');
      include('views.php');
      include('footer.php');
      break;
    }
    case 'lienhe':{
      include('search.php');
      include('lienhe.php');
      include('footer.php');
      break;
    }
    case 'dangki':{
      
      $error_array=array();
      if (isset($_POST['submit-reg'])) {
        $pw = $_POST['password'];
        $email = $_POST['email'];
        $fullname = $_POST['name'];
        if ($user -> checkreg($pw,$email,$fullname,$error_array)==1) {
          if ($user -> reg($pw,$email,$fullname) == 1) {
          echo '<script type="text/javascript">alert("Đăng kí thành công");</script>';
          $user -> checklogin($email,$pw);
          }
        }
        else {
          echo '<script type="text/javascript">alert("Đăng kí không thành công");</script>';
        } 
      }
      include('register.php');
      break;
    }
    case 'dangnhap':{
      include('login.php');
      break;
    }
    case 'dangxuat':{
      $user -> logout();
    }
    case 'chitietsanpham':{
      if ( (isset($_REQUEST['add_cart']) && $_REQUEST['add_cart'] != null) ||
            (isset($_REQUEST['buy_now']) && $_REQUEST['buy_now'] != null) ) {
        
        if (isset($_REQUEST['add_cart'])) {
          $id = $_REQUEST['add_cart'];
        } else {
          $id = $_REQUEST['buy_now'];
        }
        
        $sz = $_POST['size'];
        $sl = $_POST['soluong'];
        $img = $_POST['name_img'];
        $tbl = "SELECT * FROM sanpham WHERE masp = $id";
        $product = $user -> getdatasanpham($id);
        if ($product) {
          if (isset($_SESSION['cart'])) {
            if (isset($_SESSION['cart'][$id][$sz])) {
              $_SESSION['cart'][$id][$sz]['qty'] += $sl ;
            } else {
              $_SESSION['cart'][$id][$sz]['qty'] = $sl ;
            }
            $_SESSION['cart'][$id][$sz]['name'] = $product['tensp'] ;
            $_SESSION['cart'][$id][$sz]['price'] = $product['gia'] ;
            $_SESSION['cart'][$id][$sz]['size'] = $sz ;
            $_SESSION['cart'][$id][$sz]['name_img'] = $img ;
            echo '<script type="text/javascript">alert("Thêm sản phẩm vào giỏ hàng thành công");</script>';

          } else {
            $_SESSION['cart'][$id][$sz]['qty'] = $sl ;
            $_SESSION['cart'][$id][$sz]['name'] = $product['tensp'] ;
            $_SESSION['cart'][$id][$sz]['price'] = $product['gia'] ;
            $_SESSION['cart'][$id][$sz]['size'] = $sz ;
            $_SESSION['cart'][$id][$sz]['name_img'] = $img ;
            echo '<script type="text/javascript">alert("Tạo mới giở hàng thành công");</script>';
          }
          if (isset($_REQUEST['buy_now'])) {
            header('location: ../../listcart');
          }
        }else {
          echo '<script type="text/javascript">alert("Sản phẩm không tồn tại");</script>';
        }
        // echo "<pre />";
        // var_dump($_SESSION['cart']);
      }
      include('search.php');
      include('chitietsanpham.php');
      include('tintuc.php');
      include('views.php');
      include('footer.php');
      break;
    }
    case 'hang':{
      include('search.php');
      include('hang.php');
      include('tintuc.php');
      include('views.php');
      include('footer.php');
      break;
    }
    case 'thaydoimatkhau':{
      if (isset($_POST['submit_changpassword'])) {
        $old = $_POST['pw-old'];
        $new = $_POST['pw-new'];
        $new_confirm = $_POST['pw-new-confirm'];
        $user -> change_password($old,$new,$new_confirm,$error_array);
      }
      include('change-password.php');
      include('footer.php');
      break;
    }
    case 'quanlitaikhoan':{
      include('taikhoan.php');
      include('footer.php');
      if (isset($_POST['submit_edit'])) {
        $user -> update_per_info($_POST['submit_edit'],$_POST['fullname'],$_POST['my_sex'],$_POST['my_phone'],$_POST['day_bir'],$_POST['month_bir'],$_POST['year_bir']);

      }
      if (isset($_POST['submit_address'])) {
        $user -> update_address($_POST['submit_address'],$_POST['my_address']);
      }

      break;
    }
    case 'search':{
      include('search.php');
      if (isset($_POST['submit_search']) && $_POST['key_search']!= null) {
        $key =  $_POST['key_search'];
        include ('result-search.php');
       }else {
        header('location: trangchu');
       }
      include('footer.php');
      break;
    }
    case 'listcart':{
      include('search.php');
      include('list-cart.php');
      include('tintuc.php');
      include('views.php');
      include('footer.php');
      break;
    }
    case 'payment':{
      include('payment.php');
      include('footer.php');
      break;
    }
    case 'listorder':{
      include('search.php');
      include('list-order.php');
      include('tintuc.php');
      include('views.php');
      include('footer.php');
      break;
    }
    case '404error':{
      include('404error.php');
      include('footer.php');
      break;
    }
    
    default:{
      include('404error.php');
      include('footer.php');
      break;
    }
  }


    
  ?>
  


  <!-- Required JavaScript Libraries -->
  
  <script src="public/lib/jquery/jquery.min.js"></script>
  <script src="public/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="public/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="public/lib/stellar/stellar.min.js"></script>
  <script src="public/lib/waypoints/waypoints.min.js"></script>
  <script src="public/lib/counterup/counterup.min.js"></script>
  <script src="public/contactform/contactform.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="public/js/custom.js"></script>
  <script src="public/js/default.js"></script>
  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="public/js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="public/contactform/contactform.js"></script>

</body>

</html>

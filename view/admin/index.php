<?php
  session_start();
  $ad = new admin();
  $ad->connect();
  // session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

  <head>
     <base href="http://nguyenthanhduy178.tk/co3la/"> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cỏ 3 Lá</title>
    <link rel="icon" type="image/png" href="public/img/co3la3.png"/>
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="public/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>

  <body id="page-top">
  <?php
  if (!isset($_SESSION['user_admin']) && !isset($_SESSION['pw_admin'])) {
    if (isset($_POST['submit-login'])) {
      $ad -> login_admin($_POST['user-admin'],$_POST['password-admin']);
    }
    include('login.php');
  }
  else {
    include('menu.php');
  ?>
    

    <div id="wrapper">
      <?php
        include('function.php');
      ?>
      <div id="content-wrapper">

        <div class="container-fluid">
          <?php
            if (isset($_GET['action'])) {
              $action = $_GET['action'];
            } else {
              $action = 'trangchu';
            }
            switch ($action) {
              case 'trangchu':{
                include('trangchu.php');
                break;
              }
              case 'add':{
                include('add-product.php');
                break;
              }
              case 'bill':{
                if (isset($_REQUEST['idbill'])) {
                    if(isset($_REQUEST['submit-status-bill']) && $_REQUEST['submit-status-bill'] != null && $_REQUEST['status'] != null){
                      $ad -> update_status_bill($_REQUEST['status'],$_REQUEST['idbill']);
                    }
                    include('detail-bill.php');
                }
                include('bill.php');
                break;
              }
              case 'listuser':{
                include('list-user.php');
                break;
              }
              case 'listproduct':{
                if (isset($_REQUEST['edit'])) {
                    include('edit-product.php');
                    if (isset($_POST['submit-edit-product'])) {
                      $edit_id = $_POST['submit-edit-product'];
                      $edit_name = $_POST['edit_name_product'];
                      $edit_hang = $_POST['edit_hang_product'];
                      $edit_gia = $_POST['edit_price_product'];
                      $ad -> edit_product($edit_id,$edit_name,$edit_hang,$edit_gia);
                    }

                }
                if (isset($_REQUEST['delete'])) {
                  $ad -> delete_product($_REQUEST['delete']);
                }
                include('list-product.php');
                
                break;
              }
              case 'logout':{
                $ad -> logout_admin();
                break;
              }
              case '404error':{
                include('404.php');
                break;
              }
              
              default:{
                include('404.php');
                break;
              }
            }
          ?>
        </div>
      </div>
    </div>
    <!-- /#wrapper -->
    <?php
      include('footer.php');
    ?>

    

    <!-- Bootstrap core JavaScript-->
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="public/vendor/chart.js/Chart.min.js"></script>
    <script src="public/vendor/datatables/jquery.dataTables.js"></script>
    <script src="public/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="public/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="public/js/demo/datatables-demo.js"></script>
    <!-- <script src="public/js/demo/chart-area-demo.js"></script> -->

  </body>

</html>
<?php 

}

?>
<?php
class ctrl_index {  
     
     public function invoke()  
     {  
          if (isset($_GET['admin']))  
          {
               include ('model/admin.php');
               include ('view/admin/index.php'); 
               if (isset($_POST['submit-add-product'])) {
                    $name = $_POST['name_product'];
                    $hang = $_POST['hang_product'];
                    $gia = $_POST['price_product'];
                    //$type = $_FILES["img_product"]["type"];
                    $ad -> add_product($name,$hang,$gia);
               }
               
               
          } 
          else 
          {
               include ('model/user.php');
               include ('view/user/index.php');
               if (isset($_POST['submit-login'])) {
                    if (!empty($_POST['remember'])) {
                         $user -> checklogin($_POST['email'],$_POST['password'],'yes');
                    } else {
                         $_POST['remember'] = 'no';
                         $user -> checklogin($_POST['email'],$_POST['password'],'no');
                    }
                    
               }
          }  
     }  
}  
?>
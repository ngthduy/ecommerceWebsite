<?php
	include_once("ctrl/ctrl_index.php");  
	  
	$ctrl = new ctrl_index();  
	$ctrl->invoke();  

?>
<?php
        include('../config/config.php');
        $h = new home();
        $h->insert();
        ?>
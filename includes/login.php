<?php session_start() ?>
<?php ob_start() ?>
<?php include "db.php"?>
<?php include "../admin/function.php"?>


<?php

 
    if(isset($_POST['login']))
    
{


 login_user($_POST['user_name'], $_POST['password']);

}
?>
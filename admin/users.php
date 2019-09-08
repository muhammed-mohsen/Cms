<?php ob_start()?>
<?php include "function.php" ?>
<?php include "../includes/db.php"?>
 <?php include "include/admin_header.php" ?>


<?php


if(!is_admin($_SESSION['user_name']))
{
      header("Location: index.php");

}

 ?>

<div id="wrapper">
    <!-- Navigation -->
    <?php include "include/admin_navigation.php"?>



    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                 
                   
                   <h1 class="page-header">
                        welcome to Admin

                        <small>Author</small>
                    </h1>
                                        
                   <?php
    if(isset($_GET['source']))
    {
        $source = $_GET['source'];
      }  
else
{
    $source = '';
}
        switch($source)
        {
                case 'add_user';
                 include "include/add_user.php" ;
                break;
                case 'edit_user';
                 include "include/edit_user.php" ;
                break; 
                
                default:
                //code here
                include "include/view_all_users.php" ;
                delete_user();
                change_to_admin();
                change_to_sub();
                
                break;
                
            
        }
   
    
   ?>
                   
                </div> 
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->
</div>
            <?php include "include/admin_footer.php" ?>

<?php include "function.php" ?>
<?php include "../includes/db.php"?>
 <?php include "include/admin_header.php" ?>
<?php ob_start()?>
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
                case 'add_post';
                 include "include/add_posts.php" ;
                break;
                case 'edit_post';
                 include "include/edit_post.php" ;
                break; 
                
                default:
                //code here
                include "include/view_all_comments.php" ;
                delete_comments();
                unapprove_comment();
                approve_comment();
                
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

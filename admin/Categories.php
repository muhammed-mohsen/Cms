<?php include "function.php" ?>
<?php include "../includes/db.php"?>
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
                    <?php include "include/admin_header.php"?>

                    <div class="col-xs-6">
                        <?php  insert_categories(); ?>

                        <form action="" method="post">
                            <div class="form-group">

                                <label for="cat-title">Add Category</label>

                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="col-xs-6">
                                <form action="">
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                    </div>


                                </form>


                                <?php //update and include update
                                if(isset($_GET['edit']))
                                {
                                    $cat_id= $_GET['edit'];
                                  include "include/Update_categories.php";  
                                }
                                
                                
                                ?>
                            </div>





                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php //find All categories                                                                       
FindAllCategories(); ?>

                                    <?php DeleteCategories() ;?>

                                </tr>
                            </tbody>
                        </table>
                        <!--                        table>thead>tr>th*2-->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "include/admin_footer.php"  ?>

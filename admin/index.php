<?php include "../includes/db.php" ?>
<?php include "function.php" ?>

<?php ob_start();?>
<?php include "include/admin_header.php"  ?>
<div id="wrapper">



    <!-- Navigation -->
    <?php include "include/admin_navigation.php"?>



    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin


                        <small>
                            <?php echo $_SESSION['user_name'] ?></small>
                    </h1>
                                  
                                  
                                  </div>
            </div>
            <!-- /.row -->



            <!-- /.row -->

            <div class="row">
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-file-text fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
<?php 
    
    
    $query = "SELECT * FROM posts";
    $select_post= mysqli_query($connection,$query);
//to count number of posts we use function myqli_num_rows

$post_count = mysqli_num_rows($select_post); 
$query = "SELECT * FROM posts WHERE post_status = 'draft' ";
    $select_draft_post = mysqli_query($connection,$query);
//to count number of posts we use function myqli_num_rows

$post_draft_count = mysqli_num_rows($select_draft_post);

$query = "SELECT * FROM posts WHERE post_status = 'published'";
    $select_publish_post = mysqli_query($connection,$query);
//to count number of posts we use function myqli_num_rows

$post_publish_count = mysqli_num_rows($select_publish_post);
    
    
    $query = "SELECT * FROM comment WHERE comment_status = 'unapptoved' ";
    $select_comments = mysqli_query($connection,$query);
//to count number of posts we use function myqli_num_rows

$unapproved_commnet_count = mysqli_num_rows($select_comments);
    
    
    $query = "SELECT * FROM users WHERE user_role ='subscriber'";
    $select_users = mysqli_query($connection,$query);
//to count number of posts we use function myqli_num_rows
  $subscriber_count = mysqli_num_rows($select_users);
  



        ?>           

                   
                   
                   
                    <div class='huge'>
                    <?php echo $post_count ?>
                    </div>
                    <div>Posts</div>
                </div>
            </div>
        </div>
        <a href="posts.php">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                   <?php
                    $query = "SELECT * FROM comment ";
    $select_post = mysqli_query($connection,$query);
//to count number of posts we use function myqli_num_rows
  $comment_counts = mysqli_num_rows($select_post)
  ?>
                   
                    <div class='huge'><?php echo $comment_counts ?></div>
                    <div>Comments</div>
                </div>
            </div>
        </div>
        <a href="comments.php">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel panel-yellow">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class='huge'>
                    <?php 
     $query = "SELECT * FROM posts ";
    $select_user = mysqli_query($connection,$query);
   $users_count = mysqli_num_rows( $select_user);
        ?>   
                       <?php echo $users_count?>             
                        
                    </div>
                    <div> Users</div>
                </div>
            </div>
        </div>
        <a href="users.php">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel panel-red">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-list fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
             <?php 
     $query = "SELECT * FROM categories ";
    $select_category = mysqli_query($connection,$query);
//to count number of posts we use function myqli_num_rows
  $categories_count = mysqli_num_rows($select_category)
  ?>
                    <div class='huge'>  <?php echo $categories_count?> </div>
                    <div>Categories</div>
                </div>
            </div>
        </div>
        <a href="categories.php">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
                </div>
            </div>
            <!-- /.row -->
            
            
            <div class = "row" >
 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            <?php 
      
      
     $element_text = ['Active Posts','Draft Post','Published post','Comments','Pending Comments','Users','subscribers','Categories'];
      
      $element_count = [$post_counts,$post_draft_count,$post_publish_count,$comment_counts,$unapproved_commnet_count,$users_count, $subscriber_count,$categories_count]; 

    // loop in four element above                     
      
    for($i=0;$i<7;$i++) 
    {
        echo"['{$element_text[$i]}'" . "," ."{$element_count[$i]}],";
    }
      
      
      
      
      ?> 
//          ['Posts', 1000],
         
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
               
                                               
                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                
            </div>
            





        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "include/admin_footer.php"  ?>

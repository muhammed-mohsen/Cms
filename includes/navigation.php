
       <?php include 'admin/function.php'?>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/cms">CMS Front</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
               <?php  

                    //we can limit what we want to show by LIMIT 3 in below
                    $query = "SELECT * FROM categories ";
                    $select_all_query = mysqli_query($connection , $query);
                   
                    
                                while($row= mysqli_fetch_assoc($select_all_query))
                                {
                                    $cat_title=$row['cat_title'];
                                    $cat_id=$row['cat_id'];
                                  
                                   $category_class = '';
                        $registration_class = '';
                        $registration = 'registration.php';
                        // echo $_SERVER['PHP_SELF'];die;
                  $pageName= basename($_SERVER['PHP_SELF']);
               //echo $cat_id.' '.$_GET['category'];
                  if(isset($_GET['category'])&&$_GET['category'] == $cat_id)
                  {
                    $category_class = 'active';


                  }
                  else if ($pageName == $registration) {
                       $registration_class = 'active';
                  }

                                    echo "<li class='$category_class'><a href='/cms/category/{$cat_id}'> {$cat_title} </a></li>";
                                }
                                ?>
           <?php       if(isLoggedIn())
                    {

              if(is_admin($_SESSION['user_role']))
              {
                   ?>
                      <li>
                        <a href="/CMS/admin">Admin</a>
                    </li>
                  <?php } ?>
                     <li>
                        <a href="/CMS/includes/logout.php">Logout</a>
                    </li>
            <?php   }
            else
            {
           ?>

                  <li>
                        <a href="/CMS/login">Login</a>
                    </li>
                    <?php }?>      
                       <li class="<?php echo $registration_class?>" >
                        <a href="/cms/registration">Registration</a>
                    </li>
                       <?php 
//                    $user = $_SESSION['user_role'];
//                    echo $user ; die;
                    if(isset($_SESSION['user_role']))
                    {

                    if(isset($_GET['p_id']))
                    {
                        $post_id=$_GET['p_id'];
                       

                        echo "<li><a href='/cms/admin/posts.php?source=edit_post&p_id=$post_id'>Edit Post</a></li>";
                       
                        
//                        $post_title = $row['post_title'];
//                        
//                        echo "<li><a href='../admin/posts.php?source=edit_post&p_id=$post_id'> '{$post_title} '</a></li>";
//  
                        }  
                    }
                    
                    ?>
<!--
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

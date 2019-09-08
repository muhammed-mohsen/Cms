<?php include "function.php" ?>
<?php include "../includes/db.php"?>
 <?php include "include/admin_header.php" ?>
<?php ob_start()?>
<?php

if(isset($_SESSION['user_name']))
{
    $username = $_SESSION['user_name'];
    
    $query = "SELECT * FROM users WHERE user_name ='{$username}'";
       
    $select_usre_profile_query = mysqli_query($connection , $query);
    
    confirm($select_usre_profile_query);
    while($row = mysqli_fetch_array($select_usre_profile_query))
    {
    $user_id = $row['user_id'];
    $username = $row['user_name'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
//    $user_role = $row['user_role'];
    }
//    print_r($row);die;
}

if(isset($_POST['update']))
{
     

    
    $user_name = $_POST['username'];
    $user_name = mysqli_real_escape_string($connection , $user_name);               
    $user_password = $_POST['user_password'];
    $user_password = mysqli_real_escape_string($connection , $user_password);               
    $user_firstname = $_POST['user_firstname'];
    $user_firstname = mysqli_real_escape_string($connection , $user_firstname);               

    $user_lastname = $_POST['user_lastname'];
    $user_lastname = mysqli_real_escape_string($connection , $user_lastname);               
    $user_email = $_POST['user_email'];
    $user_email = mysqli_real_escape_string($connection , $user_email);               

//    $user_role = $_POST['user_role'];
    
    if(!empty($user_password)&&!empty($user_firstname)&&!empty($user_lastname)&&!empty($user_name)&&!empty($user_email))
 {
    
    $user_password = password_hash($user_password ,PASSWORD_BCRYPT,array('cost'=>10));

    
    $query = "UPDATE users SET ";
    $query .= "user_firstname = '$user_firstname', ";
    $query .= "user_lastname = '$user_lastname', ";
//    $query .= "user_role = '$user_role', ";
    $query .= "user_email = '$user_email', ";
    $query .= "user_name = '$user_name', ";
    $query .= "user_password = '$user_password' ";
    $query .= "WHERE user_name ='{$username}'";
   $edit_user = mysqli_query($connection,$query);
//    echo $query; die; 
    confirm($edit_user);
    $message = "Profile Created";
    
}
    else{
        $message = "Fields Should Not Be Empty";
    }
      
  }
else
{
    $message = "";
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
     <!--    // enctype => sending different form data-->
    <form action="" method = "post" enctype="multipart/form-data">
    <div class="form-group">
     <h5>  <?php echo $message ?> </h5>
        <label for="title">Firstname</label>
        <input value="<?php echo $user_firstname ?>" type="text" class="form-control" name ="user_firstname" >
    </div>  
        <div class="form-group">
        <label for="post_categoryt">Lastname</label>
        <input type="text" value="<?php echo $user_lastname ?>" class="form-control" name ="user_lastname" >
        </div>
        
<!--
        <div class="form-group">
        <select name="user_role" id="">
       <option value = "subscriber"> //echo $user_role  </option> 
-->
       
            
<!--
//            if($user_role=='admin')
//            {echo "       <option vLLalue = 'subscriber'>subscriber</option>      
//";
//            }
//            else{
//                echo "       <option vLLalue = 'admin'>Admin</option>      
// ";
//            }
            
-->
             
           
            

   </select>
    </div>    
<!--
        <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name ="image" >
    </div>
-->
         
        <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" value="<?php echo $username ?>" class="form-control" name ="username" >
    </div>  
        <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" value="<?php echo $user_email ?>" class="form-control" name ="user_email">

            </div>
            </div>  
        <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password"  class="form-control" name ="user_password">

            </div>
            <div class="form-group">       
        <input type="submit" class="btn btn-primary" name ="update" value = "Update Profile" >
    </div>  
    </form>               
                 
                   
                </div> 
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->
</div>
            <?php include "include/admin_footer.php" ?>

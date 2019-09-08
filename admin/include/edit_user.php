<?php
if(isset($_GET['u_id']))
{
    $the_user_id = $_GET['u_id'];
    
    $query ="SELECT * FROM users WHERE user_id = $the_user_id";
    $select_users=mysqli_query($connection,$query);
     confirm($select_users);
       while($row=mysqli_fetch_assoc($select_users)
         )
       
    {
    $user_id = $row['user_id'];
    $username = $row['user_name'];
    $user_username = $row['user_password'];
    $user_firsname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    
    
    
    
}
    

if(isset($_POST['edit_user']))
{
   
    $user_firstname = $_POST['user_firstname'];
    $user_firstname = mysqli_real_escape_string($connection , $user_firstname);               

    $user_lastname = $_POST['user_lastname'];
    $user_lastname = mysqli_real_escape_string($connection , $user_lastname);               

    $user_role= $_POST['user_role'];
    $user_role = mysqli_real_escape_string($connection , $user_role);               

//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
    $user_name= $_POST['username'];
    $user_name = mysqli_real_escape_string($connection , $user_name);               

    
    $user_email= $_POST['user_email'];
    $user_email = mysqli_real_escape_string($connection , $user_email);               

    $user_password= $_POST['user_password'];
    $user_password = mysqli_real_escape_string($connection , $user_password);               
if(!empty($user_email)&&!empty($user_password)&&!empty($user_name)&&!empty($user_firstname)&&!empty($user_lastname))
{//  {  $post_date = date('d-m-y');
//    $post_comment_count = 4;
     $user_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));
//    $query = "SELECT randsalt FROM users ";
//    $select_salt = mysqli_query($connection,$query);
//    confirm($select_salt);
//    
//    $row = mysqli_fetch_array($select_salt);
//    $salt = $row['randsalt'];
//    $hash_password = crypt($user_password,$salt);
    

   
//      move_uploaded_file($post_image_temp,"../images/$post_image");
    $query = "UPDATE users SET ";
    $query .= "user_firstname = '$user_firstname', ";
    $query .= "user_lastname = '$user_lastname', ";
    $query .= "user_role = '$user_role', ";
    $query .= "user_email = '$user_email', ";
    $query .= "user_name = '$user_name',";
    $query .= "user_password ='{$user_password}'";
    $query .= "WHERE user_id = $the_user_id";
   $edit_user = mysqli_query($connection,$query);
//    echo $query; die; 
    confirm($edit_user);
    
 $message = "User Has Bean Edited";
}
    
else{
    
    $message="Error: Fields Should Not Be Empty";
}
    
}
else
{
    $message = "";
}
}
else{
    header("location: index.php");
}



?>



<!--    // enctype => sending different form data-->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
       <h5><?php echo $message ?></h5>
        <label for="title">Firstname</label>
        <input value="<?php echo htmlspecialchars_decode($user_firsname) ?>" type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="post_categoryt">Lastname</label>
        <input type="text" value="<?php echo $user_lastname ?>" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <select name="user_role" id="">
            <option value=" <?php echo $user_role ;?>">
                <?php echo $user_role ;?>
            </option>
            <?php
            
            if($user_role=='admin')
            {echo "       <option value = 'subscriber'>Subscriber</option>      
";
            }
            else{
                echo "       <option value = 'admin'>Admin</option>      
 ";
            }
            
            ?>



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
        <input type="text" value="<?php echo $username ?>" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" value="<?php echo $user_email ?>" class="form-control" name="user_email">

    </div>
    </div>
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" autocomplete="off"  class="form-control" name="user_password">

    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
    </div>
</form>

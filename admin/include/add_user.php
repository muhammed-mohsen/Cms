<?php
if(isset($_POST['creat_user']))
{
    
    
   
   $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);

    $user_role= escape($_POST['user_role']);
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
    $username=escape( $_POST['username']);
   
    $user_email=eescape( $_POST['user_email']);
    $user_password= escape($_POST['user_password']);
    if(!empty($user_password)&&!empty($user_firstname)&&!empty($user_lastname)&&!empty($username)&&!empty($user_email)&&$user_role != 'select option')
  
    {$user_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));
//    $post_date = date('d-m-y');
//    $post_comment_count = 4;

   
//      move_uploaded_file($post_image_temp,"../images/$post_image");
    $query = "INSERT INTO users(user_firstname,user_lastname,user_role,user_name,user_email,user_password)";
$query.="VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}')";
    $create_user=mysqli_query($connection,$query);
 confirm($create_user);
   


$message= "User Created"." "."<a href='users.php' >View All Users </a>";
}
else
{
    $message = "User Not Be Created -->THE FIELDS SHOULD NOT BE EMPTY ";
}
}
else{
    $message = "";
}
?>



<!--    // enctype => sending different form data-->
    <form action="" method = "post" enctype="multipart/form-data">
    <div class="form-group">
       <h4><?php echo $message ?></h4>
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name ="user_firstname" >
    </div>  
        <div class="form-group">
        <label for="post_categoryt">Lastname</label>
        <input type="text" class="form-control" name ="user_lastname" >
        </div>
        
        <div class="form-group">
        <select name="user_role" id="">
       <option value = "select option">Seclect Option </option>      
       <option value = "admin">Admin</option>      
       <option value = "subscriber">Subscriber </option>      
            

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
        <input type="text" class="form-control" name ="username" >
    </div>  
        <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name ="user_email">

            </div>
            </div>  
        <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name ="user_password">

            </div>
            <div class="form-group">       
        <input type="submit" class="btn btn-primary" name ="creat_user" value = "Add User" >
    </div>  
    </form>
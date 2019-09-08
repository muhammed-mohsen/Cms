<?php
if(isset($_GET['p_id']))
{
    $the_post_id=$_GET['p_id'];
    
}
$query = "SELECT * FROM posts WHERE post_id = $the_post_id";

$select_posts = mysqli_query($connection,$query);
confirm($select_posts);
         
                      
    while($row=mysqli_fetch_assoc($select_posts))
{
    $post_id = $row['post_id'];
    $post_user = $row['post_user'];
    $post_title = $row['post_title'];
    $post_category_id= $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    }
          
           if(isset($_POST['update_post']))
{
            
               
    $post_title =escape( $_POST['post_title']);
    $post_user =escape( $_POST['post_user']);
    $post_category_id =escape( $_POST['post_category_id']);
    $post_status = escape($_POST['post_status']);
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = escape($_POST['post_tags']);
    $post_content =escape( $_POST['post_content']);
    $post_date = escape(date('d-m-y'));
//               print_r($_FILES); die;
   // $post_comment_count = 4;

   
      move_uploaded_file($post_image_temp,"../images/$post_image");
     
    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($select_image))
        {
            $post_image = $row['post_image'];
        }
    }           
               
               
               
               
               
               
    $query = "UPDATE posts SET ";
    $query.="post_title = '{$post_title}', ";     
    $query.="post_category_id = $post_category_id, "; 
    $query.="post_date = now(), ";     
    $query.="post_user = '{$post_user}', ";     
    $query.="post_status= '{$post_status}', ";     
    $query.="post_tags= '{$post_tags}', ";     
    $query.="post_content = '{$post_content}', ";     
    $query.="post_image = '{$post_image}' ";     
    $query.="WHERE post_id = $post_id";     
      
//               echo $query; die();
    $update_post= mysqli_query($connection,$query);
    confirm($update_post);    
    echo "<p class = 'bg-success'>Post Updated <a href ='../post/$post_id '>View Post </a>Or <a href ='posts.php'>Edit More Posts </a> </p> ";      
           
           
           }


?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" value=" <?php echo str_replace("\\", '', $post_title) ;?>" class="form-control" name="post_title">
    </div>
 <label for="category">Category</label>
  <select name="post_category_id" id="post_category">
        <?php
           $query = "SELECT * FROM categories";
           $select_category=mysqli_query($connection,$query);
           confirm($select_category);
           while($row=mysqli_fetch_assoc($select_category))
           {  $cat_title=$row['cat_title'];
        
               $cat_id=$row['cat_id'];
           echo "<option value='{$cat_id}'>{$cat_title}</option>";
        
           }
 
?>





    </select>
    </div>
<!--    // defualt poat_user-->
    <div class="form-group">
     <label for="title"> User</label>
          <select  name="post_user" id="">
        <?php echo "<option value='$post_user'>$post_user</option>" ?>

          <?php
    
              
              $query = "SELECT * FROM users";
              $recieve_query = mysqli_query($connection,$query);
              confirm($recieve_query);
          
              
              while($row = mysqli_fetch_assoc($recieve_query))
              {   
                  $user_id = $row['user_id'];
                  $user_name = $row['user_name'];
                  
                  echo "<option value='$user_name'>$user_name</option>";
              }
              
              ?>
             </select>
</div>
    <div class="form-group">
        <select name="post_status" id="">



            <option value='<?php echo $post_status ?>'>
                <?php echo $post_status ?>
            </option>
            
                <?php
        if($post_status=='published')
        {
            echo "<option value='draft'>draft</option>";
        }
            else
            {
                //the value which put in database is value but which show to people be between option
            echo "<option value='published'>publish</option>";
            }
            
            
            ?>


            </option>








        </select>










        <!--
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" value="<?php// echo $post_status ;?>" name="post_status">
    </div>
-->
        <br>
    </div>
    <div class="form-group">

        <img width="100" src="../images/<?php echo $post_image;?>" alt="">
        <input name="image" type="file">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" value="<?php echo $post_tags ;?>" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="body" cols="30" rows="10">
    <?php echo str_replace('\r\n', '<br>', $post_content) ;?>
            </textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
</form>

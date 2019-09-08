<?php
if(isset($_POST['creat_post']))
{
    
    $post_title = escape($_POST['title']);
    
    $post_user = escape($_POST['post_user']);
   

    $post_category_id = escape($_POST['post_category']);
    
    $post_status = escape($_POST['post_status']);
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = escape($_POST['post_tags']);
  
    $post_content =escape( $_POST['post_content']);

    $post_date = date('d-m-y');
//    $post_comment_count = 4;

   
      move_uploaded_file($post_image_temp,"../images/$post_image");
    if(!empty($post_title)&&!empty($post_tags)&&!empty($post_content))
    {
    $query = "INSERT INTO posts(post_category_id,post_title,post_user,post_date,post_image,post_content,post_tags,post_status)";
    $query.="VALUES('{$post_category_id}','{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

    $create_form=mysqli_query($connection,$query);
    confirm($create_form);
    
    // we use it when we wanna got the last id that we created;
    
    $post_id = mysqli_insert_id($connection);
    
   $message= "<p class = 'bg-success'>Post Created<a href ='../post/=$post_id '>View Post </a>Or <a href ='posts.php'>Edit More Posts </a> </p> ";      

    }
    else
    {
        $message= "The fields Should Not Be Empty";
    }
  
}
else{
    $message = '';
    
}


?>



<!--    // enctype => sending different form data-->
    <form action="" method = "post" enctype="multipart/form-data">
    <div class="form-group">
       <h5><?php echo $message ?></h5>
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name ="title" >
    </div>  
        <div class="form-group">
                 <label for=''>CATAGORY</label>
          <select  name="post_category" id="">
          <?php
              
              $query = "SELECT * FROM categories";
              $recieve_query = mysqli_query($connection,$query);
              confirm($recieve_query);
          
              
              while($row = mysqli_fetch_assoc($recieve_query))
              {   
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];
                  
                  echo "<option value='$cat_id'>$cat_title</option>";
              }
              
              ?>
          
          
            </select>
    </div> 
         <div class="form-group">
         
             <label for="title"> Post Author</label>
          <select  name="post_user" id="">
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
        <select  name="post_status" id="">
           <option value="">Post status</option>
           <option value="published">Publish</option>
           <option value="draft">Draft</option>
            
        </select>
            </div>
       
               </div>  
        <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name ="image" >
    </div>
         
        <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name ="post_tags" >
    </div>  
        <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name ="post_content" id="body" cols="30" rows ="10">
    
            </textarea>
            </div>
            <div class="form-group">       
        <input type="submit" class="btn btn-primary" name ="creat_post" value = "Publish" >
    </div>  
    </form>
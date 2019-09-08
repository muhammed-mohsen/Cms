<?php include("delete_modal.php");?>

<?php 
if(isset($_POST['CheckBoxAllArray']))
{
    
    foreach($_POST['CheckBoxAllArray'] as $checkbox )
        
    {
    $bulk_option = $_POST['bulk_option'];
    
        switch($bulk_option)
        {
                case 'published';
                
                $query = "UPDATE posts SET ";
                $query .="post_status = '{$bulk_option}'";
                $query .="WHERE post_id = {$checkbox}";
                $update_state = mysqli_query($connection , $query);
                    confirm($update_state);
                break;
            
            case 'draft';
                
                $query = "UPDATE posts SET ";
                $query .="post_status = '{$bulk_option}'";
                $query .="WHERE post_id = {$checkbox}";
                $update_state = mysqli_query($connection , $query);
                    confirm($update_state);
                break;
            
            case 'delete';
                
                $query = "DELETE FROM posts ";
                $query .="WHERE post_id = {$checkbox}";
                $delete_post =mysqli_query($connection , $query);
                    confirm($delete_post);
                break;
                
            case 'clone':
    $query = "SELECT * FROM posts WHERE post_id = $checkbox";
    $select_query = mysqli_query($connection,$query);
    confirm($select_query);
    while($row = mysqli_fetch_assoc($select_query)){
    $post_author = escape($row['post_author']);
    $post_user = escape($row['post_user']);
    $post_title = escape($row['post_title']);
    $post_category_id= $row['post_category_id'];
    $post_status = escape($row['post_status']);
    $post_image = escape($row['post_image']);
    $post_content = escape($row['post_content']);
    $post_tags = escape($row['post_tags']);
    $post_date = $row['post_date'];
   
    if(empty($post_tags)){
        $post_tags = "Generic";
    }
               
           }
    $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_user,post_date,post_image,post_content,post_tags,post_status)";
    $query.="VALUES({$post_category_id},'{$post_title}','{$post_author}', '$post_user',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
    // echo $query ; die;
    $clone_query = mysqli_query($connection,$query);
    confirm($clone_query);
                
                
        }
        
        
    }
    
}



?>
   

   <form action="" method="post">
    
<table class="table table-bordered table-hover ">
                       
<div id="bulkOptionContainer" class="col-xs-4">
    
    <select class="form-control" name = "bulk_option" id="">
       // need to value every option to catch it 
        <option value="">Select OPtion</option>
        <option value="published">Puplish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
        <option value="clone">clone</option>
        
    </select>
  
    
</div>
  <div class="col-xs-4">
  
<input type="submit" name="submit" class = "btn btn-success" value="Apply">
<a class = "btn btn-primary" href = "posts.php?source=add_post">Add New</a>
                       
                       
                           </div>                       
                                                                  
                        </form>
    
                        <thead>
                           <<th> <input id="selectAllBoxes" type="checkbox"></th>
                            <th>Id</th>
                            <th>Users</th>
                            <th>Title</th>
                            <th>category</th>
                            <th>status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>comments_count</th>
<!--                            <th>counts</th>-->
                            <th>view_counts</th>
                            <th>Date</th>
                            <th>Delete</th>
                            <th>Edit</th>
                            
                        </thead>
                        <tbody>
<?php                         
$query = "SELECT * FROM posts ORDER BY post_id DESC ";
$select_posts = mysqli_query($connection,$query);
          if(!$connection)
                      { die("query field" . mysqli_error($connection));}
                      
    while($row=mysqli_fetch_assoc($select_posts))
{
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_user = $row['post_user'];
    $post_title = $row['post_title'];
    $post_category_id= $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_id'];
    $post_tags = $row['post_tags'];
//    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_view_counts = $row['post_view_counts'];
        echo "<tr>";
    ?>
    <?php
    
        
        
                            
                            
                            ?>   
       
       
       
       
        <td><input class = 'checkBoxes' type = 
        'checkbox' name = 'CheckBoxAllArray[]'  
        value="<?php echo $post_id ?>"></td>
    
    <?php 
        echo "<td>{$post_id }</td>";
        
        
        if(!empty($post_author))
        {
                echo "<td>{$post_author}</td>";
            
        }
        elseif(!empty($post_user))
        {
          echo   " <td>  $post_user </td>";
   
        }
        
        
        

        
        
        
        
        
    echo "<td><a href ='../post.php?p_id={$post_id}'> {$post_title}</a></td>";
      //we need to dispay title category dynamically and related posts  
      $query="SELECT * FROM categories WHERE cat_id={$post_category_id}" ;
     
     $select_categories_id=mysqli_query($connection , $query);
     
     while($row=mysqli_fetch_assoc($select_categories_id))
         
     { $cat_id=$row['cat_id']; 
      
      $cat_title=$row['cat_title'];   
        
        
    echo "<td>{$cat_title}</td>";
     }
    echo "<td>{ $post_status}</td>";
    echo "<td><img width='100' src = '../images/{$post_image}' alt='image'></td>";
   
    $query = "SELECT * FROM comment WHERE comment_post_id = $post_id ";
    $send_comment_query = mysqli_query($connection,$query);
        
    $count_comments = mysqli_num_rows($send_comment_query);
        
        
        
        
        
        echo "<td>{$post_tags}</td>";
//    echo "<td>{$post_content}</td>";
    echo "<td></td>";
    echo "<td><a href='comment-post.php?p_id={$post_id}'>{ $count_comments}</a></td>";
    echo "<td><a class='btn btn-primary' href='posts.php?reset={$post_id}'>{$post_view_counts}</a></td> ";
    echo "<td>{$post_date}</td>";
    // \" stands foor scape confirm() return some strings onClick c must capital 
    // echo "<td><a  onClick=\"javascript:return 
    
    // confirm('Are you sure you wanna delete'); \" href='posts.php?delete={$post_id}'>Delete</a></td> ";
     
     ?> 
    
    <form  method="POST" >
         
       <input class="delete_link" type="hidden" name='post_id' value='<?php echo $post_id ?>'>
      <?php echo '<td> <input class="btn btn-danger" type="submit" name="delete" value="Delete" > </td>'?>


    </form>




<?php 
   //  echo "<td><a rel='$post_id' href='javascript:void(0)' class ='delete_link' >Delete</a></td> ";





    echo "<td><a class='btn btn-info' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td> ";
    
    echo "</tr>";        
    }
                            
                            
?>
                           
                            
                    </tbody>
                    </table>

<script>

    $(document).ready(function()
    {
        $(".delete_link").on('click',function(){
          var id = $(this).attr("rel");
          var delete_url = "posts.php?delete="+id+" ";
         $(".modal_delete_link").attr("href",delete_url);
         $("#myModal").modal('show');

        });
    });
    
</script>
                            
    
                   
                   
                   
                   
                   
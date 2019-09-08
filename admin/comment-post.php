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
</h1>

 <table class="table table-bordered" >
<thead>
    <th>Id</th>
    <th>Author</th>
    <th>Comments</th>
    <th>Email</th>
    <th>Status</th>
    <th>In Response To</th>
    <th>Date</th>
    <th>approve</th>
    <th>unapprove</th>
    <th>Edit</th>
    <th>Delete</th>
</thead> 

    
    
    
    
  
   <tbody>
  <?pHp 
$query ="SELECT * FROM comment WHERE comment_post_id=".mysqli_real_escape_string ($connection,$_GET['p_id'])."";
    $select_comment=mysqli_query($connection,$query);
     confirm($select_comment);
      
       while($row=mysqli_fetch_assoc($select_comment)
         ){
           
    $comment_id = $row['comment_id'];
    $comment_post_id = $row['comment_post_id'];
    $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email'];
    $comment_content = $row['comment_content'];
    $comment_status = $row['comment_status'];
    $comment_date = $row['comment_date'];
    
       echo"<tr>";
       echo " <td>$comment_id</td>";
       echo " <td>$comment_author</td>";
       echo " <td>$comment_content</td>";
       
       
       
       echo " <td>$comment_email</td>";
       echo " <td>$comment_status</td>";
        $query="SELECT * FROM posts WHERE post_id = $comment_post_id";
        $select_posts=mysqli_query($connection,$query);
           confirm($select_posts);
           while($row=mysqli_fetch_assoc(($select_posts)))
           {
               $post_id=$row['post_id'];
               $post_title=$row['post_title'];
                echo " <td><a href='../post.php?p_id={$post_id}'>$post_title</a></td>";
           }
           
      
           
           
       echo " <td>$comment_date</td>";
       echo "<td><a href='comments.php?approve=$comment_id'>Aprrove</a></td>";
       echo "<td><a href='comments.php?unapprove=$comment_id'>Unaprrove</a></td>";
       echo "<td><a href=''>EDit</a></td>";
       echo "<td><a href='comment-post.php?delete=$comment_id&p_id=" . $_GET['p_id'] ."'>Delete</a></td>";
       echo "</tr>";
       }

if(isset($_GET['delete']))
{
        $comment_id = $_GET['delete'];
         $query = "DELETE FROM comment WHERE comment_id = {$comment_id}";
         $delete_query= mysqli_query($connection , $query);
         if(!$delete_query)
         {
             die("QUERY FIELD " .mysqli_error($connection));
         }
    
    header("Location: comment-post.php?p_id=". $_GET['p_id'] ."");
}





       
       
       ?>
    </tbody>   
    
    
    

</table>
                </div>
                     

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "include/admin_footer.php"  ?>

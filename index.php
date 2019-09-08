<!--
اول ماشوف الملف بقسمه لاجزاء منها 
1-header
2navigation 
3 slidebar
 5 widgets
4 footer
6- db 
7-
 
-->
<?php session_start() ?>

<?php include "includes/header.php"?>
<?php include "includes/db.php"?>




<!-- Navigation -->
<?php include "includes/navigation.php"?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">




            <?php
    $per_page = 3;
    if(isset($_GET['page']))
    {
        
     $page = $_GET['page'];
    }
else{
    $page = "";
}
if($page == "" || $page == 1)
{
    $page_1 = 0;
} 
else 
{
    $page_1 = ($page*$per_page)-$per_page; 
}
          
      if(isset($_SESSION['user_role'])&&$_SESSION['user_role']=='admin')   
 
    {
     $query = "SELECT * FROM posts ";   
    }
    else
    {
       $query = "SELECT * FROM posts WHERE post_status = 'published' ";
    }      
    
                

                
                $find_counts = mysqli_query($connection , $query);
                 $count = mysqli_num_rows($find_counts);
                 if($count <1)
                 {
                    echo"<h1 class = 'text-center'>NO POSTS</h1>";
                 }
                 else{
                 $count = ceil( $count/$per_page);
//                echo "<h1>$count</h1>";

    
       // 
                // limit 7 --. 7 posts are appared} if limit 0,3 from 0 too  posts 
                $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $page_1, $per_page";
                $select_all_cat_post_query = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_all_cat_post_query ))
                {
                    $post_id = $row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_user'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];

                    $post_content=substr($row['post_content'],0,100);
                    $post_status= $row['post_status'];
                
                   
                    ?>
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="post/<?php echo $post_id ?>">
                    <?php echo $post_title ?></a>
            </h2>
            <p class="lead">
                by <a href="author_post.php?author=<?php echo $post_author?>&p_id=<?php echo $post_id ?> ">
                    <?php echo $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>
                <?php echo $post_date ?>
            </p>
            <a href="post.php?p_id=<?php echo $post_id ?>">
                <hr>
              <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">

            </a>
            <hr>
            <p>
                <?php echo $post_content ?>
            </p>
            <a class="btn btn-primary" href="post/<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>






            <?php }  }  ?>





        </div>

        <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/slidebar.php"     ?>
</div>
    </div>
</div>

</div>

<!-- /.row -->

<hr>
<!--class pager make our links alot nicer-->
<ul class="pager">

    <?php
   
    
    for($i=1;$i<=$count;$i++)
    {
       if($i == $page)
       {

        echo "<li><a class='active_link' href='index/page=$i'>{$i}</a></li>";
       }
        else{
            echo "<li><a href='index.php?page=$i'>{$i}</a></li>";
        }
       }
    
    
    ?>



</ul>


<?php include "includes/footer.php";?>

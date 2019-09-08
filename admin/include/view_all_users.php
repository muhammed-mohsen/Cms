<table class="table table-bordered">
    <thead>
        <th>Id</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>
        
    </thead>






    <tbody>
        <?pHp   
$query ="SELECT * FROM users";
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
    
    
       echo"<tr>";
       echo " <td>$user_id</td>";
       echo " <td>$username</td>";
       echo " <td>$user_firsname</td>";
       echo " <td>$user_lastname</td>";
       echo " <td>$user_email</td>";
       echo " <td>$user_role</td>";
//        $query="SELECT * FROM posts WHERE post_id = $comment_post_id";
//        $select_posts=mysqli_query($connection,$query);
//           confirm($select_posts);
//           while($row=mysqli_fetch_assoc(($select_posts)))
//           {
//               $post_id=$row['post_id'];
//               $post_title=$row['post_title'];
//                echo " <td><a href='../post.php?p_id={$post_id}'>$post_title</a></td>";
//           }
           
      
           
           
       
       echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
       echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
       echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>EDit</a></td>";
       echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
       echo "</tr>";
       
       }?>
    </tbody>




</table>

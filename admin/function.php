<?php
function escape($string)
{
    global $connection;
    return mysqli_real_escape_string($connection,trim($string));
}

function ifItIsMethod($method = null)
{
    if($_SERVER['REQUEST_METHOD']==strtoupper($method))
    {
        return true;
    }
    return false;
}

function isLoggedIn()
{
    if(isset($_SESSION['user_role']))
    {
       return true; 
    }
    return false;
}

function checkIfUserIsLoggedInAndRed($redirectLocation=null)
{
    if(isLoggedIn())
    {
        redirect($redirectLocation);
    }

}



function users_online()
{
    //this function gonna have the id of iny users that logs into our admin area or index  
    // if i open any browser there exist different seesiion 
global $connection;

$session = session_id();
 $time = time() ;

//marked that user is offline
$time_out_in_second = 30;
$time_out =$time-$time_out_in_second;
 $time_out;
$query = "SELECT * FROM users_online WHERE session='$session'"; $send_query = mysqli_query($connection,$query);
$count = mysqli_num_rows($send_query);

if($count == NULL)
{
    mysqli_query($connection,"INSERT INTO users_online(session,time) VALUES('$session','$time')");
}
else{
    
  mysqli_query($connection,"UPDATE users_online SET time ='$time' WHERE session ='$session'");
}
$users_online_query=  mysqli_query($connection,"SELECT * FROM users_online WHERE time > '$time_out'");

$count_user = mysqli_num_rows($users_online_query);

return $count_user;
    
}





function confirm($result)
{
    global $connection;
        if(!$result)
 {
     die("QUERY FIELD " .mysqli_error($connection));
 }
}

function insert_categories()
{
    global $connection ;
     if(isset($_POST['submit']))      {
                      $cat_title = $_POST['cat_title'];
                        if($cat_title=="" || empty($cat_title))
                        {
                            echo "This field must not empty";
                        }
                        else{ 
                        $stmt =mysqli_prepare($connection,"INSERT INTO categories(cat_title) VALUES(?) ");
                      
                    mysqli_stmt_bind_param($stmt ,'s',$cat_title);
                    mysqli_stmt_execute($stmt);

                            if(!$stmt)
                            {
                                die("QUERY FIELD". mysqli_error($connection));
                            }
                            redirect('categories.php');
                        
                        
                        }
                    }                      
                        
                        
}

function FindAllCategories()
{
    global $connection;
$query = 'SELECT * FROM categories';
$select_categories = mysqli_query($connection,$query);
          if(!$connection)
                      { die("query field" . mysqli_error($connection));}
                      
    while($row=mysqli_fetch_assoc($select_categories))
{
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
        echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
}
}
function DeleteCategories()
{
    global $connection;
    if(isset($_GET['delete']))
     {
         $the_cat_id = $_GET['delete'];
         $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
         $delete_query= mysqli_query($connection , $query);
         if(!$delete_query)
         {
             die("QUERY FIELD " .mysqli_error($connection));
         }
    
    header("Location: categories.php");
                                    
     }
    
}
function delete_posts()
{
    global $connection;
     if(isset($_POST['delete']))
     {
         $post_id = $_POST['post_id'];
         $query = "DELETE FROM posts WHERE post_id = {$post_id}";
         $delete_query= mysqli_query($connection , $query);
         if(!$delete_query)
         {
             die("QUERY FIELD " .mysqli_error($connection));
         }
    
    header("Location: posts.php");
                                    
     }
}

function delete_comments()
{
    global $connection;
     if(isset($_GET['delete']))
     {
         $comment_id = $_GET['delete'];
         $query = "DELETE FROM comment WHERE comment_id = {$comment_id}";
         $delete_query= mysqli_query($connection , $query);
         if(!$delete_query)
         {
             die("QUERY FIELD " .mysqli_error($connection));
         }
    
    header("Location: comments.php");
                                    
     }
}
function unapprove_comment()
{
    global $connection;
     if(isset($_GET['unapprove']))
     {
         $comment_id = $_GET['unapprove'];
         $query = "UPDATE comment SET comment_status = 'unapproved' WHERE comment_id = {$comment_id}";
         $update_query= mysqli_query($connection , $query);
         if(!$update_query)
         {
             die("QUERY FIELD " .mysqli_error($connection));
         }
    
    header("Location: comments.php");
                                    
     }
}
function approve_comment()
{
    global $connection;
     if(isset($_GET['approve']))
     {
         $comment_id = $_GET['approve'];
         $query = "UPDATE comment SET comment_status = 'approved' WHERE comment_id = {$comment_id}";
         $update_query= mysqli_query($connection , $query);
         if(!$update_query)
         {
             die("QUERY FIELD " .mysqli_error($connection));
         }
    
    header("Location: comments.php");
                                    
     }
}
function change_to_admin()
{
    global $connection;
     if(isset($_GET['change_to_admin']))
     {
         $user_id = $_GET['change_to_admin'];
         $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$user_id}";
         $update_query= mysqli_query($connection , $query);
         if(!$update_query)
         {
             die("QUERY FIELD " .mysqli_error($connection));
         }
    
    header("Location: users.php");
                                    
     }
}function change_to_sub()
{
    global $connection;
     if(isset($_GET['change_to_sub']))
     {
         $user_id = $_GET['change_to_sub'];
         $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$user_id}";
         $update_query= mysqli_query($connection , $query);
         if(!$update_query)
         {
             die("QUERY FIELD " .mysqli_error($connection));
         }
    
    header("Location: users.php");
                                    
     }
}

function delete_user()
{
    global $connection;
    if(isset($_SESSION['user_role']))
    {
     if(isset($_GET['delete']))
     {
         if($_SESSION['user_role']=='admin')
         {
         $user_id = mysqli_real_escape_string($_GET['delete']);
         $query = "DELETE FROM users WHERE user_id = {$user_id}";
         $delete_query= mysqli_query($connection , $query);
         if(!$delete_query)
         {
             die("QUERY FIELD " .mysqli_error($connection));
         }
    
    header("Location: users.php");
                                    
     }
     }
        
}
}
    function reset_counts()
{
    global $connection;
     if(isset($_GET['reset']))
     {
        
         $post_id = $_GET['reset'];
         $query = "UPDATE posts SET post_view_counts = 0  WHERE post_id =". mysqli_real_escape_string($connection,$_GET['reset'])." ";
         
         
         $reset_query= mysqli_query($connection , $query);
         if(!$reset_query)
         {
             die("QUERY FIELD ".mysqli_error($connection));
         }
    
       header("Location: posts.php");
                                    
     }

}

function is_admin($username)
{
    global $connection;
    $query = "SELECT user_role FROM users WHERE user_name ='$username'";

    
    $result = mysqli_query($connection,$query);
  //  print_r($result) ;die;
    confirm($result);
    
    $row = mysqli_fetch_array($result);
    

    if($row['user_role'] =='admin')
    {
        return true;
    }
    else 
    {
        return false;
    }

}

function username_exist($username)
{
    global $connection;
    $query = "SELECT user_name FROM users WHERE user_name ='$username'";
    
    $result = mysqli_query($connection,$query);
    
    confirm($result);

    if(mysqli_num_rows($result) > 0 )
    {
        return true;
    }
    else
    {
        return false;
    }

}
function email_exist($email)
{
    global $connection;
    $query = "SELECT user_email FROM users WHERE user_email ='$email'";
    
    $result = mysqli_query($connection,$query);
    
    confirm($result);

    if(mysqli_num_rows($result) > 0 )
    {
        return true;
    }
    else
    {
        return false;
    }

}

function redirect($location)
{
 return header("Location:".$location);
  
}

function register_user($username ,$email ,$password)
{
 global $connection    ;

   
    
    // instead of using randsalt
    // the first peramater ganna be password and thesecond be the algorithm 
     $password = password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));
     
     
     
//    $query = "SELECT randsalt FROM users ";
//    $select_randsalt_query = mysqli_query($connection,$query);
//    if(!$select_randsalt_query)
//    {
//        die("QUERY FIALD " . mysqli_error($connection));
//    }
//    $row = mysqli_fetch_array($select_randsalt_query );
//    $salt =$row['randsalt'];
//    
//     $user_password = crypt($user_password,$salt);
    
   


    $query = " INSERT INTO users (user_name,user_email,user_password,user_role) " ;
    $query.="VALUES('{$username}','{$email}','{$password}','subscriber')";
    $register_user_query = mysqli_query($connection,$query);
    
//    echo $query ; die;

 confirm($register_user_query);
    // $message = "Your Registration has been submitted ";
} 





function login_user($user_name , $password)
{

global $connection;
// you can send information or hackers can send different values in our fields and they can delete data out of our database 
$username =trim( mysqli_real_escape_string($connection,$user_name));
$password = trim(mysqli_real_escape_string($connection,$password));
//these functions cleans up  this data
$query = "SELECT * FROM users WHERE user_name = '{$user_name}' ";
$select_user_query = mysqli_query($connection,$query);
confirm($select_user_query);

//print_r( $row = mysqli_fetch_array($select_user_query)) ; die;
while($row = mysqli_fetch_array($select_user_query))
{
   $db_id = $row['user_id'];
   $db_username= $row['user_name'];
   $db_user_password= $row['user_password'];
   $db_user_firsname = $row['user_firstname'];
   $db_user_lasname = $row['user_lastname'];
   $db_user_role = $row['user_role'];
  //echo  $row['user_role'];die;
    // to discrypt password do that
   //$password  = crypt($password,$db_user_password);
    if(password_verify($password,$db_user_password))
   {
    
    $_SESSION['user_name'] =$db_username;
    $_SESSION['user_firstname'] =$db_user_firsname;
    $_SESSION['user_lastname'] =$db_user_lasname;
    $_SESSION['user_role'] =$db_user_role;
    
       //  echo  $_SESSION['user_role'];die;
       
    redirect('/cms/admin'); 
     // echo 'hello';die;
}
//else if($username == $db_username &&  $password == $db_user_password)
//   {
//    $_SESSION['user_name'] =$db_username;
//    $_SESSION['user_firstname'] =$db_user_firsname;
//    $_SESSION['user_lastname'] =$db_user_lasname;
//    $_SESSION['user_role'] =$db_user_role;
//       
//       
//    header("location: ../admin"); 
//   
//}
else 
{
    return false;   
}




//     if($username !== $db_username && $password !== $db_user_password)
//     {
//       header("Location: ../index.php");  
//     } 


return true;

}
 
}

 ?>
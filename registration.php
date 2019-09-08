<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  include "admin/function.php"; ?>


<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <?php
//if(isset($_POST['register']))
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $user_name=trim($_POST['user_name']);
    $user_name=mysqli_real_escape_string($connection,$user_name);

    $password=$_POST['user_password'];
    $password=mysqli_real_escape_string($connection,$password);    
    $email=trim($_POST['user_email']);
    $email=mysqli_real_escape_string($connection,$_POST['user_email']);
    $error = [

   'user_name'=>'',
   'email'=>'',
   'password'=>''
    ];

    if(strlen($user_name) < 4)
    {
        $error['user_name']='Username needs to be longer ';
    }
   if(strlen($user_name) == '')
    {
        $error['user_name']='Username cannot be empty ';
    }
    if(username_exist($user_name))
    {
        $error['user_name']='Username exist ,pick up another';
    }
    if(strlen($email)=='')
    {
        $error['email']='Email cannot be empty ';
    }
     if(email_exist($email))
    {
        $error['email']='email exist ,<a href="index.php">Please login</a>';
    }   
    if($password =='')
    {
        $error['password'] = 'Password cannot be empty';
    }  

   foreach ($error as $key => $value) {
       if(empty($value))
       {
        unset($error[$key]);//clean everything
        // register_user($username , $password , $email);
        // 
       }
   }//for each 

   
   if(empty($error))
   {
     
         register_user($user_name ,$email,$password );    
        login_user($username , $password);
   }



}


                      ?>

        <h1>Register</h1>
        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
            <div class="form-group">
                <label for="username" class="sr-only">username</label>
                <input type="text" name="user_name" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on"
                value = "<?php echo isset($user_name)? $user_name:'' ?> "

                >
                <p><?php echo isset($error['user_name'])?$error['user_name']:'' ?></p>
            
            </div>
            <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="user_email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on"
                value = "<?php echo isset($email)? $email:'' ?>">
                 <p><?php echo isset($error['email'])?$error['email']:'' ?></p>
            </div>
            <div class= "form-group">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="user_password" id="key" class="form-control" placeholder="Password" >

              <p><?php echo isset($error['password'])?$error['password']:'' ?></p>
            </div>

            <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php";?>

<!-- <h6 class ="text-center"></h6><?php// echo $message ?></h6> -->
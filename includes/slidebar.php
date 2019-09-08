<?php 


if(ifItIsMethod('POST'))
{

    if(isset($_POST['user_name'])&&isset($_POST['password']))
    {

        // echo $_POST['user_name'].$_POST['password'];die;
        login_user($_POST['user_name'],$_POST['password']);
        die;
      //  echo $_POST['user_name'].$_POST['password'];die;
    
    }
    else
    {
        redirect('index');
    }
}


?>





  <div class="col-md-4">
               
                <!-- Blog Search Well -->
                
                <div class="well">
                    <h4>Blog Search</h4>
                <form action="search.php" method ="post">
                           <div class="input-group">
                        <input name="search" type="text"  class="form-control">
                        <span class="input-group-btn">
                            <button  name = "submit" class="btn btn-default"  type="submit" >
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div> 
                    <!-- login -->
                    </form>
                <div class="well">
                    <?php if(isset($_SESSION['user_role'])): ?>
                    <h4>Loged in as <?php echo $_SESSION['user_name'] ?> </h4>
                    <a href="includes/logout.php" class="btn btn-primary">Logout</a>
                    <?php else:   ?>
        <h4>Login</h4>
                <form  method ="post">
                           <div class="form-group">
                        <input name="user_name" type="text"  class="form-control" placeholder="Enter username">
                       
                    </div> 
                       <div class="form-group">
                        <input name="password" type="password"  class="form-control" placeholder="Enter password">
                       
                    </div>
                    <span class="input-group-btn" >
                        <button class="btn btn-primary" name="login" type="submit">
                            Login
                        </button>
                    </span>
                    
                    <!-- /.input-group -->
               </form>
                 </div>
                    <?php endif ?>    
                    


                <!-- Blog Categories Well -->
                <div class="well">
                   
                   
                   <?php  
                    //we can limit what we want to show by LIMIT 3 in below
                    $query = "SELECT * FROM categories ";
                    $select_all_query = mysqli_query($connection , $query);
                   
                    ?>
                   
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                            <?php  
                                while($row= mysqli_fetch_assoc($select_all_query))
                                {
                                    $cat_title=$row['cat_title'];
                                    $cat_id=$row['cat_id'];
                                        
                                    echo "<li><a href='category.php?category={$cat_id}'> {$cat_title} </a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    
                        
                        <!-- /.col-lg-6 -->
                              <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <?php include "includes/widget.php";?>
          
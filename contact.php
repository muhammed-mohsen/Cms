<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>


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
if(isset($_POST['submit']))
{

   $to = "Suppor@#mosen.com";
   $subject= $_POST['subject'];
   $body = $_POST['body'];
}
                        
                        


                    
                    
                    ?>

        <h1>CONTACT</h1>
        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
         
            </div>
            <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="user_email" id="email" class="form-control" placeholder="Enter Your Email ">
            </div>
            <div class="form-group">
                <label for="Subject" class="sr-only">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Your Subject">
           
            <div class="form-group">
                <textarea class = "form-control" name ="body" id = "body" rows ="10" cols="50"></textarea>
            </div>

            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php";?>

<?php 
   include("./database.php");
?>
<?php 
   $email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
   $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);

   $sql="SELECT * FROM login WHERE user_email='$email'";

   $result=mysqli_query($conn,$sql);
   
   $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Form | CodingLab</title> 
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email" required name="email">
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" required name="password">
          </div>
          <div class="pass"><a href="forgot.php">Forgot password?</a></div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="./signup.php">Signup now</a></div>
          <?php if($_SERVER["REQUEST_METHOD"]=="POST") {?>
                  <?php if(empty($email)) {?>
                     <h4 style="color: red;">Please enter email id</h4>
                  <?php } else if(empty($password)){?>
                      <h4 style="color: red;">Please enter password</h4>
                  <?php } else {?>
                      <?php if(mysqli_num_rows($result)) {?>
                         <?php if(password_verify($password,$row["password"])) {?>
                            <?php header("Location:result.html");?>
                         <?php }else{?>
                          <h4 style="color: red;">Please enter a valid password</h4>
                         <?php }?>
                      <?php } else {?>
                        <h4 style="color: red;">Please enter a valid email id</h4>
                      <?php }?>
                  <?php }?>
          <?php }?>
        </form>
      </div>
    </div>
    <br>
  </body>
</html>
<?php 
   include("../database.php");
?>

<?php 
  $name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
  $email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
  $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
  $confirm=filter_input(INPUT_POST,"confirm",FILTER_SANITIZE_SPECIAL_CHARS);
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    // if($password==$confirm)
    // {
    //   try{
    //     $hash=password_hash($password,PASSWORD_BCRYPT);
    //     $sql="INSERT INTO login(email,name,password) VALUES('$email','$name','$hash')";
    //     mysqli_query($conn,$sql);
    //     echo "User regesterd successfully";
    //   }catch(mysqli_sql_exception)
    //   {

    //     echo"User already regestered";

    //   }
    // }
  }

?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title> 
    <link rel="stylesheet" href="../styles/signup_styles.css ?v=<?php echo time()?>">
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
      <div class="input-box">
        <input type="text" placeholder="Enter your name" required name="name">
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" required name="email">
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" required name="password">
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm password" required name="confirm">
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now" name="submit">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="./index.php">Login now</a></h3>
      </div>
      <?php if($password==$confirm) {?>

        <?php try{?>

         <?php $hash=password_hash($password,PASSWORD_BCRYPT);?>

         <?php $sql="INSERT INTO login(email,name,password) VALUES('$email','$name','$hash')";?>

         <?php mysqli_query($conn,$sql);?>

         <h3 style="color: green;">User regestered successfully</h3>

        <?php }catch(mysqli_sql_exception){?>

         <h3 style="color: red;">User already regestered</h3>

        <?php }?>

      <?php } else {?>

         <h3 style="color: red;">Password doesn't match</h3>

      <?php }?>

    </form>
  </div>
</body>
</html>

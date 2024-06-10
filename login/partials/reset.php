<?php 
  include("../database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../styles/styles4.css">
    <title>Document</title>
</head>
<body>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<div class="container">
	<div class="row">
		<div class="col-sm-4">
		       <label>New Password</label>
            <div class="form-group pass_show"> 
                <input type="password" class="form-control" placeholder="New Password"  name="new"> 
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input type="password" class="form-control" placeholder="Confirm Password" name="confirm"> 
            </div> 
            <div class="form-group pass_show"> 
                <input type="submit" value="Submit" class="form-control" placeholder="Submit" name="submit"> 
            </div> 
		</div>  
	</div>
</div>
</form>
</body>
</html>

<?php 
  $new=filter_input(INPUT_POST,"new",FILTER_SANITIZE_SPECIAL_CHARS);
  $confirm=filter_input(INPUT_POST,"confirm",FILTER_SANITIZE_SPECIAL_CHARS);

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    if (isset($_GET['email'])) {
      $email = $_GET['email'];
      if($new==$confirm)
      {
        $hash=password_hash($confirm,PASSWORD_BCRYPT);
        $sql="UPDATE login SET password='$hash' WHERE email='$email'";

        mysqli_query($conn,$sql);

        echo "<h4>Password updated successfully</h4>";
        echo "<h4>Proceed to login <a href='./index.php'>Click here</a></h4>";
      }
      else
      {
        echo "<h4>Password don't match</h4>";
      }
  } else {
      echo"<h4>Session expired</h4>";
  }
  }
?>
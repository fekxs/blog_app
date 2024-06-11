<?php 
  include("../database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles3.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Reset pssword</title>
</head>
<body style="background-color: #1abc9c;">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
<div class="container" style="margin-top: 10%;">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

</body>
</html>

<?php 
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   require './phpmailer/PHPMailer-master/src/Exception.php';
   require './phpmailer/PHPMailer-master/src/PHPMailer.php';
   require './phpmailer/PHPMailer-master/src/SMTP.php';

   $email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);

   $sql="SELECT * FROM login WHERE email='$email'";
 
   $result=mysqli_query($conn,$sql);
 
   $row=mysqli_fetch_assoc($result);
   
   if(isset($_POST["submit"]))
   {  
    function generateToken($email,$conn) {
     
      $length = 32;
      $expirationTime = 3600;
      
      date_default_timezone_set('Asia/Kolkata');

      // Generate random bytes
      $randomBytes = random_bytes($length);
  
      // Convert to hexadecimal representation
      $token = bin2hex($randomBytes);
  
      // Calculate expiration timestamp (current time + expiration time)
      $expirationTimestamp = time() + $expirationTime;
  
      $formattedTimestamp = date('Y-m-d H:i:s', $expirationTimestamp);

      // Combine token and expiration timestamp
      mysqli_query($conn,"UPDATE login SET token='$token',expire='$formattedTimestamp' where email='$email'");

    }
  
    function isTokenValid($tokenData,$conn,$row) {

      $currentTimestamp = time();


      $currentTime24Hrs = date('Y-m-d H:i:s', $currentTimestamp);

      if ($currentTime24Hrs > $row["expire"] && $row["token"] == $tokenData) 
        return 1;
      else
        return 0;
  }

  $generatedToken = generateToken($email,$conn);
  
   // Simulating token validation after some time
   sleep(2); // Simulating the passage of time
   $isValid = isTokenValid($generatedToken,$conn,$row);
  
  
  if($isValid)
  {
    $msg="
    Hi {$row['name']}
    
    There was a request to change your password!
    
    If you did not make this request then please ignore this email.
    
    Reset link is : http://localhost/website/login_page/reset.php?email=$email";

    $mail= new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='sethusnair2003@gmail.com';
    $mail->Password='yismrkeckhomjvqf';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->setFrom('sethusnair2003@gmail.com');

    $mail->addAddress("$email");

    $mail->isHTML(true);

    $mail->Subject="Password reset";

    $mail->Body=$msg;

    $mail->send();
    
    echo "
    <script>
     alert('sent sccessfully');
    </script>
    ";
   }
   else
   {
    echo"Session expired try again";
    mysqli_query($conn,"UPDATE login SET token='$generatedToken' WHERE email='$email'");
   }
  }
?>
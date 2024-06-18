<?php 
   session_start();
   include('./database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/signup_main.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 img-container"> <!-- Adjust col-md-* as needed -->
                <!-- Picture here -->
                <img src="../img/side-img.jpg" class="img-fluid" alt="Picture">
            </div>
            <div class="col-md-8 form-container"> <!-- Adjust col-md-* as needed -->
                <!-- Login form here -->
                <h2>WELCOME</h2>
                <br>
                <form>
                        <label style="margin-left: 220px;">Name</label><br>
                        <center>
                        <input type="text" name="name" class="search__input" placeholder="e.g. elon mask" width="600px">
                        </center>
                    <br>
                        <label  style="margin-left: 220px;">User Name</label><br>
                        <center>
                        <input type="text" name="user_name" class="search__input" placeholder="e.g. elonmusk@1" width="600px">
                        </center>
                    <br>
                        <label  style="margin-left: 220px;">Password</label><br>
                        <center>
                        <input type="password" name="password" class="search__input" placeholder="6+ character" width="600px">
                        </center>
                    <br>
                    <br>
                    <div class="form-group form-check">
                        <center>
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="terms">I Agree With Blog Terms Of Service Privacy Policy, And <br>Default Notification Settings</label>
                        </center>
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-dark btn-block btn-short" style="border-radius: 10px;">Create Account</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
        $name=filter_input(INPUT_POST,"user_name",FILTER_SANITIZE_SPECIAL_CHARS);
        $email=$SESSION["email_id"];
        $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
      }
?>
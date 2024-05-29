<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../Style/Login_Style.css?v=<?php echo time()?>">
    </head>
    <body>
        <section class="login">
            <header class="login-header">
                <h5>Create an account</h5>
                <h5>Enter your email to sign up for this app</h5>
            </header>
            <div class="log-in">
                <form action="" method="post">
                    <input name="Email" type="text" placeholder="email@domain.com">
                    <input type="submit" value="Sign up with email">
                    <h6>or continue with</h6>
                </form>
            </div>
            <footer class="login-footer">
                <div><img src="../Style/Google.svg" alt="" srcset=""></div>
                <h6>By clicking continue, you agree to our Terms of Service and Privacy Policy</h6>
            </footer>
        </section>
        <?php 
        if(isset($_POST['Email'])){
            if($_POST['Email']!=''){
                $_SESSION['loggedin']=true;
                $_SESSION['user_id'] = 'user1';
                header("Location: ../index.php");
                exit();
            }
            else{
                echo "<script>alert('Email cant be empty')</script>";
            }
        }
        ?>
    </body>
</html>
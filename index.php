<?php


include 'common/sessioncheck.php'; // Ensure the user is logged in

// Your page content goes here
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome!</h1>
    <p>Your user ID is: <?php echo $user_id; ?></p>
    <a href="./login/logout.php">Logout</a>
</body>
</html>

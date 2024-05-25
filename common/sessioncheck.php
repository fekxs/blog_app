<?php
session_start();
   
  //THIS IS FOR ONLY DEVELPOMENT PURPOSE 
  $_SESSION['loggedin']=true;
  $_SESSION['user_id'] = 'user1';
  //...END

// Check if the user is logged in and the user ID is set in the session
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['user_id'])) {
    // If not, redirect to the login page
    header("Location: /login.php");
    exit();
}

// If the user is logged in and the user ID is set, proceed with the rest of the page
?>

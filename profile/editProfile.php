<?php
include '../common/db_connection.php';
include '../common/sessioncheck.php';
include '../profile/userData.php';

$user_id = $_SESSION['user_id'];

// Output the user ID
//echo "The user ID is: " . $user_id;
$user_name = "";
$user_email = "";
$user_bio = "";
$user_image = "";

// Prepare the query
$query = "SELECT user_name, user_email, user_bio, user_image FROM blog_user WHERE user_id = ?";
if ($stmt = $conn->prepare($query)) {
    // Bind the parameter
    $stmt->bind_param("s", $user_id);

    // Execute the query
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($user_name, $user_email, $user_bio, $user_image);

    // Fetch the data
    if ($stmt->fetch()) {
        // Data is fetched successfully
        // You can now use $user_name, $user_email, $user_bio, and $user_image variables
    } else {
        // No data found for the given user ID
        echo "No user found with ID: $user_id";
    }

    // Close the statement
    $stmt->close();
} else {
    // Error in preparing the statement
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<link rel="stylesheet" href="../Style/editProfileStyle.css">
<body>
    <div class="container">
    <nav> 
        <div class="leftNav"> 
            <div class="logo"> 
                <h3>Logo</h3> 
            </div> 
            
            
        </div> 
        <div class="pagetitle">
            <h2>Edit Profile</h2>
        </div>

        
        
    </nav>
    <section>
        <div class="formBox">
            <div class="imgbox">
            <img src="../media/profilepics/<?php echo $user_image; ?>" alt="#">
            <form id="imageForm" action="ProfileUpdateFunc.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="profile_image">
                    <input type="submit" value="Save" name="submit_image" >
            </form>
            </div>
            <div class="fieldbox">
            <form id="detailsForm" action="ProfileUpdateFunc.php" method="post">
            <input type="text" placeholder="Name"  name="username"value="<?php echo htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="text" placeholder="email id" name="email" value="<?php echo htmlspecialchars($user_email, ENT_QUOTES, 'UTF-8'); ?>">
                <textarea placeholder="Bio" name="bio" ><?php echo htmlspecialchars($user_bio, ENT_QUOTES, 'UTF-8'); ?></textarea>
             <!--   <input type="text" placeholder="Bio" name="bio" class="descbox" valueecho htmlspecialchars($user_bio, ENT_QUOTES, 'UTF-8'); "-->
                <input type="submit" value="Save" name="submit_details">
                <!--<button type="button" onclick="submitForms()">Save</button>-->
            </form>
            </div>

        </div>

    </section>
</div>
</body>
<script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>

</html>
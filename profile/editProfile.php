<?php
include '../common/db_connection.php';
include '../common/sessioncheck.php';

$user_id = $_SESSION['user_id'];

// Output the user ID
echo "The user ID is: " . $user_id;
$sql1 = "SELECT * FROM `blog_user` WHERE user_id = ?";
$stmt = $conn->prepare($sql1);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists and fetch the data
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $user_name = $row['user_name'];
    $user_email = $row['user_email'];
    $user_bio = $row['user_bio'];
        echo "User Name: " . $row["user_name"] . " - Email: " . $row["user_email"] . " - Image: " . $row["user_image"] . " - Bio: " . $row["user_bio"] . "<br>";
    }
}
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
                <img src="/media/blogmedia/image 7.png" alt="#">
                <input type="file">
            </div>
            <div class="fieldbox">
            <form action="">
            <input type="text" placeholder="Name" value="<?php echo htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="text" placeholder="email id" value="<?php echo htmlspecialchars($user_email, ENT_QUOTES, 'UTF-8'); ?>">
                <textarea name="" id="" placeholder="Bio" value=""><?php echo htmlspecialchars($user_bio, ENT_QUOTES, 'UTF-8'); ?></textarea>
             <!--   <input type="text" placeholder="Bio" name="bio" class="descbox" valueecho htmlspecialchars($user_bio, ENT_QUOTES, 'UTF-8'); "-->
                <input type="submit" value="Save">
            </form>
            </div>

        </div>

    </section>
</div>
</body>
<script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
</html>
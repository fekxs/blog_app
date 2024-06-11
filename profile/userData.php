<?php
    include '../common/db_connection.php';
    
    if (isset($_SESSION['user_id'])) {
        $query = "SELECT user_name, user_bio, user_image FROM blog_user WHERE user_id = ?";
        if ($stmt = $conn->prepare($query)) {

            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();
            $stmt->bind_result($username, $user_bio, $user_image);
            if ($stmt->fetch()) {
                $_SESSION['username'] = $username;
                $_SESSION['user_bio'] = $user_bio;
                $_SESSION['user_image'] = $user_image;
            }
            $stmt->close();
        }
    }
?>
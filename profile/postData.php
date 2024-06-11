<?php
include '../common/db_connection.php';
include 'userData.php';

if (isset($_SESSION['user_id'])) {
    $posts = [];
    $postQuery = "SELECT post_id, user_id, cat_id, post_title, post_detailed, post_status, DATE(post_date) AS post_date, post_image FROM posts WHERE user_id = ?";
    if ($stmt = $conn->prepare($postQuery)) {
        $stmt->bind_param("s", $_SESSION['user_id']);
        $stmt->execute();
        $stmt->bind_result($postId, $userId, $catId, $postTitle, $postContent, $postStatus, $postDate, $postImage);
        while ($stmt->fetch()) {
            $postArray = [
                'post_id' => $postId,
                'user_id' => $userId,
                'cat_id' => $catId,
                'post_title' => $postTitle,
                'post_content' => $postContent,
                'post_status' => $postStatus,
                'post_date' => $postDate,
                'post_image' =>$postImage
            ];
            $posts[] = $postArray;
        }
        $stmt->close();
    }
    $conn->close();
}
?>
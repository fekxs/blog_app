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
function fetchCategories($conn) {
    $categories = [];
    $catQuery = "SELECT cat_id, cat_name FROM post_categorise";
    if ($result = $conn->query($catQuery)) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
    }
    return $categories;
}
function fetchPostData($conn, $post_id, $user_id) {
    $postQuery = "SELECT post_title, cat_id, post_detailed FROM posts WHERE post_id = ? AND user_id = ?";
    $postData = [];
    if ($stmt = $conn->prepare($postQuery)) {
        $stmt->bind_param("ii", $post_id, $user_id);
        $stmt->execute();
        $stmt->bind_result($post_title, $cat_id, $post_detailed);
        if ($stmt->fetch()) {
            $postData = [
                'post_title' => $post_title,
                'cat_id' => $cat_id,
                'post_detailed' => $post_detailed
            ];
        }
        $stmt->close();
    }
    return $postData;
}
function fetchPostImage($conn, $post_id) {
    $postImage = '';
    $query = "SELECT media_name FROM blog_media WHERE post_id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $stmt->bind_result($media_name);
        if ($stmt->fetch()) {
            $postImage = $media_name;
        }
        $stmt->close();
    }
    return $postImage;
}

?>
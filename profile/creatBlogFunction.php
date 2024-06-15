<?php
include '../common/db_connection.php';
session_start();

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $category_id = isset($_POST['category']) ? $_POST['category'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $post_status = 0; // Set default post status to 0
    $post_date = date('Y-m-d H:i:s'); // Current date and time

    // Insert into posts table
    $postQuery = "INSERT INTO posts (user_id, cat_id, post_title, post_detailed, post_status, post_date) VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($postQuery)) {
        $stmt->bind_param("sissis", $user_id, $category_id, $title, $description, $post_status, $post_date);
        if ($stmt->execute()) {
            $post_id = $stmt->insert_id;

            // Handle file upload
            if (isset($_FILES['post_image']) && $_FILES['post_image']['error'] == 0) {
                $target_dir = "../media/blogmedia/";
                $target_file = $target_dir . basename($_FILES['post_image']['name']);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if file is an image
                $check = getimagesize($_FILES['post_image']['tmp_name']);
                if ($check !== false) {
                    if (move_uploaded_file($_FILES['post_image']['tmp_name'], $target_file)) {
                        $media_name = basename($_FILES['post_image']['name']);

                        // Insert into blog_media table
                        $mediaQuery = "INSERT INTO blog_media (post_id, media_name) VALUES (?, ?)";
                        if ($stmt = $conn->prepare($mediaQuery)) {
                            $stmt->bind_param("is", $post_id, $media_name);
                            $stmt->execute();
                            $stmt->close();
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "File is not an image.";
                }
            }

            header("Location: createBlog.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $conn->close();
}
?>

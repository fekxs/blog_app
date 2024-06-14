<?php
include '../common/db_connection.php';
session_start();

// Function to update post data in 'posts' table
function updatePost($conn, $post_id, $title, $category, $description) {
    $query = "UPDATE posts SET post_title = ?, cat_id = ?, post_detailed = ? WHERE post_id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("sisi", $title, $category, $description, $post_id);
        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
        $stmt->close();
    }
    return false; // Default return
}

// Function to update post image in 'blog_media' table
function updatePostMedia($conn, $post_id, $media_name) {
    $query = "UPDATE blog_media SET media_name = ? WHERE post_id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("si", $media_name, $post_id);
        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
        $stmt->close();
    }
    return false; // Default return
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Handle file upload if a new image is selected
    if ($_FILES['post_image']['size'] > 0) {
        $target_dir = "../media/blogmedia/";
        $target_file = $target_dir . basename($_FILES["post_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["post_image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["post_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // If everything is ok, try to upload file
            if (move_uploaded_file($_FILES["post_image"]["tmp_name"], $target_file)) {
                // File uploaded successfully, update database with new image name
                $media_name = basename($_FILES["post_image"]["name"]);
                $media_updated = updatePostMedia($conn, $post_id, $media_name);
                if (!$media_updated) {
                    echo "Error updating media name in database.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Update post data in 'posts' table
    $post_updated = updatePost($conn, $post_id, $title, $category, $description);
    if ($post_updated) {
        echo "Post updated successfully.";
    } else {
        echo "Error updating post.";
    }
}

$conn->close();
?>

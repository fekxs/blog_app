<?php
session_start();
include '../common/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    die("User ID not found in session.");
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_image'])) {
        // Handle image upload
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
            $target_dir = "../media/profilepics/";
            $target_file = $target_dir . basename($_FILES['profile_image']['name']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if file is an image
            $check = getimagesize($_FILES['profile_image']['tmp_name']);
            if ($check !== false) {
                if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                    $user_image = basename($_FILES['profile_image']['name']);
                    // Update user image in the database
                    $query = "UPDATE blog_user SET user_image = ? WHERE user_id = ?";
                    if ($stmt = $conn->prepare($query)) {
                        $stmt->bind_param("ss", $user_image, $user_id);
                        if ($stmt->execute()) {
                            // Update session variable
                           $_SESSION['user_image'] = $user_image;
                            
                            header("Location: editProfile.php");
                            exit;
                        } else {
                            echo "Error updating image: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        echo "Error preparing statement: " . $conn->error;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "File is not an image.";
            }
        }
        
    } elseif (isset($_POST['submit_details'])) {
        // Handle other details
        $user_name = isset($_POST['username']) ? $_POST['username'] : '';
        $user_email = isset($_POST['email']) ? $_POST['email'] : '';
        $user_bio = isset($_POST['bio']) ? $_POST['bio'] : '';

        // Update user details in the database
        $query = "UPDATE blog_user SET user_name = ?, user_email = ?, user_bio = ? WHERE user_id = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ssss", $user_name, $user_email, $user_bio, $user_id);
            if ($stmt->execute()) {
                // Update session variables
                $_SESSION['username'] = $user_name;
                $_SESSION['user_email'] = $user_email;
                $_SESSION['user_bio'] = $user_bio;
                
               header("Location: editProfile.php");
                exit;
            } else {
                echo "Error updating details: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }

    $conn->close();
}

<?php
include '../../common/sessioncheck.php';
include '../../common/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    $report_status = $_POST['report_status'];

    // Check if the user has already reported this post
    $check_sql = "SELECT * FROM reported_post WHERE post_id = ? AND user_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("is", $post_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "You have already reported this post.";
    } else {
        // Insert the new report
        $insert_sql = "INSERT INTO reported_post (post_id, user_id, report_status) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("iss", $post_id, $user_id, $report_status);

        if ($stmt->execute()) {
            echo "Report submitted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}

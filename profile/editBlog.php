<?php
include '../common/db_connection.php';
include '../profile/postData.php';

session_start();
$user_id = $_SESSION['user_id'];
$post_id = 11; // Example post ID, replace with actual post ID

$categories = fetchCategories($conn);
$postData = fetchPostData($conn, $post_id, $user_id);
$postImage = fetchPostImage($conn, $post_id);
echo $postImage;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="../Style/createBlogStyle.css">
</head>
<body>
    <div class="container">
        <nav> 
            <div class="leftNav"> 
                <div class="logo"> 
                    <h3>Logo</h3> 
                </div> 
            </div> 
            <div class="pagetitle">
                <h2>Edit Blog</h2>
            </div>
        </nav>
        <section>
            <div class="formBox">
                <form action="editBlogFunction.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                    <div class="banner">
                        <img src="../media/blogmedia/<?php echo htmlspecialchars($postImage); ?>" alt="Current Image">
                        <div class="icon">
                            <input type="file" id="fileinput" name="post_image">
                            <label for="fileinput" class="custom-file-label"></label>
                        </div>
                    </div>
                    <div class="inputfields">
                        <input type="text" placeholder="Title" class="inputtag" name="title" value="<?php echo htmlspecialchars($postData['post_title']); ?>">
                        <select name="category" class="inputtag">
                            <option value="" disabled>Select Category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo htmlspecialchars($category['cat_id']); ?>" <?php echo ($category['cat_id'] == $postData['cat_id']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($category['cat_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <textarea name="description" placeholder="Description" class="inputtag"><?php echo htmlspecialchars($postData['post_detailed']); ?></textarea>
                        <input type="submit" value="Update Blog" class="inputtag">
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>
<script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
</html>

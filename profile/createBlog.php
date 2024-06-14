<?php
include '../common/db_connection.php';
include '../profile/postData.php';

session_start();
$user_id = $_SESSION['user_id'];
$categories = fetchCategories($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>
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
                <h2>Create Blog</h2>
            </div>
        </nav>
        <section>
            <div class="formBox">
                <form action="creatBlogFunction.php" method="post" enctype="multipart/form-data">
                    <div class="banner">
                        <img src="../media/blogmedia/Frame 14158.png" alt="#">
                        <div class="icon">
                            <input type="file" id="fileinput" name="post_image">
                            <label for="fileinput" class="custom-file-label"></label>
                        </div>
                    </div>
                    <div class="inputfields">
                        <input type="text" placeholder="Title" class="inputtag" name="title">
                        <select name="category" class="inputtag">
                            <option value="" disabled selected>Select Category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo htmlspecialchars($category['cat_id']); ?>">
                                    <?php echo htmlspecialchars($category['cat_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <textarea name="description" placeholder="Description" class="inputtag"></textarea>
                        <input type="submit" value="Create Blog" class="inputtag">
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>
<script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
</html>

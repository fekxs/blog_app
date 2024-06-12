<?php 
    session_start();
    error_reporting(0);
    include_once 'userData.php';
    include_once 'postData.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../Style/profile.css">
</head>
<body>
    <div class="container">
        <nav>
            <div class="leftNav">
                <div class="logo">
                    <h3>Logo</h3>
                </div>

                <div class="searchBar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" placeholder="Search">
                </div>
            </div>

            <div class="rightNav">
                <i class="fa-solid fa-pen-to-square"></i>
                <i class="fa-regular fa-bell"></i>
                <div class="profile-image-container">
                    <a href="../profile/profile.php">
                        <img src="../media/profilepics/<?php echo $userImage = isset($_SESSION["user_id"]) ? $_SESSION['user_image'] : "no-user.jpeg"; ?>" 
                        alt="Profile Picture" class="profile-image">
                    </a>
                </div>
            </div>
        </nav>

        <div class="content">
            <aside class="user-details">
                <div class="header">
                    <div class="image-container">
                        <img src="../media/profilepics/<?php echo $userImage = isset($_SESSION["user_id"]) ? $_SESSION['user_image'] : "no-user.jpeg"; ?>">
                    </div>
                    <div class="name-field">
                        <h1>
                            <?php 
                                $userDisplayName = isset($_SESSION["user_id"]) ? $_SESSION['username'] : "User";
                                echo $userDisplayName; 
                            ?>
                        </h1>
                    </div>
                </div>
                <div class="bio">
                    <span class="bio">
                        <?php 
                            $userBio = isset($_SESSION["user_id"]) ? $_SESSION['user_bio'] : "No Bio";
                            echo $userBio; 
                        ?>
                    </span>
                </div>
                <a href="#" 
                    style="
                        padding-top: 1.2rem;
                        align-self: flex-start;
                        text-decoration: none;
                        color: blue;
                        font-weight: 500;
                        "
                >Edit profile</a>
            </aside>

            <section class="blog-details">
                <div class="header">
                   <div class="leftHeader">
                       <h4>Published</h4>
                   </div>
                   <div class="rightHeader">
                        <button>
                            New post
                            <i class="fa-solid fa-plus"></i>
                        </button>
                   </div>
                </div>

                <!-- Blog Blocks -->
                    <div class="block-container">
                    <?php
                        if($_SESSION['user_id']){
                            usort($posts, function($a, $b) {
                                return $b['post_id'] <=> $a['post_id'];
                            });
        
                            foreach ($posts as $post) {
                                ?>
                                <div class="blog-block">
                                    <div class="blog-image">
                                        <img src="../media/blogmedia/<?php echo $post['post_image']; ?>" alt="">
                                    </div>
                                    <div class="blog-content">
                                        <h2><?php echo $post['post_title']; ?></h2>
                                        <span><?php echo $post['post_content']; ?></span>
                                        <div class="bottom-part">
                                            <div class="time-part">
                                                <span><?php echo $post['post_date']; ?></span>
                                            </div>
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }else {
                            echo "<p style='margin-top: 15rem;font-size: 18px'>No Results Found</p>";
                        }
                    ?>
                    </div>

                <div class="slider">
                    <i class="fa-solid fa-chevron-left"></i>
                    <i class="fa-solid fa-chevron-right"></i>
                </div>

            </section>
        </div>


    </div>
    <script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
</body>
</html>
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
                        <img src="../media/profilepics/profile-demo.jpg" alt="profile-image" class="profile-image">
                    </div>
                    <div class="name-field">
                        <h1>
                           Yato
                        </h1>
                    </div>
                </div>
                <div class="bio">
                    <span class="bio">
                    Hey there! I’m John Doe, the person behind this blog. I love writing about everything from travel and food to tech and lifestyle. My goal is to make my readers smile, think, and maybe even learn something new along the way. Outside of blogging, I’m all about coffee, long walks, and binge-watching my favorite shows. Join me on this journey, and let’s have some fun together!
                    </span>
                </div>
            </aside>

            <section class="blog-details">
                <div class="header">
                    <h4>Posts</h4>
                </div>

                <!-- Blog Blocks -->
                    <div class="block-container">
                        <div class="blog-block">
                            <div class="blog-image">
                                <img src="../media/blogmedia/blog1.jpg" alt="">
                            </div>
                            <div class="blog-content">
                                <h2>Healthy Eating Made Simple</h2>
                                <span>Discover easy and delicious recipes that make healthy eating a breeze. From nutritious breakfasts to wholesome dinners, we’ve got your meals covered.</span>
                                <div class="bottom-part">
                                    <div class="time-part">
                                        <span>20 mins ago</span>
                                    </div>
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>
                            </div>
                        </div>

                        <div class="blog-block">
                            <div class="blog-image">
                                <img src="../media/blogmedia/blog2.jpg" alt="">
                            </div>
                            <div class="blog-content">
                                <h2>Fitness Fundamentals</h2>
                                <span>Ready to get fit? Our fitness fundamentals cover everything from workout routines to nutrition tips, helping you achieve your health goals.</span>
                                <div class="bottom-part">
                                    <div class="time-part">
                                        <span>20 mins ago</span>
                                    </div>
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>
                            </div>
                        </div>
    
                        <div class="blog-block">
                            <div class="blog-image">
                                <img src="../media/blogmedia/blog3.jpg" alt="">
                            </div>
                            <div class="blog-content">
                                <h2> Mindfulness and Meditation for Beginners</h2>
                                <span>Start your journey to inner peace with our beginner-friendly guide to mindfulness and meditation. Learn techniques to reduce stress and improve your well-being.</span>
                                <div class="bottom-part">
                                    <div class="time-part">
                                        <span>20 mins ago</span>
                                    </div>
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>
                            </div>
                        </div>
                         
                        <div class="blog-block">
                            <div class="blog-image">
                                <img src="../media/blogmedia/blog4.jpg" alt="">
                            </div>
                            <div class="blog-content">
                                <h2>Eco-Friendly Living</h2>
                                <span>Join the movement towards a greener planet. Explore simple yet effective ways to reduce your carbon footprint and live a more sustainable lifestyle.</span>
                                <div class="bottom-part">
                                    <div class="time-part">
                                        <span>20 mins ago</span>
                                    </div>
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>
                            </div>
                        </div>
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
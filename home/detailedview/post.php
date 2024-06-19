<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include '../../common/sessioncheck.php';
    include '../../common/db_connection.php';
    $postTitle = "Post View"; // Default title
    if (isset($_GET['Post'])) {
        $Post_id = $_GET['Post'];

        $select_sql = "SELECT * FROM posts 
                INNER JOIN blog_user ON blog_user.user_id=posts.user_id
                INNER JOIN blog_media ON blog_media.post_id=posts.post_id
                WHERE posts.post_id=$Post_id";
        $result = $conn->query($select_sql);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $postTitle = $data['post_title'];
            $desc = explode('.', $data['post_detailed']);
            $description = "";
            foreach ($desc as $data_t) {
                $description .= $data_t . ".<br>";
            }
        } else {
            header("Location: 404.html");
            exit();
        }
    } else {
        header("Location: 404.html");
        exit();
    }
    ?>
    <title>FEKLOGS: <?php echo htmlspecialchars($postTitle); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .post_view {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px;
            overflow: hidden;
            padding: 20px;
        }

        /* Post header styles */
        .post_header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* Adjusted to space between */
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
            position: relative;
            /* Needed for positioning the menu */
        }

        .post_header .back ion-icon {
            font-size: 24px;
            cursor: pointer;
            color: #007BFF;
        }

        .post_header .title {
            display: flex;
            flex-direction: column;
        }

        .post_header .title h4 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .post_header .title h5 {
            margin: 0;
            font-size: 16px;
            color: #666;
        }

        .post_header .menu {
            position: relative;
            display: inline-block;
        }

        .post_header .menu .menu-btn {
            font-size: 20px;
            cursor: pointer;
            color: #000000;
        }

        .post_header .menu .menu-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .post_header .menu .menu-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .post_header .menu .menu-content a:hover {
            background-color: #ddd;
        }

        .post_header .menu .menu-content.show {
            display: block;
        }

        /* Post details styles */
        .post_details img {
            max-width: 100%;

            width: auto;
            border-radius: 8px;
            margin-bottom: 20px;

        }

        .post_details p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
            white-space: pre-line;
            text-align: justify;
        }

        /* Post footer styles */
        .post_footer {
            text-align: right;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        /* Additional styles for better presentation */
        h4,
        h5,
        b {
            font-weight: normal;
        }

        h4 {
            font-size: 1.5em;
        }

        h5 {
            font-size: 1.2em;
        }

        b {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
        include '../../common/sessioncheck.php';
        include '../../common/db_connection.php';
        if(isset($_GET['Post'])){ 
            $Post_id=$_GET['Post']; 
        
            $select_sql="SELECT * FROM posts 
                INNER JOIN blog_user ON blog_user.user_id=posts.user_id
                INNER JOIN blog_media ON blog_media.post_id=posts.post_id
                WHERE posts.post_id=$Post_id";
            $result = $conn->query($select_sql);

            if($result->num_rows > 0) {
                $data = $result->fetch_assoc();
    ?>

    <div class="post_view">
        <div class="post_header">

            <div class="title">
                <h4><?php echo htmlspecialchars($data['post_title']); ?></h4>
                <h5>By <?php echo htmlspecialchars($data['user_name']); ?></h5>
            </div>
            <div class="back">
                <ion-icon onclick="open_post(0)" name="arrow-back-outline"></ion-icon>
            </div>
            <div class="menu">
                <span class="menu-btn" onclick="toggleMenu()">•••</span>
                <div class="menu-content" id="menuContent">
                    <a href="#" onclick="reportPost(<?php echo $data['post_id']; ?>)">Report</a>
                </div>
            </div>
        </div>
        <div class="post_details">
            <img src="../../media/blogmedia/<?php echo $data['media_name']; ?>" alt="">
            <p><?php echo $data['post_detailed']; ?></p>                 
        </div>
        <div class="post_footer">
            <b> Published on: <?php echo date('d-m-Y', strtotime($data['post_date'])); ?></b>
        </div>
    </div>

    <script>
        function toggleMenu() {
            document.getElementById('menuContent').classList.toggle('show');
        }

        function reportPost(postId) {
            var userId = "<?php echo $_SESSION['user_id']; ?>"; // Assuming user_id is stored in session
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "report_post.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                }
            };
            xhr.send("post_id=" + postId + "&user_id=" + userId + "&report_status=0");
        }

        // Close the menu if the user clicks outside of it
        document.addEventListener('click', function(event) {
            var menuContent = document.getElementById('menuContent');
            var menuButton = document.querySelector('.menu-btn');
            if (!menuContent.contains(event.target) && !menuButton.contains(event.target)) {
                menuContent.classList.remove('show');
            }
        });
    </script>
</body>

</html>
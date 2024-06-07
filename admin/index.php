<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../Style/Admin.css?v=<?php echo time()?>">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/admin.js?v=<?php echo time()?>"></script>
</head>
<body>
    <?php
    function time_calculation($datetime) {
        $now = new DateTime();
        $date = new DateTime($datetime);
        $interval = $now->diff($date);

        if ($interval->y > 0) {
            return $interval->y . " year" . ($interval->y > 1 ? "s" : "") . " ago";
        } elseif ($interval->m > 0) {
            return $interval->m . " month" . ($interval->m > 1 ? "s" : "") . " ago";
        } elseif ($interval->d > 0) {
            return $interval->d . " day" . ($interval->d > 1 ? "s" : "") . " ago";
        } elseif ($interval->h > 0) {
            return $interval->h . " hour" . ($interval->h > 1 ? "s" : "") . " ago";
        } elseif ($interval->i > 0) {
            return $interval->i . " minute" . ($interval->i > 1 ? "s" : "") . " ago";
        } else {
            return $interval->s . " second" . ($interval->s > 1 ? "s" : "") . " ago";
        }
    }
    ?>

    <div id="spinner" class="the-spinner show">
        <div class="spinner-border" role="status">
        </div>
    </div>
    <div class="main-body">
        <header></header>
        <section>
            <aside class="side-bar">
                <h5>Menu</h5>
                <nav>
                    <ul class="navigations">
                        <a href="Dashboard"><li id="nav-options" class="bi-clipboard-check">Dashboard</li></a>
                        <a href="User"><li id="nav-options" class="bi-person">Users</li></a>
                        <a href="Posts"><li id="nav-options" class="bi-pen">Posts</li></a>
                        <a href="Reports"><li id="nav-options" class="bi-inbox">Reports</li></a>
                    </ul>
                </nav>
            </aside>
            <div class="content" id="the-content">
            <?php
                $requestUri = trim($_SERVER['REQUEST_URI'], '/');
                $baseDir = 'fekxs/Project%201%20Blog/blog_app/admin';
                if (strpos($requestUri, $baseDir) === 0) {
                    $gr = substr($requestUri, strlen($baseDir));
                    $gr = trim($gr, '/'); 
                } else {
                    $gr = $requestUri;
                }
                if($gr==''){
                    include('Dashboard.php');
                }else{
                    include($gr.".php");
                }
            ?>


            </div>
        </section>
    </div>
    <script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
</body>
</html>
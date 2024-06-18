<?php
    include '../../common/sessioncheck.php';
    include '../../common/db_connection.php';
    if(isset($_GET['Post'])){ 
        $Post_id=$_GET['Post']; 
    
    $select_sql="SELECT * FROM posts 
        INNER JOIN blog_user ON blog_user.user_id=posts.user_id
        INNER JOIN blog_media ON blog_media.post_id=posts.post_id
        WHERE posts.post_id=$Post_id";
    $data=$conn->query($select_sql)->fetch_assoc();
    $desc=explode('.',$data['post_detailed']);
    $description="";
    foreach( $desc as $data_t){
        $description.=$data_t.".<br>";
    }
?>
<style>


    /* General styles */
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
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.post_header .back ion-icon {
    font-size: 24px;
    cursor: pointer;
    color: #007BFF;
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

/* Post details styles */
.post_details img {
    max-width: 100%;
    border-radius: 8px;
    margin-bottom: 20px;
}

.post_details p {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
    white-space: pre-line;
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
h4, h5, b {
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

<div class="post_view">
    <div class="post_header">
        <div class="back">
        <ion-icon onclick="open_post(0)" name="arrow-back-outline"></ion-icon>
        </div>
        <div class="title">
            <h4><?php echo $data['post_title'] ?></h4>
            <h5>By <?php echo $data['user_name'] ?></h5>
        </div>
        
    </div>
    <div class="post_details">
          <img src="../../media/blogmedia/<?php echo $data['media_name']; ?>" alt="" srcset="">
        <p><?php echo $description; ?></p>                 
    </div>
    <div class="post_footer">
        <b> Published on:  <?php echo date('d-m-Y',strtotime($data['post_date'])); ?></b>
    </div>
</div>

<?php }else{
    include("404.html");
}?>

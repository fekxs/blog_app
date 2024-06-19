<?php
    include '../common/sessioncheck.php';
    include '../common/db_connection.php';
    $len=count($tr);
    $Path=page_find($tr[$len-2]);
    if(isset($_SESSION['Post'])){
        $Post_id=$_SESSION['Post'];
    $select_sql="SELECT * FROM posts 
        INNER JOIN blog_user ON blog_user.user_id=posts.user_id
        INNER JOIN blog_media ON blog_media.post_id=posts.post_id
        WHERE posts.post_id=$Post_id";
    $data=$conn->query($select_sql)->fetch_assoc();
?>

<div class="post_view">
    <div class="post_header">
        <div class="back">
        <ion-icon <?php echo 'onclick="open_post(0,'.$Path.')"' ?> name="arrow-back-outline"></ion-icon>
        </div>
        <div class="title">
            <h4><?php echo $data['post_title'] ?></h4>
            <h5>By <?php echo $data['user_name'] ?></h5>
        </div>
        <div class="option">
            <i onclick="post_more_details(this)">•••</i>
            <?php if($data['post_status']=='0'){ ?>
                <div class="suspend-post" <?php echo "onclick='post_visibility(".$data['post_id'].",3,1)'"?> style="background-color:red;">Suspend</div>
            <?php }else{?>
                <div class="suspend-post" <?php echo "onclick='post_visibility(".$data['post_id'].",0,1)'"?> style="background-color:green;">Activate</div>
            <?php }?>
        </div>
    </div>
    <div class="post_details">
        <h6 style="<?php echo ($data['post_status']=='0')?"color:green;":"color:red;"?>">Current Status:<b> <?php echo ($data['post_status']=='0')?"Active":"Suspended"?></b></h6>
        <img src="../media/blogmedia/<?php echo $data['media_name']; ?>" alt="" srcset="">
        <p><?php echo $data['post_detailed']; ?></p>                 
    </div>
    <div class="post_footer">
        <b> Published on:  <?php echo date('d-m-Y',strtotime($data['post_date'])); ?></b>
    </div>
</div>
<script>option_select(<?php echo  $Path;?>)</script>
<?php }else{
    include("404.html");
}?>
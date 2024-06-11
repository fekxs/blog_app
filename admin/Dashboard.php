<h5>Recent Posts</h5>
<?php 
  include '../common/sessioncheck.php';
  include '../common/db_connection.php';
  $query="select * from posts
          INNER JOIN blog_user on blog_user.user_id=posts.user_id
          INNER JOIN blog_media on blog_media.post_id=posts.post_id
          where posts.post_status=0 AND blog_user.user_status=1 order by post_date desc LIMIT 5";
  $result=$conn->query($query);
  $post_details=[];
  while ($row = $result->fetch_assoc()) {
    $date=time_calculation($row['post_date']);
    $post_details[]=[
      'Author'=>$row['user_name'],
      'Image'=>$row['media_name'],
      'Post_ID'=>$row['post_id'],
      'Post_Title'=>$row['post_title'],
      'Post_detailed'=>$row['post_detailed'],
      'Post_date'=>$date,
    ];
  }
?>
<?php if(count($post_details)>0){ ?>
<div class="block-container">


  <?php foreach ($post_details as $data){ ?>
  <div class="blog-block">
    <div class="blog-image">
      <img  src="../media/blogmedia/<?php echo $data['Image']; ?>" alt="" load='lazy' />
    </div>
    <div class="blog-content">
      <h2><?php echo $data['Post_Title']; ?></h2>
      <span><?php echo $data['Post_detailed']; ?>
      </span>
      <div class="bottom-part">
        <div class="footer-part">
          <span class="auther">By <?php echo $data['Author']; ?> </span>
          <span><?php echo $data['Post_date']; ?></span>
        </div>
        <div class="Responded-More-details">
        <ul>
          <li <?php echo 'onclick="open_post('.$data['Post_ID'].',0)"' ?> style="background-color: rgb(44, 128, 254);">View More</li>
        </ul>
      </div>
      </div>
      
    </div>
  </div>
    <?php }?>
</div>
<?php }else{
      echo"<div style='height:80%;width:100%; display:grid; place-content:center; font-size:50px; font-weight: 600;'>No Recent Post Found</div>";
    } ?>

<script>option_select(0)</script>
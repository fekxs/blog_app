<?php   
  include '../common/sessioncheck.php';
  include '../common/db_connection.php';
  $key=$_GET['key'];
  $Poster_sql="SELECT * FROM posts
              INNER JOIN post_categorise ON posts.cat_id = post_categorise.cat_id
              INNER JOIN blog_user ON blog_user.user_id = posts.user_id
              INNER JOIN blog_media ON posts.post_id = blog_media.post_id
              WHERE blog_user.user_status = 1 AND  posts.post_status=0
              AND (blog_user.user_name LIKE '".$key."%' 
                OR posts.post_title LIKE '".$key."%' 
                OR post_categorise.cat_name LIKE '".$key."%')";
  $result=$conn->query($Poster_sql);
  $post_details=[];
  while ($row = $result->fetch_assoc()) {
    $date=$row['post_date'];
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

<div class="search-header">
  <input type="text" id="search-engine" placeholder="Try Searching with Title/Auther/Category" value="<?php echo $key ?>" />
  <input type="button" value="Search"  onclick="post_search(this)" />
</div>

<?php if(count($post_details)>0){ ?>
<div class="block-container">


  <?php foreach ($post_details as $data){ ?>
  <div class="blog-block">
    <div class="blog-image">
      <img  src="../media/blogmedia/<?php echo $data['Image']; ?>" alt="" />
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

        <i class="fa-solid fa-ellipsis" onclick="report_more(this)"></i>
      </div>
      <div class="Responded-More-details">
        <ul>
          <li style="background-color: red;">Suspend</li>
          <li style="background-color: rgb(44, 128, 254);">View More</li>
        </ul>
      </div>
    </div>
  </div>
    <?php }?>
</div>
<?php }else{
      echo"<div style='height:80%;width:100%; display:grid; place-content:center; font-size:50px; font-weight: 600;'>No Recent Post Found</div>";
    } ?>

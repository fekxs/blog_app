<?php   
  include '../common/Common_functions.php';
  include '../common/sessioncheck.php';
  include '../common/db_connection.php';
  $key=$_GET['key'];
  if($key==''){
    $Poster_sql="SELECT * FROM posts
    INNER JOIN post_categorise ON posts.cat_id = post_categorise.cat_id
    INNER JOIN blog_user ON blog_user.user_id = posts.user_id
    INNER JOIN blog_media ON posts.post_id = blog_media.post_id
    WHERE blog_user.user_status = 1 AND  posts.post_status!=1 AND posts.post_status!=2";
  }
  else{
    $Poster_sql="SELECT * FROM posts
    INNER JOIN post_categorise ON posts.cat_id = post_categorise.cat_id
    INNER JOIN blog_user ON blog_user.user_id = posts.user_id
    INNER JOIN blog_media ON posts.post_id = blog_media.post_id
    WHERE blog_user.user_status = 1 AND  posts.post_status!=1 AND posts.post_status!=2 
    AND (blog_user.user_name LIKE '".$key."%' 
    OR posts.post_title LIKE '".$key."%' 
    OR post_categorise.cat_name LIKE '".$key."%')";
  }
  
  $result=$conn->query($Poster_sql);
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
      'Post_status'=>$row['post_status']
    ];
  }
?>



<?php if(count($post_details)>0){ ?>
<div class="block-container">


  <?php foreach ($post_details as $data){ ?>
  <div class="blog-block">
    <div class="blog-image">
      <img  src="../media/blogmedia/<?php echo $data['Image']; ?>" alt="" />
    </div>
    <div class="blog-content">
      <h2><?php echo $data['Post_Title']; ?><p style="margin:0; font-size:15px; font-weight:500;<?php echo ($data['Post_status']=='0')?"color:green;":"color:red;"?>">Current Status:<b> <?php echo ($data['Post_status']=='0')?"Active":"Suspended"?></b></p></h2>
      <span><?php echo $data['Post_detailed']; ?>
      </span>
      <div class="bottom-part">
        <div class="footer-part">
          <span class="auther">By <?php echo $data['Author']; ?> </span>
          <span><?php echo $data['Post_date']; ?></span>
        </div>
        <div class="Responded-More-details">
        <ul>
        <?php 
            if($data['Post_status']=='0'){
                echo "<li style='background-color: red;' onclick='post_visibility(".$data['Post_ID'].",3,0)'>Suspend</li>";
            }
            else{
                echo "<li style='background-color: green;' onclick='post_visibility(".$data['Post_ID'].",0,0)'>Reactive</li>";
            }
             ?>
          <li <?php echo 'onclick="open_post('.$data['Post_ID'].',2)"' ?> style="background-color: rgb(44, 128, 254);">View More</li>
        </ul>
      </div>
      </div>
      
    </div>
  </div>
    <?php }?>
</div>
<?php }else{
      echo"<div style='height:80vh;width:100%; display:grid; place-content:center; font-size:50px; font-weight: 600;'>No Post Found</div>";
    } ?>

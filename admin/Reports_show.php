<?php
    include '../common/Common_functions.php';
  include '../common/sessioncheck.php';
  include '../common/db_connection.php';
$report=$_GET['Rkey'];
$Type=$_GET['Tkey'];
$report_details=[];
if($report==1){
    if($Type==1){
        $select="report_status!=0";
    }else if($Type==2){
        $select="report_status=1";
    }else{
        $select="report_status=2";
    }   
}else{
    $select="report_status=0";
}
$selection_sql="SELECT *
    FROM (SELECT DISTINCT post_id, user_id FROM reported_post WHERE ".$select.") AS report
    INNER JOIN blog_user ON blog_user.user_id=report.user_id
    INNER JOIN posts ON blog_user.user_id=posts.user_id
    INNER JOIN blog_media ON blog_media.post_id=posts.post_id";
    $object=$conn->query($selection_sql);
    while($values=$object->fetch_assoc()){
        $date=time_calculation($values['post_date']);
        $report_details[]=[
            'Author'=>$values['user_name'],
            'Image'=>$values['media_name'],
            'Post_ID'=>$values['post_id'],
            'Post_Title'=>$values['post_title'],
            'Post_detailed'=>$values['post_detailed'],
            'Post_date'=>$date,
        ];
    }
 ?>
<?php if(count($report_details)>0){ 
     foreach ($report_details as $data){ ?>
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
    <?php }
    }else{
      echo"<div style='height:50vh;width:100%; display:grid; place-content:center; font-size:50px; font-weight: 600;'>No Post Found</div>";
    } ?>
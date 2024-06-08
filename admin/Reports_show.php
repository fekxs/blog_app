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
    FROM (SELECT DISTINCT post_id FROM reported_post WHERE ".$select.") AS report
    INNER JOIN posts ON report.post_id=posts.post_id
    INNER JOIN blog_user ON blog_user.user_id=posts.user_id
    INNER JOIN blog_media ON blog_media.post_id=posts.post_id WHERE posts.post_status!=1 AND posts.post_status!=2";
    $object=$conn->query($selection_sql);
    while($values=$object->fetch_assoc()){

        $test_sql="SELECT * FROM reported_post WHERE post_id=".$values['post_id']." LIMIT 1;";
        $Result=$conn->query($test_sql)->fetch_assoc();

        $date=time_calculation($values['post_date']);
        $report_details[]=[
            'Report_id'=>$Result['reported_id'],
            'Author'=>$values['user_name'],
            'Image'=>$values['media_name'],
            'Post_ID'=>$values['post_id'],
            'Post_Title'=>$values['post_title'],
            'Post_detailed'=>$values['post_detailed'],
            'Post_date'=>$date,
            'Post_Status'=>$values['post_status'],
            'Status'=>$Result['report_status'],
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
      <h2><?php echo $data['Post_Title']; ?><p style="margin:0; font-size:15px; font-weight:500;<?php echo ($data['Post_Status']=='0')?"color:green;":"color:red;"?>">Current Status:<b> <?php echo ($data['Post_Status']=='0')?"Active":"Suspended"?></b></p></h2>
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
            if($data['Status']=='0'||$data['Status']=='1'){
                echo "<li style='background-color: red;' onclick='status_update(".$data['Report_id'].",2,".$report.")'>Suspend</li>";
            }
            if($data['Status']=='0'||$data['Status']=='2'){
                echo "<li style='background-color: green;' onclick='status_update(".$data['Report_id'].",1,".$report.")'>Ignore</li>";
            }
             ?>
            
          <li style="background-color: rgb(44, 128, 254);">View More</li>
        </ul>
      </div>
      </div>
      
    </div>
  </div>
    <?php }
    }else{
      echo"<div style='height:50vh;width:100%; display:grid; place-content:center; font-size:50px; font-weight: 600;'>No Post Found</div>";
    } ?>
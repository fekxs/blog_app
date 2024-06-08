<?php
$report=$_GET['Rkey'];
$Type=$_GET['Tkey'];
$report_details=[];
if($report==1){
    $selection_sql="select * from ";
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
<?php
  include '../common/sessioncheck.php';
  include '../common/db_connection.php';
  $total_sql="select * from blog_user where user_status!=0";
  $actotal_sql="select * from blog_user where user_status=1";
  $iactotal_sql="select * from blog_user where user_status=2";

  $users=$conn->query($total_sql);
  $inacusers=$conn->query($actotal_sql)->num_rows;
  $acusers=$conn->query($iactotal_sql)->num_rows;

  $total_count=$users->num_rows;
  $users_data=[];
  $i=1;
  while($row=$users->fetch_assoc()){
    $post_details_sql="select * from posts where user_id='".$row['user_id']."' and post_status=0 order by post_date";
    $date="---";
    $post_details=$conn->query($post_details_sql);
    if($post=$post_details->fetch_assoc())
    {
      $date=date('d-m-Y', strtotime($post['post_date']));
    }
    
    $users_data[]=[
      'No'=>$i,
      'User_id'=>$row['user_id'],
      'Image'=>$row['user_image'],
      'Name'=>$row['user_name'],
      'Email'=>$row['user_email'],
      'Last'=>$date,
      'Posts'=>$post_details->num_rows,
      'Status'=>$row['user_status']
    ];
    $i++;
  }
 ?>


<div class="t-user-details">
  <div class="main-details">
    <div class="bi-person"></div>
    <div>
      <ul>
        <li>Total Users</li>
        <li>Count: <?php echo $total_count ?></li>
      </ul>
    </div>
  </div>
  <div class="main-details">
    <div class="bi-person-check"></div>
    <div>
      <ul>
        <li>Active Users</li>
        <li>Count: <?php echo $inacusers ?></li>
      </ul>
    </div>
  </div>
  <div class="main-details">
    <div class="bi-person-x"></div>
    <div>
      <ul>
        <li>Inactive Users</li>
        <li>Count: <?php echo $acusers ?></li>
      </ul>
    </div>
  </div>
</div>
<div class="users-details">
  <table class="observed-data">
    <thead>
      <th>SI No</th>
      <th>User</th>
      <th>Email</th>
      <th>Last Post on</th>
      <th>Total Posts</th>
      <th>Status</th>
      <th>Tools</th>
    </thead>
    <tbody>
      <tr>
        <?php foreach($users_data as $data) { ?>
        <td style="min-width: 100px;"><?php echo $data['No'] ?></td>
        <td class="profile-image">
          <img
            src="../media/profilepics/profile-demo.jpg"
            alt=""
            srcset=""
          /><?php echo $data['Name'] ?>
        </td>
        <td><?php echo $data['Email'] ?></td>
        <td><?php echo $data['Last'] ?></td>
        <td style="text-align:center;"><?php echo $data['Posts'] ?></td>
        <td><?php echo ($data['Status']=='1')?"Active":"Inactive"; ?></td>
        <td><?php 
            if($data['Status']=='1'){
                ?><button onclick="user_visibility('<?php echo $data['User_id']; ?>',2)" class='details-view'>Deactive</button><?php
            }
            else{
              ?><button onclick="user_visibility('<?php echo $data['User_id']; ?>',1)" class='details-view'>Active</button><?php
            }
             ?>
             <button  class="details-view">View Details</button></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<script>option_select(1)</script>
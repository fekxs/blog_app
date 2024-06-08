<?php
include '../common/sessioncheck.php';
include '../common/db_connection.php';
    $Option=$_GET['Option'];
    if($Option=='0'){
        $Report_id=$_GET['report_id'];
        $Mode=$_GET['Mode'];
        $Post_detail="SELECT * FROM reported_post WHERE reported_id=".$Report_id." LIMIT 1";
        $values=$conn->query($Post_detail)->fetch_assoc();
        if($Mode=='1'){
            $sr=0;
        }else{
            $sr=3;
        }
        $Post_Update="UPDATE posts SET post_status=".$sr." WHERE post_id='".$values['post_id']."'";
        $Post="UPDATE reported_post SET report_status=".$Mode." WHERE post_id='".$values['post_id']."'";
        $conn->query($Post_Update);
        $conn->query($Post);
    }
    else if($Option=='1'){
        $Post_id=$_GET['post_id'];
        $Mode=$_GET['Mode'];
        $Update="UPDATE posts SET post_status=".$Mode." WHERE post_id='".$Post_id."'";
        $conn->query($Update);
        echo $Update;
    }
    else if($Option=='2'){
        $User_id=$_GET['user_id'];
        $Mode=$_GET['Mode'];
        $Update="UPDATE blog_user SET user_status=".$Mode." WHERE user_id='".$User_id."'";
        $conn->query($Update);
    }

?>
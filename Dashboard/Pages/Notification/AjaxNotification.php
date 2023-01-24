<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="jQuery.js" type="text/javascript"></script>
</head>

<body>

<?php

   $con=mysqli_connect("51.79.241.88","tkrp","Tkrpv2frankop","db_cid");
   $nid=$_REQUEST['nid'];
   $selectNT="select * from tbl_notification where nid='".$nid."'";
   $rowNT=mysqli_query($con,$selectNT);
   $dataNT=mysqli_fetch_assoc($rowNT);
   $ntitle=$dataNT['n_title'];
   echo "<script>alert('".$ntitle."');</script>";
   $updateN="update tbl_notification set status='1' where nid='".$nid."'";
   mysqli_query($con,$updateN);
 
 
   $selN="select * from tbl_notification where customer_id='".$_SESSION['Id']."' order by nid desc";
   $rowN=mysqli_query($con,$selN);
   $i=1;
   while($dataN=mysqli_fetch_assoc($rowN))
   {
     if($i<=8)
     {
?>
   

  <div class="dropdown">
    <a href="#" <?php if($dataN['status']=='0'){ ?> onclick="viewcom(<?php echo $dataN['nid']; ?>);" <?php } ?> data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div <?php if(!$dataN['status']){ ?>class="ntitle"<?php } else { ?>class="ntitle2"<?php } ?> ><?php echo $dataN['n_title']; ?></div>
    </a>
    <div class="dropdown-menu ddown" style="min-width: 180px;">
      <?php echo $dataN['n_des']; ?>

    </div>
  </div>
  <?php
    }
    else{
       break;
    }
    $i++;
  }
  ?>
</body>
</html>
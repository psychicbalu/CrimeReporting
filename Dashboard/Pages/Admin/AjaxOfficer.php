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
   
   $did=$_REQUEST['sid'];
   ?>
   
    <option value="">---select---</option>
        <?php
		$selQ="select * from tbl_officer_reg where des_id='".$did."'";
		$row_station=mysqli_query($con,$selQ);
		while($data_station=mysqli_fetch_assoc($row_station))
		{
			?>
            <option value="<?php echo $data_station['officer_reg_id']; ?>"><?php echo $data_station['officer_name']; ?></option>
            <?php
		}
		?>
   
   ?>
</body>
</html>
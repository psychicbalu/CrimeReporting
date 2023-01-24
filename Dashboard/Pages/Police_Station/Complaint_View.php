<?php

	ob_start();
	require "../header.php";
	
	$cid=$_SESSION['viewid'];
   $con=mysqli_connect("localhost","root","","db_cid");

   $selectQ="select * from tbl_complaints C inner join tbl_customer_reg CR on C.customer_id=CR.customer_id inner join tbl_district D on CR.dist_id=D.dist_id where C.complaints_id='".$cid."'";
   $row=mysqli_query($con,$selectQ);
   $data=mysqli_fetch_assoc($row);
   
   $selectA="select * from tbl_accused where complaints_id='".$data['complaints_id']."'";
   $rowA=mysqli_query($con,$selectA);
   $dataA=mysqli_fetch_assoc($rowA);
   
   if(isset($_POST['btndelete']))
   {
	   $deleteQ="update tbl_complaints set complaint_status='Rejected' where complaints_id='".$cid."'";
	   mysqli_query($con,$deleteQ);
	   
	     $ntitle="Complaint Rejected";
		 $ndes="Your Complaint ".substr($data['complaint_title'],0,10)."... dated on ".$data['complaint_date']." was Rejected";
		 $insertNoti="insert into tbl_notification(customer_id,n_title,n_des,status) values('".$data['customer_id']."','".$ntitle."','".$ndes."','0')";
	     mysqli_query($con,$insertNoti);
	   
			$name="CID";
			
			$mailid=$data['customer_email'];
			
			//echo $mailid;
			require("class.phpmailer.php");
			
			$mail = new PHPMailer();
			
			$mail->IsSMTP(); // set mailer to use SMTP
			$mail->SMTPAuth = true;     // turn on SMTP authentication
			$mail->SMTPSecure = "tls";
			
			$mail->Host = "smtp.gmail.com";  // specify main and backup server
			$mail->Port = 587;
			$mail->Username = "adaminiproject@gmail.com";  // SMTP username
			$mail->Password = "ashmi123"; // SMTP password
			
			$mail->From = "adaminiproject@gmail.com";
			$mail->FromName = "CID";
			$mail->AddAddress($mailid, $name);
			
			
			$mail->WordWrap = 50;// set word wrap to 50 characters
			$mail->IsHTML(true);// set email format to HTML
			
			$mail->Subject = "Your Complaint Status";
			
			$mail->Body    = "Dear user, Your Complaint given in Crime Investigation Department is Rejected";
			
			$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
			//echo $mail;
			//if(!$mail->Send())
			//{
			//   echo "Message could not be sent. <p>";
			//   echo "Mailer Error: " . $mail->ErrorInfo;
			//   exit;
			//}
			//else
			//if(!$mail->Send()) {
				//echo "Mailer Error: " . $mail->ErrorInfo;
			 //} else {
				//echo "<script>alert('Mail sended successfully')</script>";
			 //}
			 
	   header("Location:Complaints.php");
   }
    if(isset($_POST['btnactive']))
   {
	   $updateQ="update tbl_complaints set complaint_status='On Going' where complaints_id='".$cid."'";
	   mysqli_query($con,$updateQ);
	   
	     $ntitle="Complaint Accepted";
		 $ndes="Your Complaint ".substr($data['complaint_title'],0,10)."... dated on ".$data['complaint_date']." was Successfully Accepted";
		 $insertNoti="insert into tbl_notification(customer_id,n_title,n_des,status) values('".$data['customer_id']."','".$ntitle."','".$ndes."','0')";
	     mysqli_query($con,$insertNoti);
	   
			$name="CID";
			
			$mailid=$data['customer_email'];
			
			//echo $mailid;
			require("class.phpmailer.php");
			
			$mail = new PHPMailer();
			
			$mail->IsSMTP(); // set mailer to use SMTP
			$mail->SMTPAuth = true;     // turn on SMTP authentication
			$mail->SMTPSecure = "tls";
			
			$mail->Host = "smtp.gmail.com";  // specify main and backup server
			$mail->Port = 587;
			$mail->Username = "adaminiproject@gmail.com";  // SMTP username
			$mail->Password = "ashmi123"; // SMTP password
			
			$mail->From = "adaminiproject@gmail.com";
			$mail->FromName = "CID";
			$mail->AddAddress($mailid, $name);
			
			
			$mail->WordWrap = 50;// set word wrap to 50 characters
			$mail->IsHTML(true);// set email format to HTML
			
			$mail->Subject = "Your Complaint Status";
			
			$mail->Body    = "Dear user, Your Complaint given in Crime Investigation Department is Activated";
			
			$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
			//echo $mail;
			//if(!$mail->Send())
			//{
			//   echo "Message could not be sent. <p>";
			//   echo "Mailer Error: " . $mail->ErrorInfo;
			//   exit;
			//}
			//else
			//if(!$mail->Send()) {
				//echo "Mailer Error: " . $mail->ErrorInfo;
			 //} else {
				//echo "<script>alert('Mail sended successfully')</script>";
			 //}
			 
	   header("Location:Complaints.php");
   }
   if(isset($_POST['btntransfer']))
   {
	   header("Location:ComplaintTransfer.php");
   }
   
?>
<style>
.classscroll::-webkit-scrollbar {
  width: 0px;
}
</style>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Complaint Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Complaints</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
					<div class="col-lg-7">
						<div class="card" style="height: 300px;">
							<div class="card-header">
								<strong>Complaints</strong> Details
							</div>
							<div class="card-body card-block classscroll" style="overflow: scroll">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3">
											<label for="text-input" class=" form-control-label">Title :</label>
										</div>
										<div class="col col-md-9">
											<label for="text-input" class=" form-control-label"><?php echo $data['complaint_title']; ?></label>
										</div>
										<div class="clearfix"></div><br><br>
										<div class="col col-md-3">
											<label for="text-input" class=" form-control-label">Description :</label>
										</div>
										<div class="col col-md-9">
											<label for="text-input" class=" form-control-label"><?php echo $data['complaint_description']; ?></label>
										</div>
										<div class="clearfix"></div><br><br>
										<div class="col col-md-3">
											<label for="text-input" class=" form-control-label">Date :</label>
										</div>
										<div class="col col-md-9">
											<label for="text-input" class=" form-control-label"><?php echo $data['complaint_date']; ?></label>
										</div>
										<div class="clearfix"></div><br><br>
										<div class="col col-md-3">
											<label for="text-input" class=" form-control-label">Proof :</label>
										</div>
										<div class="col col-md-9">
											<label for="text-input" class=" form-control-label">
											
											  <?php
										        $dbimg=$data['complaint_proof'];
                                                $dbext=pathinfo($dbimg,PATHINFO_EXTENSION);
											    $dname="CID-CustomerId-".$data['customer_id']."andComplaintId-".$data['complaints_id'];
											    if(!$dbimg)
											    {
											  	    echo "<b style='color: red;'>NA</b>";
											    }
											    else if(($dbext=='jpg')||($dbext=='JPG')||($dbext=='png')||($dbext=='PNG')||($dbext=='gif')||($dbext=='GIF'))
											    {
												    ?>
												    <a href="../Users/images/<?php echo $dbimg; ?>" download="<?php echo $dname; ?>"><img src="../Users/images/<?php echo $data['complaint_proof'];?>" width="80px" height="50px"  />&nbsp;<i class="fa fa-download" style="font-size: 20px;"></i></a>
												    <?php
											    }
											    else if(($dbext=='mp4')||($dbext=='MP4'))
											    {
												    ?>
												    <a href="../Users/images/<?php echo $dbimg; ?>" download="<?php echo $dname; ?>"><video src="../Users/images/<?php echo $data['complaint_proof'];?>" width="80px" height="50px"  /></video>&nbsp;<i class="fa fa-download" style="font-size: 20px;"></i></a>
												    <?php
											    }
											    else
											    {
												    ?>
												    <a href="../Users/images/<?php echo $dbimg; ?>" download="<?php echo $dname; ?>"><i class="fa fa-file-text-o" style="color:black;font-size: 50px;"></i>&nbsp;<i class="fa fa-download" style="font-size: 20px;"></i></a>
												    <?php
											    }
										     ?>
											
											</label>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="card" style="height: 300px;">
							<div class="card-header">
								<strong>Accused</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-5"><label for="text-input" class=" form-control-label">Name :</label></div>
										<div class="col-12 col-md-7"><?php if($dataA['accused_name']){echo $dataA['accused_name'];} else echo "<b style='color: red;'>NA</b>"; ?></div>
										<br><br>
										<div class="col col-md-5"><label for="text-input" class=" form-control-label">Address :</label></div>
										<div class="col-12 col-md-7"><?php if($dataA['accused_address']){echo $dataA['accused_address'];} else echo "<b style='color: red;'>NA</b>"; ?></div>
										<br><br>
										<div class="col col-md-5"><label for="text-input" class=" form-control-label">Phone Number :</label></div>
										<div class="col-12 col-md-7"><?php if($dataA['accused_phno']){echo $dataA['accused_phno'];} else echo "<b style='color: red;'>NA</b>"; ?></div>
										<br><br>
										<div class="col col-md-5"><label for="text-input" class=" form-control-label">Email :</label></div>
										<div class="col-12 col-md-7"><?php if($dataA['accused_email']){echo $dataA['accused_email'];} else echo "<b style='color: red;'>NA</b>"; ?></div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<strong>Customer</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3">
											<label for="text-input" class=" form-control-label">Name :</label>
										</div>
										<div class="col col-md-9">
											<label for="text-input" class=" form-control-label"><?php echo $data['customer_name']; ?></label>
										</div>
										<div class="clearfix"></div><br><br>
										<div class="col col-md-3">
											<label for="text-input" class=" form-control-label">Gender :</label>
										</div>
										<div class="col col-md-9">
											<label for="text-input" class=" form-control-label"><?php echo $data['customer_gender']; ?></label>
										</div>
										<div class="clearfix"></div><br><br>
										<div class="col col-md-3">
											<label for="text-input" class=" form-control-label">Address :</label>
										</div>
										<div class="col col-md-9">
											<label for="text-input" class=" form-control-label"><?php echo $data['customer_address']; ?></label>
										</div>
										<div class="clearfix"></div><br><br>
										<div class="col col-md-3">
											<label for="text-input" class=" form-control-label">District :</label>
										</div>
										<div class="col col-md-9">
											<label for="text-input" class=" form-control-label"><?php echo $data['dist_name']; ?></label>
										</div>
										<div class="clearfix"></div><br><br>
										<div class="col col-md-3">
											<label for="text-input" class=" form-control-label">Email :</label>
										</div>
										<div class="col col-md-9">
											<label for="text-input" class=" form-control-label"><?php echo $data['customer_email']; ?></label>
										</div>
										<div class="clearfix"></div><br><br>
										<div class="col col-md-3">
											<label for="text-input" class=" form-control-label">Phone Number :</label>
										</div>
										<div class="col col-md-9">
											<label for="text-input" class=" form-control-label"><?php echo $data['customer_phno']; ?></label>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" name="btnactive" class="btn btn-primary btn-sm">
											<i class="fa fa-dot-circle-o"></i> Activate
										</button>
										<button onclick="return confirm('Are You Sure?')" name="btndelete" class="btn btn-danger btn-sm">
											<i class="fa fa-ban"></i> Reject
										</button>
										<button onMouseOver="this.style.backgroundColor='#0c7810'" onMouseOut="this.style.backgroundColor='#119116'" name="btntransfer" class="btn btn-primary btn-sm" style="background-color: #119116;border-color: #119116;">
											<i class="fa fa-mail-forward"></i> Transfer
										</button>
									</div>
								</form>
							</div>
							<button onMouseOver="this.style.backgroundColor='#6c757e'" onMouseOut="this.style.backgroundColor='#000000'" onclick="history.back()" class="btn btn-primary btn-sm" style="background-color: #000000;border-color: #000000;width: 65px;">
						     <i class="fa fa-hand-o-left"></i> Back
						    </button>
						</div>
					</div>
				</div>
			</div><!-- .animated -->
		</div><!-- .content -->
		
	</div><!-- /#right-panel -->
			<!-- Right Panel -->

<?php
	require "../footer.php";
?>
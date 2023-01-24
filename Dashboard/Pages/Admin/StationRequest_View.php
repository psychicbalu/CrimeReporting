<?php
	ob_start();
	require "../header.php";
	
	$aid=$_SESSION['admin_id'];
   $sid=$_GET['sid'];
   $selectQ="select * from tbl_station_reg C inner join tbl_district D on C.dist_id=D.dist_id where C.station_reg_id='".$sid."'";
   $row=mysqli_query($con,$selectQ);
   $data=mysqli_fetch_assoc($row);
   
   if(isset($_POST['btndelete']))
   {
	   $deleteQ="delete from tbl_station_reg where station_reg_id='".$sid."'";
	   mysqli_query($con,$deleteQ);
	   
			$name="CID";
			
			$mailid=$data['station_email'];
			
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
			
			$mail->Subject = "Your Registration";
			
			$mail->Body    = "Dear user, Your registration for Crime Investigation Department is rejected";
			
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
	   header("Location:StationRequest.php");
   }
    if(isset($_POST['btnactive']))
   {
	   $updateQ="update tbl_station_reg set status='1' where station_reg_id='".$sid."'";
	   mysqli_query($con,$updateQ);
	   
	   $name="CID";
			
			$mailid=$data['station_email'];
			
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
			
			$mail->Subject = "Your Registration";
			
			$mail->Body    = "Dear user, Your registration for Crime Investigation Department is Accepted.";
			
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
		header("Location:StationRequest.php");	 
   }
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Station</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Station</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<strong>Station</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Station Name :</label></div>
										<div class="col-12 col-md-9"><?php echo $data['station_name']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">District</label></div>
										<div class="col-12 col-md-9"><?php echo $data['dist_name']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
										<div class="col-12 col-md-9"><?php echo $data['station_address']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone Number</label></div>
										<div class="col-12 col-md-9"><?php echo $data['station_phno']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
										<div class="col-12 col-md-9"><?php echo $data['station_email']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Website</label></div>
										<div class="col-12 col-md-9">
										  <?php
										  if($data['station_website'])
										  {?>
									         <a href="<?php echo $data['station_website']; ?>" target="_blank" ><i class="fa fa-link" style="color: blue;font-size: 20px;"></i> <?php echo $data['station_website']; ?></a>
										     
											 <?php
										  }
										  else
										  {
											  echo "<b style='color: red;'>NA</b>";
										  }
										  ?>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Registration Date</label></div>
										<div class="col-12 col-md-9"><?php echo $data['station_reg_date']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Proof</label></div>
										<div class="col-12 col-md-9">
										<?php
										  $dbimg=$data['station_proof'];
										  $dname="CID-StationName-".$data['station_name']."-".$data['station_reg_id'];
										?>
										  <a href="../Police_Station/Stations/<?php echo $dbimg; ?>" download="<?php echo $dname; ?>">
										    <img src="../Police_Station/Stations/<?php echo $data['station_proof'];?>" width="150px" height="100px"/>&nbsp;
											<i class="fa fa-download" style="font-size: 20px;"></i>
										  </a>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" name="btnactive" class="btn btn-primary btn-sm">
											<i class="fa fa-dot-circle-o"></i> Approve
										</button>
										<button onclick="return confirm('Are You Sure?')" type="submit" name="btndelete" class="btn btn-danger btn-sm">
											<i class="fa fa-ban"></i> Reject
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
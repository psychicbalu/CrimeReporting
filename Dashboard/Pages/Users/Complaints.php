<?php

	ob_start();
	require "../header.php";
	
	$cid=$_SESSION['Id'];
	$select="select * from tbl_customer_reg C inner join tbl_district D on C.dist_id=D.dist_id where C.customer_id='".$cid."'";
   $row=mysqli_query($con,$select);
   $data=mysqli_fetch_assoc($row);
   $email=$data['customer_email'];
   
   if(isset($_POST['btnsubmit']))
   {
	   $dist_id=$_POST['seldistrict'];
	   $station_id=$_POST['selstation'];
	   $title=strtoupper($_POST['txttitle']);
	   $des=ucfirst($_POST['txtdescription']);
	   $fsize=$_FILES['fileproof']['size'];
	   if($fsize>10000000)
	   {
		   echo "<script> alert('Uploaded File Size Is too Big.Try Again...');</script>";
	   }
	   else
	   {
	     $img=$_FILES['fileproof']['name'];
	     $temp=$_FILES['fileproof']['tmp_name'];
		 if($img)
		  {
			$ext=pathinfo($img,PATHINFO_EXTENSION);
	        $ran=rand(111111,999999);
	        $img="CustomerId-".$data['customer_id'].'_'.$ran.'.'.$ext;
	   
	        move_uploaded_file($temp,"images/".$img);
			
		  }
	     
	     $com_status="Pending";
	     $date=date('Y-m-d');


	     $insertQC="insert into tbl_complaints(dist_id,station_reg_id,customer_id,complaint_title,complaint_description,complaint_proof,complaint_status,complaint_date) values('".$dist_id."','".$station_id."','".$cid."','".$title."','".$des."','".$img."','".$com_status."','".$date."')";
	     //echo $insertQC;
	     mysqli_query($con,$insertQC);
         $select_cid="select complaints_id from tbl_complaints where customer_id='".$cid."' order by complaints_id desc  limit 1 ";
	   
	     $row=mysqli_query($con,$select_cid);
	   
	     $data=mysqli_fetch_assoc($row);
	   
	     $com_id=$data['complaints_id'];
	   
	     $acc_name=strtoupper($_POST['txtaccusedname']);
	     $acc_address=ucwords($_POST['txtaccusedaddress']);
	     $acc_email=$_POST['txtaccusedemail'];
	     $acc_phno=$_POST['txtaccusedphno'];
	     $acc_status="Active";
	   
	     $insertA="insert into tbl_accused(complaints_id,accused_name,accused_address,accused_email,accused_phno,accused_status) values('".$com_id."','".$acc_name."','".$acc_address."','".$acc_email."','".$acc_phno."','".$acc_status."')";
	 
	     mysqli_query($con,$insertA);
		 
		 $ntitle="Complaint Posted";
		 $ndes="Your Complaint ".substr($title,0,10)."... dated on ".$date." was Successfully Posted";
		 $insertNoti="insert into tbl_notification(customer_id,n_title,n_des,status) values('".$cid."','".$ntitle."','".$ndes."','0')";
	     mysqli_query($con,$insertNoti);
	   
	    	$mailid=$email;	
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
			
			  $mail->Subject = "Your Complaint";
			
			  $mail->Body    = "Dear user, Your complaint to Crime Investigation Department is posted successfully";
			
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
			  	 // echo "Mailer Error: " . $mail->ErrorInfo;
			   //} else {
				 // echo "<script>alert('Mail sended successfully')</script>";
			   //}
			header('Location:MyComplaints.php');
	   }
   }
   
?>

<script src="jQuery.js" type="text/javascript"></script>
<script >

	function getStation(s)
	{
		$.ajax({
			url:"AjaxStation.php",
			data:{sid:s},
			success:function(result)
			{
				$("#selstation").html(result);
			}
			});
	}
</script>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Complaint</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Complaint</a></li>
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
								<strong>Complaint</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">District</label></div>
										<div class="col-12 col-md-9">
										  <select name="seldistrict" id="seldistrict"  class="form-control" onchange="getStation(this.value)" title="Select a District" required>
											<option value="">----select---</option>
											<?php
											$selQ="select * from tbl_district";
											$row=mysqli_query($con,$selQ);
											while($data=mysqli_fetch_assoc($row))
											{
												?>
												<option value="<?php echo $data['dist_id']; ?>" ><?php echo $data['dist_name']; ?></option>
												<?php
											}
											?>
										  </select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Station</label></div>
										<div class="col-12 col-md-9">
										<select name="selstation" id="selstation" class="form-control" title="Select a Station" required>
											<option value="">----select---</option>

										  </select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Complaint Title</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txttitle" class="form-control" minlength="4" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{4,50}" title="Enter The Complaint Title(use A-Z or a-z)" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
										<div class="col-12 col-md-9"><textarea name="txtdescription" class="form-control" minlength="10" maxlength="500" pattern="[A-Za-z0-9\s]+{10,500}" title="Enter The Description(use A-Z or a-z)" required></textarea></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Proof</label></div>
										<div class="col-12 col-md-9"><input type="file" name="fileproof" id="fileproof" class="form-control" title="Select The File" accept="image/*,audio/*,video/*,.pdf,.docx"></div>
									</div>
									<div class="card-header">
										<strong>Accused</strong> Details
									</div><br>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txtaccusedname" class="form-control" minlength="4" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{4,50}" title="Enter Name(use A-Z or a-z)"></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
										<div class="col-12 col-md-9"><textarea name="txtaccusedaddress" class="form-control" minlength="10" maxlength="100" style="text-transform: capitalize;" pattern="[A-Za-z0-9\s]+{4,50}" title="Enter Address(use A-Z or a-z)" ></textarea></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
										<div class="col-12 col-md-9"><input type="email" id="text-input" name="txtaccusedemail" minlength="4" maxlength="100" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="Enter Email" ></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone Number</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" minlength="10" maxlength="10" pattern="[0-9]{10}" name="txtaccusedphno" class="form-control" title="Enter PhoneNumber" ></div>
									</div>
									<div class="card-footer">
										<button type="submit" name="btnsubmit" class="btn btn-primary btn-sm">
											<i class="fa fa-dot-circle-o"></i> Submit
										</button>
										<button type="reset" class="btn btn-danger btn-sm">
											<i class="fa fa-ban"></i> Reset
										</button>
									</div>
								</form>
							</div>
							
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
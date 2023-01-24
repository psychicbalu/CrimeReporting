<?php

	ob_start();
	require "../header.php";
	
	$sid=$_SESSION['Id'];
   $con=mysqli_connect("localhost","root","","db_cid");

   $selectQ="select * from tbl_station_reg where station_reg_id='".$sid."'";
   $row=mysqli_query($con,$selectQ);
   $data=mysqli_fetch_assoc($row);
   $deleteid=isset($_GET['did'])?$_GET['did']:null;
   if($deleteid)
   {
	   $delQ="delete from tbl_officer_reg where officer_reg_id='".$deleteid."'";
	   mysqli_query($con,$delQ);
	   header("Location:Officer_Reg.php");
   }
   if(isset($_POST['btnsubmit']))
   {
	   $name=strtoupper($_POST['txtname']);
	   $address=ucwords($_POST['txtaddress']);
	   $email=$_POST['txtemail'];
	   $phno=$_POST['txtphno'];
	   $dist_id=$data['dist_id'];
	   $station_id=$sid;
	   $des_id=$_POST['seldes'];
	   $date=date('Y-m-d');
	   $insertQ="insert into tbl_officer_reg(officer_name,officer_address,dist_id,officer_email,officer_phno,station_reg_id,des_id) values('".$name."','".$address."','".$dist_id."','".$email."','".$phno."','".$station_id."','".$des_id."')";
	   mysqli_query($con,$insertQ);
	   
	   /*$mailid=$_POST['txtemail'];
			
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
			
			$mail->Body    = "Dear user, Your registration in Crime Investigation Department is done by your Station";
			
			$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
			//echo $mail;
			//if(!$mail->Send())
			//{
			//   echo "Message could not be sent. <p>";
			//   echo "Mailer Error: " . $mail->ErrorInfo;
			//   exit;
			//}
			//else
			if(!$mail->Send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			 } else {
				echo "<script>alert('Mail sended successfully')</script>";
			 }
			*/ 
	   header("Location:Officer_Reg.php");
   }
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Officer Registration</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Officer Registration</a></li>
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
								<strong>Officer</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txtname" class="form-control" minlength="4" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{4,50}" title="Enter Name(use A-Z or a-z)" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
										<div class="col-12 col-md-9"><textarea id="text-input" name="txtaddress"  cols="45" rows="5" class="form-control" minlength="10" maxlength="100" style="text-transform: capitalize;" pattern="[A-Za-z0-9\s]+{4,50}" title="Enter Address" required></textarea></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
										<div class="col-12 col-md-9"><input type="email" id="text-input" name="txtemail" class="form-control" minlength="4" maxlength="100" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="Enter Email" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone Number</label></div>
										<div class="col-12 col-md-9"><input type="text" pattern="[0-9]{5,10}" id="text-input" name="txtphno" class="form-control" minlength="10" maxlength="10" pattern="[0-9]{10}" title="Enter PhoneNumber" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Designation</label></div>
										<div class="col-12 col-md-9">
										<select name="seldes" id="seldes"  class="form-control" title="Select Designation" required>
											<option value="">----select---</option>
											<?php
											$selQ="select * from tbl_designation";
											$row_des=mysqli_query($con,$selQ);
											while($data_des=mysqli_fetch_assoc($row_des))
											{
												?>
												<option value="<?php echo $data_des['des_id']; ?>"><?php echo $data_des['des_name']; ?></option>
												<?php
											}
											?>
										  </select>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" name="btnsubmit" class="btn btn-primary btn-sm">
											<i class="fa fa-dot-circle-o"></i> SAVE
										</button>
										<button type="reset" class="btn btn-danger btn-sm">
											<i class="fa fa-ban"></i> Reset
										</button>
									</div>
								</form>
							</div>
							
							
							
						</div>
			
			
			<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Officer Table</strong>
                            </div>
                            <div class="card-body" style="overflow: auto;">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
											<th>Designation</th>
											<th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$selQ="select * from tbl_officer_reg O inner join tbl_designation E on o.des_id=E.des_id where O.station_reg_id='".$sid."'";
											$row=mysqli_query($con,$selQ);
											$i=1;
											while($data=mysqli_fetch_assoc($row))
											{
												
												?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $data['officer_name']; ?></td>
													<td><?php echo $data['des_name']; ?></td>
													<td><a href="OfficerEdit.php?eid=<?php echo $data['officer_reg_id']; ?>"><i class="fa fa-edit" style="font-size: 20px;"></i></a></td>
													<td><a onclick="return confirm('Are You Sure?')" href="Officer_Reg.php?did=<?php echo $data['officer_reg_id']; ?>"><i class="fa fa-trash-o" style="font-size: 20px;"></i></a></td>
												</tr>
												<?php
												$i++;
											}
											
											
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
		
	</div><!-- /#right-panel -->
			<!-- Right Panel -->


					</div>
				</div>
			</div><!-- .animated -->
		</div><!-- .content -->
		
		
	</div><!-- /#right-panel -->
			<!-- Right Panel -->


    
<?php
	require "../footer.php";
?>
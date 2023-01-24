<?php

	ob_start();
	require "../header.php";
	
   $cid=$_SESSION['Id'];
   $select="select * from tbl_customer_reg C inner join tbl_district D on C.dist_id=D.dist_id where C.customer_id='".$cid."'";
   $row=mysqli_query($con,$select);
   $data=mysqli_fetch_assoc($row);
   
   if(isset($_POST['btnsubmit']))
   {
	   $name=strtoupper($_POST['txtname']);
	   $address=ucwords($_POST['txtaddress']);
	   $gender=$_POST['rdgender'];
	   $email=$_POST['txtemail'];
	   $phno=$_POST['txtphno'];
	   $dist_id=$_POST['seldistrict'];
	   $username=strtolower($_POST['txtusername']);
	    $selA="select * from tbl_admin where admin_username='".$username."'";
		$rowA=mysqli_query($con,$selA);
		$numA=mysqli_num_rows($rowA);
		
		$selE="select * from  tbl_station_reg where station_username='".$username."'";
		$rowE=mysqli_query($con,$selE);
		$numE=mysqli_num_rows($rowE);
		
		$selC="select * from  tbl_customer_reg where customer_username='".$username."'";
		$rowC=mysqli_query($con,$selC);
		$numC=mysqli_num_rows($rowC);
		
		if(($numA==0)&&($numE==0)&&($numC==0)||($data['customer_username']==$username))
		{
	       $updateQ="update tbl_customer_reg set customer_name='".$name."',customer_address='".$address."',customer_gender='".$gender."',customer_email='".$email."',customer_phno='".$phno."',customer_username='".$username."' where customer_id='".$cid."'";
	       mysqli_query($con,$updateQ);
	       header("Location:Customer_Profile.php");
	    }
		else
		{
			echo "<script>alert('This Username is already exists!')</script>";
		}
	   
   }
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Customer Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Customer Profile</a></li>
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
								<strong>Customer Profile</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txtname" class="form-control" value="<?php echo $data['customer_name']; ?>" minlength="4" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{4,50}" title="Enter Your Name(use A-Z or a-z)" required></div>
									</div>
									<?php
									$male="Male";
									$female="Female";
									?>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Gender</label></div>
										<div class="col-12 col-md-9">
										<input type="radio" name="rdgender" id="rdgender" value="Male" <?php if($data['customer_gender']==$male){echo 'checked';}?> />
										  Male   
											<input type="radio" name="rdgender" id="rdgender" value="Female" <?php if($data['customer_gender']==$female){echo 'checked';}?>/>
											Female
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
										<div class="col-12 col-md-9"><textarea id="text-input" name="txtaddress"  cols="45" rows="5" class="form-control" minlength="10" maxlength="100" style="text-transform: capitalize;" pattern="[A-Za-z0-9\s]+{4,50}" title="Enter Address(use A-Z or a-z)" required><?php echo $data['customer_address']; ?></textarea></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">District</label></div>
										<div class="col-12 col-md-9">
										<select name="seldistrict" id="seldistrict"  class="form-control" title="Select District" required >
											<option value="">----select---</option>
											<?php
											$selQ="select * from tbl_district";
											$row=mysqli_query($con,$selQ);
											while($dataD=mysqli_fetch_assoc($row))
											{
												?>
												<option value="<?php echo $dataD['dist_id']; ?>" <?php if($dataD['dist_id']== $data['dist_id']){echo 'selected';}?>><?php echo $dataD['dist_name']; ?></option>
												<?php
											}
											?>
										  </select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
										<div class="col-12 col-md-9"><input type="email" id="text-input" name="txtemail" class="form-control" value="<?php echo $data['customer_email']; ?>" minlength="4" maxlength="100" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="Enter Email" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone Number</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txtphno" class="form-control" value="<?php echo $data['customer_phno']; ?>" minlength="10" maxlength="10" pattern="[0-9]{10}" title="Enter PhoneNumber" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txtusername" value="<?php echo $data['customer_username']; ?>"class="form-control" minlength="4" maxlength="30" style="text-transform: lowercase;" pattern="[A-Za-z0-9]{4,30}" title="Enter Username" required></div>
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
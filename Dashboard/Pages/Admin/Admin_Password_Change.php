<?php

	ob_start();
	require "../header.php";
	
	$aid=$_SESSION['Id'];
   $con=mysqli_connect("localhost","root","","db_cid");
  if(isset($_POST['btnsubmit']))
   {
     $cpasswd=$_POST['txtoldpassword'];
	 $npasswd=$_POST['txtnewpassword'];
	 $rpasswd=$_POST['txtrepassword'];
	 if($npasswd==$rpasswd)
	 {
		 $selectQ="select * from tbl_admin where admin_id='".$aid."'";
		 $row=mysqli_query($con,$selectQ);
	     $data=mysqli_fetch_assoc($row);
		 if($data['admin_password']==$cpasswd)
		 {
			 $updateQ="update tbl_admin set admin_password='".$npasswd."' where admin_id='".$aid."'";
			 mysqli_query($con,$updateQ);
			 header("Location:../Others/index.php");
		 }
		 else echo "<script>alert('Current Password Does not match...');</script>";
     }
	 else echo "<script>alert('New Password and Retype Password do not match...');</script>";
   }
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Change Password</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Change Password</a></li>
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
								<strong>Change Password</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Old Password</label></div>
										<div class="col-12 col-md-9"><input type="password" id="text-input" name="txtoldpassword" class="form-control" minlength="8" maxlength="30" pattern="[A-Za-z0-9\s]{4,30}" title="Enter Old Password" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">New Password</label></div>
										<div class="col-12 col-md-9"><input type="password" id="text-input" name="txtnewpassword" class="form-control" minlength="8" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Confirm Password</label></div>
										<div class="col-12 col-md-9"><input type="password" id="text-input" name="txtrepassword" class="form-control" minlength="8" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
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
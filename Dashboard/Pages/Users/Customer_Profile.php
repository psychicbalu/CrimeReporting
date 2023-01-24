<?php

	ob_start();
	require "../header.php";
	
	//$cid=$_SESSION['customer_id'];
   $selectQ="select * from tbl_customer_reg C inner join tbl_district D on C.dist_id=D.dist_id where C.customer_id='".$_SESSION['Id']."'";
   $row=mysqli_query($con,$selectQ);
   $data=mysqli_fetch_assoc($row);
   
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
								<strong>Customer</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
										<div class="col-12 col-md-9"><?php echo $data['customer_username']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Customer Name</label></div>
										<div class="col-12 col-md-9"><?php echo $data['customer_name']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">gender</label></div>
										<div class="col-12 col-md-9"><?php echo $data['customer_gender']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">District</label></div>
										<div class="col-12 col-md-9"><?php echo $data['dist_name']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
										<div class="col-12 col-md-9"><?php echo $data['customer_address']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
										<div class="col-12 col-md-9"><?php echo $data['customer_email']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone Nmber</label></div>
										<div class="col-12 col-md-9"><?php echo $data['customer_phno']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-12"><a href="Customer_Profile_Edit.php"><i class="fa fa-edit" style="font-size: 18px;color: black;"></i> Edit Details</a></div>
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
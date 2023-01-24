<?php

	ob_start();
	require "../header.php";
	
	
   $selectQ="select * from tbl_station_reg C inner join tbl_district D on C.dist_id=D.dist_id where C.station_reg_id='".$_SESSION['Id']."'";
   $row=mysqli_query($con,$selectQ);
   $data=mysqli_fetch_assoc($row);
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Station Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Station Profile</a></li>
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
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
										<div class="col-12 col-md-9"><?php echo $data['station_username']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Station Name</label></div>
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
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
										<div class="col-12 col-md-9"><?php echo $data['station_email']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone Nmber</label></div>
										<div class="col-12 col-md-9"><?php echo $data['station_phno']; ?></div>
									</div><div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Website</label></div>
										<div class="col-12 col-md-9"><?php if($data['station_website']){ ?><a href="<?php echo $data['station_website']; ?>" target="_blank"><i class="fa fa-external-link" style="font-size: 18px;color: blue;"></i> <?php echo $data['station_website']; ?></a><?php } else{ echo "<b style='color: red;'>NA</b>"; } ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-12"><a href="Station_Profile_Edit.php"><i class="fa fa-edit" style="font-size: 18px;color: black;"></i> Edit Details</a></div>
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
<?php
	ob_start();
	require "../header.php";
	
   $sid=$_GET['sid'];
   $selectQ="select * from tbl_officer_reg C inner join tbl_station_reg S on C.station_reg_id=S.station_reg_id inner join tbl_district D on C.dist_id=D.dist_id inner join tbl_designation DS on C.des_id=DS.des_id where C.officer_reg_id='".$sid."'";
   $row=mysqli_query($con,$selectQ);
   $data=mysqli_fetch_assoc($row);
   
  
    if(isset($_POST['btnactive']))
   {
	  
	   header("Location:Officer_Details.php");
   }
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Officer</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Officer Details</a></li>
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
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Name :</label></div>
										<div class="col-12 col-md-9"><?php echo $data['officer_name']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Designation :</label></div>
										<div class="col-12 col-md-9"><?php echo $data['des_name']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">District :</label></div>
										<div class="col-12 col-md-9"><?php echo $data['dist_name']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Address :</label></div>
										<div class="col-12 col-md-9"><?php echo $data['officer_address']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone Number :</label></div>
										<div class="col-12 col-md-9"><?php echo $data['officer_phno']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Email :</label></div>
										<div class="col-12 col-md-9"><?php echo $data['officer_email']; ?></div>
									</div>
									
								</form>
							</div>
						</div>
						<button onMouseOver="this.style.backgroundColor='#6c757e'" onMouseOut="this.style.backgroundColor='#000000'" onclick="history.back()" class="btn btn-primary btn-sm" style="background-color: #000000;border-color: #000000;width: 65px;">
						 <i class="fa fa-hand-o-left"></i> Back
						</button>
					</div>
				</div>
			</div><!-- .animated -->
		</div><!-- .content -->
		
	</div><!-- /#right-panel -->
			<!-- Right Panel -->

<?php
	require "../footer.php";
?>
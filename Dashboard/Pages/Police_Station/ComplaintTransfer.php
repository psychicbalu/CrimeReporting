<?php

	ob_start();
	require "../header.php";
	
	$cid=$_SESSION['viewid'];
	$con=mysqli_connect("51.79.241.88","tkrp","Tkrpv2frankop","db_cid");

    $selectQ="select * from tbl_complaints c inner join tbl_station_reg s on c.station_reg_id=s.station_reg_id where c.complaints_id='".$cid."'";
    $rowQ=mysqli_query($con,$selectQ);
    $dataQ=mysqli_fetch_assoc($rowQ);
   if(isset($_POST['btntransfer']))
   {
	   $dist_id=$_POST['seldistrict'];
	   $station_id=$_POST['selstation'];
	   $updateQ="update tbl_complaints set dist_id='".$dist_id."', station_reg_id='".$station_id."' where complaints_id='".$cid."'";
	   mysqli_query($con,$updateQ);
	   
	     $ntitle="Complaint Transfered";
		 $ndes="Your Complaint ".substr($dataQ['complaint_title'],0,10)."... dated on ".$dataQ['complaint_date']." was Transfered";
		 $insertNoti="insert into tbl_notification(customer_id,n_title,n_des,status) values('".$dataQ['customer_id']."','".$ntitle."','".$ndes."','0')";
	     mysqli_query($con,$insertNoti);
	   header("Location:Complaints.php");
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
                        <h1>Complaint Transfer</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Complaint Transfer</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
					<div class="col-lg-12">
					<?php
									
					   $selectQ="select * from tbl_rating C inner join tbl_customer_reg CR on C.customer_id=CR.customer_id inner join tbl_station_reg D on C.station_reg_id=D.station_reg_id where C.station_reg_id='".$_SESSION['Id']."'";
					   $row=mysqli_query($con,$selectQ);
					   
					?>
									
						<div class="card">
							<div class="card-header">
								<strong>Complaint ID : </strong> <?php echo $dataQ['complaints_id']; ?>
								
							</div>
							<div class="card-body card-block">
							  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Complaint Title :</label></div>
										<div class="col-12 col-md-9">
										  <?php echo $dataQ['complaint_title']; ?>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label"><b><i><u>From :</u></i></b></label></div>
										
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Station Name :</label></div>
										<div class="col-12 col-md-9">
										  <?php echo $dataQ['station_name']; ?>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label"><b><i><u>To :</u></i></b></label></div>
										
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">District :</label></div>
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
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Station :</label></div>
										<div class="col-12 col-md-9">
										  <select name="selstation" id="selstation" class="form-control" title="Select a Station" required>
											<option value="">----select---</option>

										  </select>
										</div>
									</div>
								<div class="card-footer">
								
										<button type="submit" name="btntransfer" class="btn btn-primary btn-sm">
											<i class="fa fa-dot-circle-o"></i> Transfer
										</button>
										<button type="reset" class="btn btn-danger btn-sm">
											<i class="fa fa-ban"></i> Reset
										</button>
										
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
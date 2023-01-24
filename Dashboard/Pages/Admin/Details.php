<?php
	require "../header.php";
	
	if(isset($_POST['btnsubmit']))
   {
     $station_id=$_POST['selstation'];
     $selectQ="select * from tbl_station_reg C inner join tbl_district D on C.dist_id=D.dist_id where C.station_reg_id='".$station_id."'";
     $rowQ=mysqli_query($con,$selectQ);
	   
     $dataQ=mysqli_fetch_assoc($rowQ);
   }
   
   $sid=$_GET['sid'];
   if($sid)
   {
	   $_SESSION['sid']=$sid;
	   header("Location:Officer_Details.php");
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
                        <h1>Station - Officer</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Officers</a></li>
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
										<div class="col-12 col-md-9">
										<select name="seldistrict" id="seldistrict" class="form-control" onchange="getStation(this.value)">
											<option value="">---District---</option>
											<?php
											$selQ="select * from tbl_district";
											$row=mysqli_query($con,$selQ);
											while($data=mysqli_fetch_assoc($row))
											{
												?>
												<option value="<?php echo $data['dist_id']; ?>"><?php echo $data['dist_name']; ?></option>
												<?php
											}
											?>
										</select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">District</label></div>
										<div class="col-12 col-md-9">
										<select name="selstation" class="form-control" id="selstation">
											<option value="">---Station---</option>

										  </select>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" name="btnsubmit" class="btn btn-primary btn-sm">
											<i class="fa fa-dot-circle-o"></i> Submit
										</button>
									</div>
								</form>
							</div>
							<div class="card-header">
								<strong>Station</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Station Name :</label></div>
										<div class="col-12 col-md-9"><?php echo $dataQ['station_name']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">District</label></div>
										<div class="col-12 col-md-9"><?php echo $dataQ['dist_name']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
										<div class="col-12 col-md-9"><?php echo $dataQ['station_address']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone Number</label></div>
										<div class="col-12 col-md-9"><?php echo $dataQ['station_phno']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
										<div class="col-12 col-md-9"><?php echo $dataQ['station_email']; ?></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Website</label></div>
										<div class="col-12 col-md-9"><?php echo $dataQ['station_website']; ?></div>
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
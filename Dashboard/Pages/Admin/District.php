<?php
	ob_start();
	require "../header.php";
	$con=mysqli_connect("localhost","root","","db_cid");
	
	$deleteid=isset($_GET['did'])?$_GET['did']:null;
    $editid=isset($_GET['eid'])?$_GET['eid']:null;
   if(isset($_POST['btnsubmit']))
   {
	   $district=strtoupper($_POST['txtdistrict']);
	   if($editid=="")
			{
				$selM="select * from tbl_district where dist_name='".$district."'";
				$rowM=mysqli_query($con,$selM);
				$dataM=mysqli_num_rows($rowM);
				if($dataM==0)
				{
					$insertQ="insert into tbl_district(dist_name) values('".$district."')";
	                mysqli_query($con,$insertQ);
				    header("location:District.php");
				}
				else
				{
					echo "<script>alert('District already exists!')</script>";
				}
				
			}
			else
			{
				$updateQ="update tbl_district set dist_name='".$district."' where dist_id='".$editid."'";
	            mysqli_query($con,$updateQ);
				header("location:District.php");
			}
	   
   }
   
   if($deleteid)
   {
	   $delQ="delete from tbl_district where dist_id='".$deleteid."'";
	   mysqli_query($con,$delQ);
	   header("Location:District.php");
   }
   if($editid)
   {
	   $selectD="select * from tbl_district where dist_id='".$editid."'";
	   $rowD=mysqli_query($con,$selectD);
	   $dataD=mysqli_fetch_assoc($rowD);
   }
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>District</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">District</a></li>
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
								<strong>District</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">District</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txtdistrict" class="form-control" value="<?php if(isset($dataD['dist_name']))echo $dataD['dist_name'] ?>" minlength="4" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{4,50}" title="District Name" required></div>
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
		
		<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body" style="overflow: auto;">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>District</th>
											<th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$selQ="select * from tbl_district";
											$row=mysqli_query($con,$selQ);
											while($data=mysqli_fetch_assoc($row))
											{
												
												?>
												<tr>
													<td><?php echo $data['dist_id']; ?></td>
													<td><?php echo $data['dist_name']; ?></td>
													<td><a href="District.php?eid=<?php echo $data['dist_id']; ?>"><i class="fa fa-edit" style="font-size: 20px;"></i></a></td>
													<td><a onclick="return confirm('Are You Sure?')" href="District.php?did=<?php echo $data['dist_id']; ?>"><i class="fa fa-trash-o" style="font-size: 20px;"></i></a></td>
												</tr>
												<?php
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

<?php
	require "../footer.php";
?>
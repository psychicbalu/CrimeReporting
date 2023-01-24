<?php

	ob_start();
	require "../header.php";
	$con=mysqli_connect("51.79.241.88","tkrp","Tkrpv2frankop","db_cid");
	
	
	
	$deleteid=isset($_GET['did'])?$_GET['did']:null;
	$editid=isset($_GET['eid'])?$_GET['eid']:null;
   if(isset($_POST['btnsubmit']))
   {
	   $des=strtoupper($_POST['txtdes']);
	   if($editid=="")
			{
				$selM="select * from tbl_designation where des_name='".$des."'";
				$rowM=mysqli_query($con,$selM);
				$dataM=mysqli_num_rows($rowM);
				if($dataM==0)
				{
					$insertQ="insert into tbl_designation(des_name) values('".$des."')";
	                mysqli_query($con,$insertQ);
				    header("location:Designation.php");
				}
				else
				{
					echo "<script>alert('Designation already exists!')</script>";
				}
				
			}
			else
			{
				$updateQ="update tbl_designation set des_name='".$des."' where des_id='".$editid."'";
	            mysqli_query($con,$updateQ);
				header("location:Designation.php");
			}
	   
   }
   if($deleteid)
   {
	   $delQ="delete from tbl_designation where des_id='".$deleteid."'";
	   mysqli_query($con,$delQ);
	   header("Location:Designation.php");
   }
   if($editid)
   {
	   $selectD="select * from tbl_designation where des_id='".$editid."'";
	   $rowD=mysqli_query($con,$selectD);
	   $dataD=mysqli_fetch_assoc($rowD);
   }
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Designation</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Designation</a></li>
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
								<strong>Designation</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Designation</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txtdes" class="form-control" value="<?=isset($dataD['des_name'])?$dataD['des_name']:null?>" minlength="2" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{2,50}" title="Enter Designation" required></div>
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
                                            <th>Designation</th>
											<th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$selQ="select * from tbl_designation";
											$row=mysqli_query($con,$selQ);
											while($data=mysqli_fetch_assoc($row))
											{
												
												?>
												<tr>
													<td><?php echo $data['des_id']; ?></td>
													<td><?php echo $data['des_name']; ?></td>
													<td><a href="Designation.php?eid=<?php echo $data['des_id']; ?>"><i class="fa fa-edit" style="font-size: 20px;"></i></a></td>
													<td><a onclick="return confirm('Are You Sure?')" href="Designation.php?did=<?php echo $data['des_id']; ?>"><i class="fa fa-trash-o" style="font-size: 20px;"></i></a></td>
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
<?php
	ob_start();
	require "../header.php";
	
	$deleteid=isset($_GET['did'])?$_GET['did']:null;
	$editid=isset($_GET['eid'])?$_GET['eid']:null;
	
	$dd=date('Y-m-d');
	
	
   if($editid)
   {
	   $delQ="select * from tbl_awareness where awareness_id='".$editid."'";
	   $rows=mysqli_query($con,$delQ);
	   $datas=mysqli_fetch_assoc($rows);
   }
   
   
   if(isset($_POST['btnsubmit']))
   {
	   
	   extract($_POST);
		$error=array();
		$extension=array("jpeg","jpg","png","gif");
			$file_name=$_FILES["fileupphoto"]["name"];
			$file_tmp=$_FILES["fileupphoto"]["tmp_name"];
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);

			if(in_array($ext,$extension)) {
				if(!file_exists("Awareness/".$file_name)) {
					move_uploaded_file($file_tmp=$_FILES["fileupphoto"]["tmp_name"],"Awareness/".$file_name);
				}
				else {
					$filename=basename($file_name,$ext);
					$newFileName=$filename.time().".".$ext;
					$file_name=$newFileName;
					move_uploaded_file($file_tmp=$_FILES["fileupphoto"]["tmp_name"],"Awareness/".$file_name);
				}
			}
			else {
				array_push($error,"$file_name, ");
			}
			//echo "<script>alert('".$editid."')</script>";
			
			
			if($editid=="")
			{
				$insertQ="insert into tbl_awareness(awareness_title,awareness_description,awareness_file,awareness_date) values('".strtoupper($_POST['txttitle'])."','".ucfirst($_POST['txtdes'])."','".$file_name."','".$dd."')";
				mysqli_query($con,$insertQ);
			}
			else
			{
				if($file_name=="")
				{
					$file_name=$datas['awareness_file'];
				}
			
				$upq="update tbl_awareness set  awareness_title='".strtoupper($_POST['txttitle'])."',awareness_description='".ucfirst($_POST['txtdes'])."',awareness_date='".$dd."',awareness_file='".$file_name."' where awareness_id='".$editid."'";
				//echo $insq;
				mysqli_query($con,$upq);
				header("location:Awareness.php");
			}
   }
   
   if($deleteid)
   {
	   $delQ="delete from tbl_awareness where awareness_id='".$deleteid."'";
	   mysqli_query($con,$delQ);
	   header("Location:Awareness.php");
   }
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Awareness</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Awareness</a></li>
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
								<strong>Awareness</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Title</label></div>
										<div class="col-12 col-md-9"><input type="text" id="txttitle" name="txttitle" value="<?php if(isset($datas['awareness_title']))echo $datas['awareness_title'] ?>" class="form-control" minlength="4" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{4,50}" title="Enter Title(use A-Z or a-z)" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
										<div class="col-12 col-md-9"><textarea id="txtdes" name="txtdes" class="form-control" minlength="10" maxlength="500" pattern="[A-Za-z0-9\s]+{10,500}" title="Enter Description(use A-Z or a-z)" required><?php if(isset($datas['awareness_description']))echo $datas['awareness_description'] ?></textarea></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">File</label></div>
										<div class="col-12 col-md-9"><input type="file" id="fileupphoto" name="fileupphoto" class="form-control" accept="image/*" title="Select Image" >
										<?php
										if(isset($datas['awareness_file']) && $datas['awareness_file']!="")
										{
										?>
										<img src="Awareness/<?php echo $datas['awareness_file'] ?>" height="100px" weight="100px">
										<?php
										}
										?>
										</div>
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
                                            <th>No</th>
                                            <th>Title</th>
											<th>Description</th>
											<th>File</th>
											<th>Date</th>
											<th>Edit</th>
											<th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$selQ="select * from tbl_awareness";
											$row=mysqli_query($con,$selQ);
											while($data=mysqli_fetch_assoc($row))
											{
												
												?>
												<tr>
													<td><?php echo $data['awareness_id']; ?></td>
													<td><?php echo $data['awareness_title']; ?></td>
													<td><?php echo $data['awareness_description']; ?></td>
													<td><?php if($data['awareness_file']){?><center><img src="Awareness/<?php echo $data['awareness_file'] ?>" height="100px" width="100px"></center><?php } else { echo "<center><b style='color: red;'>NA</b></center>";} ?></td>
													<td><?php echo $data['awareness_date']; ?></td>
													<td><a href="Awareness.php?eid=<?php echo $data['awareness_id']; ?>"><i class="fa fa-edit" style="font-size: 20px;"></i></a></td>
													<td><a onclick="return confirm('Are You Sure?')" href="Awareness.php?did=<?php echo $data['awareness_id']; ?>"><i class="fa fa-trash-o" style="font-size: 20px;"></i></a></td>
													
												
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
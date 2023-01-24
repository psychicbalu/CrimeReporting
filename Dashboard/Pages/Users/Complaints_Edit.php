<?php

	ob_start();
	require "../header.php";
	//$cid=$_SESSION['customer_id'];
   $editid=$_SESSION['editid'];
   
   $selectCE="select * from tbl_complaints where complaints_id='".$editid."'";
   $rowCE=mysqli_query($con,$selectCE);
   $dataCE=mysqli_fetch_assoc($rowCE);
   
   $selectAE="select * from tbl_accused where complaints_id='".$editid."'";
   $rowAE=mysqli_query($con,$selectAE);
   $dataAE=mysqli_fetch_assoc($rowAE);
   
   if(isset($_POST['btnsubmit']))
   {
	   $dist_id=$_POST['seldistrict'];
	   $station_id=$_POST['selstation'];
	   $title=strtoupper($_POST['txttitle']);
	   $des=ucfirst($_POST['txtdescription']);
	   $fsize=$_FILES['fileproof']['size'];
	   if($fsize>10000000)
	   {
		   echo "<script> alert('Uploaded File Size Is too Big.Try Again...');</script>";
	   }
	   else
	   {
	     $img=$_FILES['fileproof']['name'];
	     $temp=$_FILES['fileproof']['tmp_name'];
		 if($img=="")
		  {
			$img=$dataCE['complaint_proof'];
			
		  }
	     else
		 {
			 $floc=$dataCE['complaint_proof'];
			 if($floc)
			 {
				 unlink("images/".$floc);
			 }
			 
			 $ext=pathinfo($img,PATHINFO_EXTENSION);
	         $ran=rand(111111,999999);
	         $img="CustomerId-".$dataCE['customer_id'].'_'.$ran.'.'.$ext;
	   
	         move_uploaded_file($temp,"images/".$img);
		 }
	
		  
		

	     $updateC="update tbl_complaints set dist_id='".$dist_id."',station_reg_id='".$station_id."',complaint_title='".$title."',complaint_description='".$des."',complaint_proof='".$img."' where complaints_id='".$editid."'";

		 mysqli_query($con,$updateC);
      
	     $acc_name=strtoupper($_POST['txtaccusedname']);
	     $acc_address=ucwords($_POST['txtaccusedaddress']);
	     $acc_email=$_POST['txtaccusedemail'];
	     $acc_phno=$_POST['txtaccusedphno'];
	   
	     $updateA="update tbl_accused set accused_name='".$acc_name."',accused_address='".$acc_address."',accused_email='".$acc_email."',accused_phno='".$acc_phno."' where complaints_id='".$editid."'";
	 
	     mysqli_query($con,$updateA);
		 header('Location:MyComplaints.php');
	   }
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
                        <h1>Complaint</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Complaint</a></li>
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
								<strong>Complaint</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">District</label></div>
										<div class="col-12 col-md-9">
										<?php
										  if($dataCE['complaint_status']=="Pending")
										  {
											  ?>
										    <select name="seldistrict" id="seldistrict"  class="form-control" onchange="getStation(this.value)">
											  <option value="">----select---</option>
												  <?php
												  $selQ="select * from tbl_district";
												  $row=mysqli_query($con,$selQ);
												  while($data=mysqli_fetch_assoc($row))
												  {
													  ?>
													  <option value="<?php echo $data['dist_id']; ?>" <?php if($dataCE['dist_id']== $data['dist_id']){echo 'selected';}?>><?php echo $data['dist_name']; ?></option>
													  <?php
												  }
												  ?>
										    </select>
											<?php
										  }
										  else
										  {
												  $selQ="select * from tbl_district d inner join tbl_complaints c on d.dist_id=c.dist_id where complaints_id='".$dataCE['complaints_id']."'";
												  $row=mysqli_query($con,$selQ);
												  $data=mysqli_fetch_assoc($row);
												  echo $data['dist_name'];
												  
												 
										  }
										?>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Station</label></div>
										<div class="col-12 col-md-9">
										<?php
										  $selQ="select * from tbl_station_reg s inner join tbl_complaints c on s.station_reg_id=c.station_reg_id where complaints_id='".$dataCE['complaints_id']."'";
										  $row=mysqli_query($con,$selQ);
										  $data=mysqli_fetch_assoc($row);
										  if($dataCE['complaint_status']=="Pending")
										  {
											  ?>
										<select name="selstation" id="selstation" class="form-control"  >
											<option value="<?php echo $data['station_reg_id']; ?>"><?php echo $data['station_name']; ?></option>

										  </select>
										  <?php
										  }
										  else
										  {
												  
												  echo $data['station_name'];
												  
												 
										  }
										?>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Complaint Title</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txttitle" class="form-control"  value="<?php echo $dataCE['complaint_title']; ?>" minlength="4" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{4,50}" title="Enter The Complaint Title(use A-Z or a-z)" required ></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
										<div class="col-12 col-md-9"><textarea name="txtdescription" class="form-control" minlength="10" maxlength="500" pattern="[A-Za-z0-9\s]+{10,500}" title="Enter The Description" required><?php echo $dataCE['complaint_description']; ?></textarea></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Proof</label></div>
										<div class="col-12 col-md-9"><input type="file" name="fileproof" id="fileproof" class="form-control" title="Select The File" accept="image/*,audio/*,video/*,.pdf,.docx">
										  <?php
										     $dbimg=$dataCE['complaint_proof'];
                                             $dbext=pathinfo($dbimg,PATHINFO_EXTENSION);
											 $dname="CID-CustomerId-".$dataCE['customer_id']."andComplaintId-".$dataCE['complaints_id'];
											 if(!$dbimg)
											 {
												 echo "NA";
											 }
											 else if(($dbext=='jpg')||($dbext=='JPG')||($dbext=='png')||($dbext=='PNG')||($dbext=='gif')||($dbext=='GIF'))
											 {
												 ?>
												 <a href="images/<?php echo $dbimg; ?>" download="<?php echo $dname; ?>"><img src="images/<?php echo $dataCE['complaint_proof'];?>" width="150px" height="100px"  />&nbsp;<i class="fa fa-download" style="font-size: 20px;"></i></a>
												 <?php
											 }
											 else if(($dbext=='mp4')||($dbext=='MP4'))
											    {
												 ?>
												 <a href="images/<?php echo $dbimg; ?>" download="<?php echo $dname; ?>"><video src="images/<?php echo $dataCE['complaint_proof'];?>" width="150px" height="100px"  /></video>&nbsp;<i class="fa fa-download" style="font-size: 20px;"></i></a>
												 <?php
											 }
											 else
											    {
												 ?>
												 <a href="images/<?php echo $dbimg; ?>" download="<?php echo $dname; ?>"><i class="fa fa-file-text-o" style="color:black;font-size: 50px;"></i>&nbsp;<i class="fa fa-download" style="font-size: 20px;"></i></a>
												 <?php
											 }
										  ?>
										</div>
									</div>
									<div class="card-header">
										<strong>Accused</strong> Details
									</div>
									<br>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txtaccusedname" class="form-control" value="<?php echo $dataAE['accused_name']; ?>" minlength="4" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{4,50}" title="Enter Name(use A-Z or a-z)"></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
										<div class="col-12 col-md-9"><textarea name="txtaccusedaddress" class="form-control" minlength="10" maxlength="100" style="text-transform: capitalize;" pattern="[A-Za-z0-9\s]+{4,50}" title="Enter Address(use A-Z or a-z)"><?php echo $dataAE['accused_address']; ?></textarea></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
										<div class="col-12 col-md-9"><input type="email" id="text-input" name="txtaccusedemail" class="form-control" value="<?php echo $dataAE['accused_email']; ?>" minlength="4" maxlength="100" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="Enter Email"></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone Number</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input"  name="txtaccusedphno" class="form-control" value="<?php echo $dataAE['accused_phno']; ?>" minlength="10" maxlength="10" pattern="[0-9]{10}" name="txtaccusedphno" class="form-control" title="Enter PhoneNumber"></div>
									</div>
									<div class="card-footer">
										<?php
										  if($dataCE['complaint_status']=="Completed")
										  {
											  ?>
											  <strong><?php echo "Complaint Status : Completed"; ?></strong>
											  <?php
										  }
										  else
										  {
											  ?>
										      <button type="submit" name="btnsubmit" class="btn btn-primary btn-sm">
											      <i class="fa fa-dot-circle-o"></i> Submit
										      </button>
										      <button type="reset" class="btn btn-danger btn-sm">
											      <i class="fa fa-ban"></i> Reset
										      </button>
											  <?php
										  }
										  ?>
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
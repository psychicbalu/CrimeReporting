<?php

	ob_start();
	require "../header.php";
	
   $sid=$_SESSION['Id'];
   $select="select * from tbl_station_reg C inner join tbl_district D on C.dist_id=D.dist_id where C.station_reg_id='".$sid."'";
   $row=mysqli_query($con,$select);
   $data=mysqli_fetch_assoc($row);
   
   if(isset($_POST['btnsubmit']))
   {
	   $sname=strtoupper($_POST['txtname']);
	   $saddress=ucwords($_POST['txtaddress']);
	   $semail=$_POST['txtemail'];
	   $sphno=$_POST['txtphno'];
	   $dist_id=$_POST['seldistrict'];
	   $swebsite=$_POST['txtwebsite'];
	   $fsize=$_FILES['filestationproof']['size'];
	   if($fsize>10000000)
	   {
		   echo "<script> alert('Uploaded File Size Is too Big.Try Again...');</script>";
	   }
	   else
	   {
	     $img=$_FILES['filestationproof']['name'];
	     $temp=$_FILES['filestationproof']['tmp_name'];
		 if($img=="")
		  {
			$img=$data['station_proof'];
			
		  }
	     else
		 {
			 $floc=$data['station_proof'];
			 if($floc)
			 {
				 unlink("Stations/".$floc);
			 }
			 
			 $ext=pathinfo($img,PATHINFO_EXTENSION);
	         $ran=rand(111111,999999);
	         $img="StationName".$data['station_name'].'_'.$ran.'.'.$ext;
	   
	         move_uploaded_file($temp,"Stations/".$img);
		 }
		 
		 
	     $susername=strtolower($_POST['txtusername']);
	       $selA="select * from tbl_admin where admin_username='".$susername."'";
		   $rowA=mysqli_query($con,$selA);
		   $numA=mysqli_num_rows($rowA);
		
		   $selE="select * from  tbl_station_reg where station_username='".$susername."'";
		   $rowE=mysqli_query($con,$selE);
		   $numE=mysqli_num_rows($rowE);
		
		   $selC="select * from  tbl_customer_reg where customer_username='".$susername."'";
		   $rowC=mysqli_query($con,$selC);
		   $numC=mysqli_num_rows($rowC);
		
		   if(($numA==0)&&($numE==0)&&($numC==0)||($data['station_username']==$susername))
		   {
	          $updateQ="update tbl_station_reg set station_name='".$sname."',station_address='".$saddress."',station_email='".$semail."',station_phno='".$sphno."',dist_id='".$dist_id."',station_website='".$swebsite."',station_username='".$susername."',station_proof='".$img."' where station_reg_id='".$sid."'";
	          mysqli_query($con,$updateQ);
	          header('location:Station_Profile.php');
	       }
		   else
		   {
			   echo "<script>alert('This Username is already exists!')</script>";
		   }
	   } 
	   
   }
   
   
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
								<strong>Station Profile</strong> Details
							</div>
							<div class="card-body card-block">
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txtusername" value="<?php echo $data['station_username']; ?>" class="form-control" minlength="4" maxlength="30" style="text-transform: lowercase;" pattern="[A-Za-z0-9]{4,30}" title="Enter Username" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Station Name</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txtname" class="form-control" value="<?php echo $data['station_name']; ?>" minlength="4" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{4,50}" title="Enter Your Name(use A-Z or a-z)" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
										<div class="col-12 col-md-9"><textarea id="text-input" name="txtaddress"  cols="45" rows="5" class="form-control" minlength="10" maxlength="100" style="text-transform: capitalize;" pattern="[A-Za-z0-9\s]+{4,50}" title="Enter Address(use A-Z or a-z)" required><?php echo $data['station_address']; ?></textarea></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">District</label></div>
										<div class="col-12 col-md-9">
										<select name="seldistrict" id="seldistrict"  class="form-control" title="Select District" required>
											<option value="">----select---</option>
											<?php
											$selQ="select * from tbl_district";
											$row=mysqli_query($con,$selQ);
											while($dataD=mysqli_fetch_assoc($row))
											{
												?>
												<option value="<?php echo $dataD['dist_id']; ?>" <?php if($dataD['dist_id']== $data['dist_id']){echo 'selected';}?>><?php echo $dataD['dist_name']; ?></option>
												<?php
											}
											?>
										  </select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
										<div class="col-12 col-md-9"><input type="email" id="text-input" name="txtemail" class="form-control" value="<?php echo $data['station_email']; ?>" minlength="4" maxlength="100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="Enter Email" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone Number</label></div>
										<div class="col-12 col-md-9"><input type="text" id="text-input" name="txtphno" class="form-control" value="<?php echo $data['station_phno']; ?>" minlength="10" maxlength="10" pattern="[0-9]{10}" title="Enter 10 Digit PhoneNumber" required></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Website</label></div>
										<div class="col-12 col-md-9"><input type="url" id="text-input" name="txtwebsite" class="form-control" minlength="4" maxlength="100" title="Use http://" value="<?php echo $data['station_website']; ?>" placeholder="Use http://"></div>
									</div>
									<!--<div class="row form-group">
										<div class="col col-md-3"><label for="text-input" class=" form-control-label">Proof</label></div>
										<div class="col-12 col-md-9"><input type="file" name="filestationproof" id="filestationproof" class="form-control" title="Select The File" accept="image/*">
										   
										   <?php
										     $dbimg=$data['station_proof'];
                                             $dbext=pathinfo($dbimg,PATHINFO_EXTENSION);
											 $dname="CID-StationId-".$data['station_reg_id']."andStationName-".$data['station_name'];
											 if(!$dbimg)
											 {
												 echo "NA";
											 }
											 else if(($dbext=='jpg')||($dbext=='JPG')||($dbext=='png')||($dbext=='PNG'))
											 {
												 ?>
												 <a href="Stations/<?php echo $dbimg; ?>" download="<?php echo $dname; ?>"><img src="Stations/<?php echo $data['station_proof'];?>" width="150px" height="100px"  />&nbsp;<i class="fa fa-download" style="font-size: 20px;"></i></a>
												 <?php
											 }
											 else
											    {
												 ?>
												 <a href="Stations/<?php echo $dbimg; ?>" download="<?php echo $dname; ?>"><i class="fa fa-file-text-o" style="color:black;font-size: 50px;"></i>&nbsp;<i class="fa fa-download" style="font-size: 20px;"></i></a>
												 <?php
											 }
										  ?>
										</div>
									</div>-->
									<div class="card-footer">
										<button type="submit" name="btnsubmit" class="btn btn-primary btn-sm">
											<i class="fa fa-dot-circle-o"></i> Submit
										</button>
									
										<button  type="Reset" class="btn btn-danger btn-sm">
											<i class="fa fa-ban"></i> Reset
										</button>
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
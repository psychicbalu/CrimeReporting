<?php
	require "header.php";
	
	if(isset($_POST['btnsubmit']))
   {
		$selA="select * from tbl_admin where admin_username='".$_POST['txtusername']."'";
		$rowA=mysqli_query($con,$selA);
		$numA=mysqli_num_rows($rowA);
		
		$selE="select * from  tbl_station_reg where station_username='".$_POST['txtusername']."'";
		$rowE=mysqli_query($con,$selE);
		$numE=mysqli_num_rows($rowE);
		
		$selC="select * from  tbl_customer_reg where customer_username='".$_POST['txtusername']."'";
		$rowC=mysqli_query($con,$selC);
		$numC=mysqli_num_rows($rowC);
		
		if($numA>0)
		{
			echo "<script>alert('This Username is already exists!')</script>";
		}
		else if($numE>0)
		{
			echo "<script>alert('This Username is already exists!')</script>";
		}
		else if($numC>0)
		{
			echo "<script>alert('This Username is already exists!')</script>";
		}
		else
		{
		   $sname=strtoupper($_POST['txtname']);
		   $saddress=ucwords($_POST['txtaddress']);
		   $semail=$_POST['txtemail'];
		   $sphno=$_POST['txtphno'];
		   $dist_id=$_POST['seldistrict'];
		   $susername=strtolower($_POST['txtusername']);
		   $spassword=$_POST['txtpassword'];
		   $cpassword=$_POST['txtcpassword'];
		   $date=date('Y-m-d');
		   $swebsite=$_POST['txtwebsite'];
		   
		   if($cpassword==$spassword)
		   {
			   $fsize=$_FILES['filestationproof']['size'];
			   if($fsize>10000000)
	           {
		          echo "<script> alert('Uploaded File Size Is too Big.Try Again...');</script>";
	           }
	           else
	           {
			       $img=$_FILES['filestationproof']['name'];
			       $temp=$_FILES['filestationproof']['tmp_name'];
			       $ext=pathinfo($img,PATHINFO_EXTENSION);
				   if(($ext=='jpg')||($ext=='JPG')||($ext=='png')||($ext=='PNG'))
				   {
					   $ran=rand(111111,999999);
					   $img="StationName-".$susername.'_'.$ran.'.'.$ext;
					   move_uploaded_file($temp,"Dashboard/Pages/Police_Station/Stations/".$img);
			   
			           $status='0';
			   
			           $insertQ="insert into tbl_station_reg(station_name,station_address,dist_id,station_email,station_phno,station_website,station_username,station_password,station_proof,station_reg_date,status) values('".$sname."','".$saddress."','".$dist_id."','".$semail."','".$sphno."','".$swebsite."','".$susername."','".$spassword."','".$img."','".$date."','".$status."')";
			           mysqli_query($con,$insertQ);
				
				       header("Location:login.php");
				   }
				   else
				   {
					   echo "<script>alert('Use JPG or PNG format Files')</script>";
				   }
			       
			   }
		   }
		   else
		   {
			   echo "<script>alert('Confirm your Password!')</script>";
		   }
		}
		
   }
?>

    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-5 ftco-animate pb-5 text-center" >
            <h1 class="mb-3 bread">Station Registration</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Station Registration <i class="ion-ios-arrow-forward"></i></span></p>
		  </div>
        </div>
      </div>
    </section>


    <section class="ftco-section services-section bg-light">
      <div class="container mt-0">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-4">Station Registration</h2>
          </div>
        </div>
        <div class="row no-gutters d-flex">
		  <div class="col-md-2"></div>
          <div class="col-md-8 services align-self-stretch ftco-animate p-4">
            <form action="#" method="post" enctype="multipart/form-data" class="contact-form">
              <div class="form-group">
				<label>Enter Station Name</label>
                <input type="text" name="txtname" style="text-transform: uppercase;color:#fff !important;background-color:transparent !important;" class="form-control" placeholder="Your Name" minlength="4" maxlength="50" pattern="[A-Za-z\s]{4,50}" title="Enter Name(use A-Z or a-z)" required>
              </div>
              <div class="form-group">
				<label>Enter Station Addess</label>
                <textarea name="txtaddress" style="text-transform: capitalize;color:#fff !important;background-color:transparent !important;" class="form-control" placeholder="Your Addess" minlength="10" maxlength="100" pattern="[A-Za-z0-9\s]+{4,50}" title="Enter Address(use A-Z or a-z)" required></textarea>
              </div>
              <div class="form-group">
				<label>Select District</label>
                <select name="seldistrict" id="seldistrict" style="color:#fff !important;background-color:transparent !important" class="form-control" title="Select District" required>
					<option value="">----select---</option>
					<?php
					$selQ="select * from tbl_district";
					$row=mysqli_query($con,$selQ);
					while($data=mysqli_fetch_assoc($row))
					{
						?>
						<option value="<?php echo $data['dist_id']; ?>" style="color:#000 !important;"><?php echo $data['dist_name']; ?></option>
						<?php
					}
					?>
				  </select>
			  </div>
              <div class="form-group">
				<label>Enter Station Email</label>
                <input type="email" name="txtemail" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Your Email" minlength="4" maxlength="100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="Enter Email" required>
              </div>
			  <div class="form-group">
				<label>Enter Station Contact Number</label>
                <input type="tel" name="txtphno" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Your Contact Number" minlength="10" maxlength="10" pattern="[0-9]{10}" title="Enter 10 Digit PhoneNumber" required>
              </div>
			  <div class="form-group">
				<label>Enter Station Website</label>
                <input type="text" name="txtwebsite" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Use http:// (Not Required)" minlength="4" maxlength="100" title="Use http://" >
              </div>
			  <div class="form-group">
				<label>Add Proof</label>
                <input type="file" name="filestationproof" id="filestationproof" style="color:#fff !important;background-color:transparent !important" class="form-control" title="Select The File" accept="image/*" required/>
              </div>
              <div class="form-group">
				<label>Create station Username</label>
                <input type="text" name="txtusername" style="text-transform: lowercase;color:#fff !important;background-color:transparent !important;" class="form-control" placeholder="Your Username" minlength="4" maxlength="30" pattern="[A-Za-z0-9]{4,30}" title="Enter Username" required>
              </div>
			  <div class="form-group">
				<label>Create Password</label>
                <input type="password" name="txtpassword" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Your Password" minlength="8" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              </div>
              <div class="form-group">
				<label>Confirm Password</label>
                <input type="password" name="txtcpassword" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Confirm Your Password" minlength="8" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              </div>
			  <div class="form-group">
                <input type="submit" name="btnsubmit" value="Register" style="background-color: #eac15a08 !important;" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
		  <div class="col-md-2"></div>
        </div>
      </div>
    </section>


<?php
	require "footer.php";
?>
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
		   $name=strtoupper($_POST['txtname']);
		   $address=ucwords($_POST['txtaddress']);
		   $gender=$_POST['rdgender'];
		   $email=$_POST['txtemail'];
		   $phno=$_POST['txtphno'];
		   $dist_id=$_POST['seldistrict'];
		   $password=$_POST['txtpassword'];
		   $cpassword=$_POST['txtcpassword'];
		   $username=strtolower($_POST['txtusername']);
		   $date=date('Y-m-d');
		   
		   if($cpassword==$password)
		   {
			   $insertQ="insert into tbl_customer_reg(customer_name,customer_gender,customer_address,customer_email,customer_phno,customer_username,customer_password,customer_reg_date,dist_id) values('".$name."','".$gender."','".$address."','".$email."','".$phno."','".$username."','".$password."','".$date."','".$dist_id."')";
			
				mysqli_query($con,$insertQ);
				
				$selectnoti="select * from tbl_customer_reg where customer_username='".$username."'";
				$rownoti=mysqli_query($con,$selectnoti);
				$datanoti=mysqli_fetch_assoc($rownoti);
				
				$ntitle="Welcome";
		        $ndes="$name Welcome to Crime Investigation Department.";
		        $insertNoti="insert into tbl_notification(customer_id,n_title,n_des,status) values('".$datanoti['customer_id']."','".$ntitle."','".$ndes."','0')";
	            mysqli_query($con,$insertNoti);
		 
				header("Location:login.php");
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
            <h1 class="mb-3 bread">User Registration</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>User Registration <i class="ion-ios-arrow-forward"></i></span></p>
		  </div>
        </div>
      </div>
    </section>


    <section class="ftco-section services-section bg-light">
      <div class="container mt-0">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-4">User Registration</h2>
          </div>
        </div>
        <div class="row no-gutters d-flex">
		  <div class="col-md-2"></div>
          <div class="col-md-8 services align-self-stretch ftco-animate p-4">
            <form action="#" method="post" class="contact-form">
              <div class="form-group">
				<label>Enter your Name</label>
                <input type="text" name="txtname" style="text-transform: uppercase;color:#fff !important;background-color:transparent !important;" class="form-control" placeholder="Your Name" minlength="4" maxlength="50" pattern="[A-Za-z\s]{4,50}" title="Enter Your Name(use A-Z or a-z)" required>
              </div>
			  <div class="form-group">
				<label>Your Gender</label><br>
                <input type="radio" name="rdgender" id="rdgender" value="Male" required/> Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="rdgender" id="rdgender" value="Female" required/> Female
			  </div>
              <div class="form-group">
				<label>Enter your Addess</label>
                <textarea name="txtaddress" style="text-transform: capitalize;color:#fff !important;background-color:transparent !important;" class="form-control" placeholder="Your Addess" minlength="10" maxlength="100" pattern="[A-Za-z0-9\s]+{4,50}" title="Enter Address(use A-Z or a-z)" required></textarea>
              </div>
              <div class="form-group">
				<label>Select Your District</label>
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
				<label>Enter your Email</label>
                <input type="email" name="txtemail" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Your Email" minlength="4" maxlength="100" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="Enter Email" required>
              </div>
			  <div class="form-group">
				<label>Enter your Contact Number</label>
                <input type="tel" name="txtphno" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Your Contact Number" minlength="10" maxlength="10" pattern="[0-9]{10}" title="Enter PhoneNumber" required>
              </div>
              <div class="form-group">
				<label>Create your Username</label>
                <input type="text" name="txtusername" style="text-transform: lowercase;color:#fff !important;background-color:transparent !important;" class="form-control" placeholder="Your Username" minlength="4" maxlength="30" pattern="[A-Za-z0-9]{4,30}" title="Enter Username" required>
              </div>
			  <div class="form-group">
				<label>Create your Password</label>
                <input type="password" name="txtpassword" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Your Password" minlength="8" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              </div>
              <div class="form-group">
				<label>Confirm your Password</label>
                <input type="password" name="txtcpassword" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Confirm Your Password" minlength="8" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              </div>
			  <div class="form-group">
                <input type="submit" name="btnsubmit" value="Register" style="background-color: #eac15a08 !important;" class="btn btn-primary py-3 px-5" minlength="8" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
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
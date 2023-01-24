<?php
	require "header.php";
	
	session_start();
	if(isset($_POST['btnsubmit']))
	{
		if($_POST['txtpswd']==$_POST['txtcpswd'])
		{
			if($_SESSION['Fid']==2)
			{
				$sid=$_SESSION['Fuser'];
				$updateE="update tbl_station_reg set station_password='".$_POST['txtpswd']."' where station_reg_id='".$sid."'";
				mysqli_query($con,$updateE);
				session_destroy();
				echo "<script>alert('Your Password Changed Successfully')</script>";
				header('Location:login.php');
			}
			else if($_SESSION['Fid']==3)
			{
				$cid=$_SESSION['Fuser'];
				$updateC="update tbl_customer_reg set customer_password='".$_POST['txtpswd']."' where customer_id='".$cid."'";
				mysqli_query($con,$updateC);
				session_destroy();
				echo "<script>alert('Your Password Changed Successfully')</script>";
				header('Location:login.php');
			}
		}
		
		
		/*$selA="select * from tbl_admin where admin_username='".$_POST['name']."' and admin_password='".$_POST['password']."'";
		$rowA=mysql_query($selA,$con);
		$numA=mysql_num_rows($rowA);
		
		
		if($numA>0)
		{
			$dataA=mysqli_fetch_assoc($rowA);
			$_SESSION['ids']=1;
			$_SESSION['id']=$dataA['admin_id'];
			header("Location:Dashboard/index.php");
		}*/
		
		else{
			echo "<script>alert('Please Confirm your Password')</script>";
		}
	}
?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-5 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">New Password</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>New Password <i class="ion-ios-arrow-forward"></i></span></p>
			<form action="#" method="post" class="contact-form">
              <div class="form-group">
                <input type="password" name="txtpswd" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="New Password" minlength="8" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              </div>
              <div class="form-group">
                <input type="password" name="txtcpswd" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Retype New Password" minlength="8" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              </div>
			  <div class="form-group">
                <input type="submit" name="btnsubmit" value="SAVE" class="btn btn-primary py-3 px-5">
              </div>
            </form>
		  </div>
        </div>
      </div>
    </section>


    <section class="ftco-section services-section bg-light">
      <div class="container mt-0">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-4">We Provide Legal Help</h2>
          </div>
        </div>
        <div class="row no-gutters d-flex">
          <div class="col-md-3 text-center services align-self-stretch ftco-animate p-4">
            <div class="icon"><span class="flaticon-auction"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3"><a href="#">Get Your Legal Advice</a></h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
          <div class="col-md-3 text-center services align-self-stretch ftco-animate p-4">
            <div class="icon"><span class="flaticon-lawyer"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3"><a href="#">Work with Expert Lawyers</a></h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
          <div class="col-md-3 text-center services align-self-stretch ftco-animate p-4">
            <div class="icon"><span class="flaticon-money"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3"><a href="#">Have Great Discounted Rates</a></h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
          <div class="col-md-3 text-center services align-self-stretch ftco-animate p-4">
            <div class="icon"><span class="ion-ios-help-circle-outline"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3"><a href="#">Review Your Case Documents</a></h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
      </div>
    </section>


<?php
	require "footer.php";
?>
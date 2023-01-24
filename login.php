<?php
	require "header.php";
	
	if(isset($_POST['btnsubmit']))
	{
		
		$selA="select * from tbl_admin where admin_username='".strtolower($_POST['name'])."' and admin_password='".$_POST['password']."'";
		$rowA=mysqli_query($con,$selA);
		$numA=mysqli_num_rows($rowA);
		
		$selE="select * from  tbl_station_reg where station_username='".strtolower($_POST['name'])."' and station_password='".$_POST['password']."'";
		$rowE=mysqli_query($con,$selE);
		$numE=mysqli_num_rows($rowE);
		
		
		$selC="select * from  tbl_customer_reg where customer_username='".strtolower($_POST['name'])."' and customer_password='".$_POST['password']."'";
		$rowC=mysqli_query($con,$selC);
		$numC=mysqli_num_rows($rowC);
		
		if($numA>0)
		{
			$dataA=mysqli_fetch_assoc($rowA);
			$_SESSION['LoginId']=1;
			$_SESSION['Id']=$dataA['admin_id'];
			header("Location:Dashboard/Pages/Others/index.php");
		}
		else if($numE>0)
		{
			$dataA=mysqli_fetch_assoc($rowE);
			if($dataA['status']=='1')
			{
			    $_SESSION['LoginId']=2;
			    $_SESSION['Id']=$dataA['station_reg_id'];
			    header("Location:Dashboard/Pages/Others/index.php");
			}
			else
			{
				echo "<script>alert('Accout Is Not Activated...')</script>";
			}
		}
		else if($numC>0)
		{
			$dataA=mysqli_fetch_assoc($rowC);
			$_SESSION['LoginId']=3;
			$_SESSION['Id']=$dataA['customer_id'];
			header("Location:Dashboard/Pages/Others/index.php");
		}
		else{
			echo "<script>alert('Invalid Username or Password')</script>";
		}
	}
	
	if(isset($_POST['btnforgot']))
	{
		header("Location:Forgot.php");
		//$_SESSION['ForName']=$_POST['name'];
			//header("Location:Email.php");
	}
	
	if(isset($_POST['btnuser']))
	{
		header("Location:UserRegistration.php");
	}
?>


<script src="jQuery.js" type="text/javascript"></script>
<script>
function getReg()
	{
		$.ajax({
			url:"AjaxRegistration.php",
			success:function(result)
			{
				$("#list").html(result);
			}
			});
	}
</script>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-5 ftco-animate pb-5 text-center" style="margin-top: 100px;">
            <h1 class="mb-3 bread">Login</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Login <i class="ion-ios-arrow-forward"></i></span></p>
			<form action="#" method="post" class="contact-form">
              <div class="form-group">
                <input type="text" name="name" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Your Username" minlength="4" maxlength="30" style="text-transform: lowercase;" pattern="[A-Za-z0-9]{4,30}" title="Enter Username" required>
              </div>
              <div class="form-group">
                <input type="password" name="password" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Your Password" minlength="8" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              </div>
			  <div class="form-group">
                <input type="submit" name="btnsubmit" value="LOGIN" class="btn btn-primary py-3 px-5">
              </div>
			</form>
			<form action="#" method="post" class="contact-form">
              <div class="form-group">
                <a onclick="getReg()" style="cursor: pointer;color: #e9c05a;">No Account? Register Now!</a>
				<div id="list"></div>
              </div>
			  <div class="form-group">
                <button name="btnforgot" style="background-color: #eac15a08 !important;" class="btn btn-primary py-3 px-5">Forgot Password</button>
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
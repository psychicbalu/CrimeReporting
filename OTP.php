<?php
	require "header.php";
	session_start();
	if(isset($_POST['btnsubmit']))
	{
		echo "<script>alert('".$_SESSION['otp']."')</script>";
		if($_SESSION['otp']==$_POST['name'])
		{
			
			header("Location:NewPassword.php");
		}
		else{
			echo "<script>alert('Invalid OTP')</script>";
		}
	}
	
?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-5 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">ENTER OTP</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>OTP <i class="ion-ios-arrow-forward"></i></span></p>
			<form action="#" method="post" class="contact-form">
              <div class="form-group">
                <input type="text" name="name" style="color:#fff !important;background-color:transparent !important" class="form-control" placeholder="Your OTP" minlength="6" maxlength="6" pattern="[A-Za-z0-9]{6,6}" title="Enter OTP" required>
              </div>
              <div class="form-group">
                <input type="submit" name="btnsubmit" value="NEXT" class="btn btn-primary py-3 px-5">
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
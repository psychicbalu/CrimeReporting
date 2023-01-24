<?php
	require "header.php";
	
	if(isset($_POST['btnsubmit']))
	{
		/*$selA="select * from tbl_admin where admin_username='".$_SESSION['ForName']."' and admin_password='".$_POST['password']."'";
		$rowA=mysql_query($selA,$con);
		$numA=mysql_num_rows($rowA);*/
		
		$selE="select * from  tbl_station_reg where station_username='".$_SESSION['ForName']."' and station_email='".$_POST['name']."'";
		$rowE=mysqli_query($con,$selE);
		$numE=mysqli_num_rows($rowE);
		
		$selC="select * from  tbl_customer_reg where customer_username='".$_SESSION['ForName']."' and customer_email='".$_POST['name']."'";
		$rowC=mysqli_query($con,$selC);
		$numC=mysqli_num_rows($rowC);
		
		/*if($numA>0)
		{
			$dataA=mysqli_fetch_assoc($rowA);
			$_SESSION['LoginId']=1;
			$_SESSION['Id']=$dataA['admin_id'];
			header("Location:Dashboard/index.php");
		}*/
		if($numE>0)
		{
			$dataA=mysqli_fetch_assoc($rowE);
			$_SESSION['LoginId']=2;
			$_SESSION['Id']=$dataA['station_reg_id'];
			
			$_SESSION['uemail']=$_POST['name'];
			
			$name="CID";
			
			$rpswd=random_password();
			
			$_SESSION['otp']=$rpswd;
	
			$mailid=$_POST['name'];
			
			//echo $mailid;
			require("class.phpmailer.php");
			
			$mail = new PHPMailer();
			
			$mail->IsSMTP(); // set mailer to use SMTP
			$mail->SMTPAuth = true;     // turn on SMTP authentication
			$mail->SMTPSecure = "tls";
			
			$mail->Host = "smtp.gmail.com";  // specify main and backup server
			$mail->Port = 587;
			$mail->Username = "adaminiproject@gmail.com";  // SMTP username
			$mail->Password = "ashmi123"; // SMTP password
			
			$mail->From = "adaminiproject@gmail.com";
			$mail->FromName = "CID";
			$mail->AddAddress($mailid, $name);
			
			
			$mail->WordWrap = 50;// set word wrap to 50 characters
			$mail->IsHTML(true);// set email format to HTML
			
			$mail->Subject = "Your OTP";
			
			$mail->Body    = "Dear user, Your OTP is <b>".$rpswd."<b>";
			
			$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
			//echo $mail;
			//if(!$mail->Send())
			//{
			//   echo "Message could not be sent. <p>";
			//   echo "Mailer Error: " . $mail->ErrorInfo;
			//   exit;
			//}
			//else
			//if(!$mail->Send()) {
				//echo "Mailer Error: " . $mail->ErrorInfo;
			 //} else {
				//echo "<script>alert('Mail sended successfully')</script>";
			 //}
		 
			header("Location:OTP.php");
		}
		else if($numC>0)
		{
			$dataA=mysqli_fetch_assoc($rowC);
			$_SESSION['LoginId']=3;
			$_SESSION['Id']=$dataA['customer_id'];
			
			$_SESSION['uemail']=$_POST['name'];
			$name="CID";
			
			$rpswd=random_password();
			
			$_SESSION['otp']=$rpswd;
	
			$mailid=$_POST['name'];
			
			//echo $mailid;
			require("class.phpmailer.php");
			
			$mail = new PHPMailer();
			
			$mail->IsSMTP(); // set mailer to use SMTP
			$mail->SMTPAuth = true;     // turn on SMTP authentication
			$mail->SMTPSecure = "tls";
			
			$mail->Host = "smtp.gmail.com";  // specify main and backup server
			$mail->Port = 587;
			$mail->Username = "adaminiproject@gmail.com";  // SMTP username
			$mail->Password = "ashmi123"; // SMTP password
			
			$mail->From = "adaminiproject@gmail.com";
			$mail->FromName = "CID";
			$mail->AddAddress($mailid, $name);
			
			
			$mail->WordWrap = 50;// set word wrap to 50 characters
			$mail->IsHTML(true);// set email format to HTML
			
			$mail->Subject = "Your OTP";
			
			$mail->Body    = "Dear user, Your OTP is <b>".$rpswd."<b>";
			
			$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
			//echo $mail;
			//if(!$mail->Send())
			//{
			//   echo "Message could not be sent. <p>";
			//   echo "Mailer Error: " . $mail->ErrorInfo;
			//   exit;
			//}
			//else
			//if(!$mail->Send()) {
				//echo "Mailer Error: " . $mail->ErrorInfo;
			 //} else {
				//echo "<script>alert('Mail sended successfully')</script>";
			 //}
		 
			header("Location:OTP.php");
		}
		else{
			echo "<script>alert('Invalid Username or Password')</script>";
		}
	}
	
	
	function random_password( $length = 6 ) 
	{
		$chars = "ABCDEFGH0123456789";
		$password = substr( str_shuffle( $chars ), 0, $length );
		return $password;
	}
	
?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-5 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Login</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Login <i class="ion-ios-arrow-forward"></i></span></p>
			<form action="#" method="post" class="contact-form">
              <div class="form-group">
                <input type="text" name="name" style="background-color:transparent !important" class="form-control" placeholder="Your Username">
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
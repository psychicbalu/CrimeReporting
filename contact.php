<?php
	require "header.php";
	if(isset($_POST['btnsubmit']))
	{
		$insertQ="insert into tbl_contact_msg(msg_name,msg_email,msg_phno,msg_subject,msg_content) values('".strtoupper($_POST['txtname'])."','".$_POST['txtemail']."','".$_POST['txtnumber']."','".$_POST['txtsubject']."','".$_POST['txtmessage']."')";
		mysqli_query($con,$insertQ);
	}
?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Contact Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact Us <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

   	
    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span> <a href="#">Thiruvananthapuram, Kerala</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel://1234567920">+91 0000000000</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:info@yoursite.com">CrimeReporting@gmail.com</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website</span> <a href="#">www.CrimeReporting.com</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-lg-6 order-md-last d-flex">
            <form method="post" action="#" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text" name="txtname" class="form-control" placeholder="Your Name" minlength="4" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{4,50}" required>
              </div>
              <div class="form-group">
                <input type="email" name="txtemail" class="form-control" placeholder="Your Email" required>
              </div>
			  <div class="form-group">
                <input type="number" name="txtnumber" class="form-control" placeholder="Your Contact Number" minlength="10" maxlength="10" pattern="[0-9]{10}" required>
              </div>
              <div class="form-group">
                <input type="text" name="txtsubject" class="form-control" placeholder="Subject" minlength="4" maxlength="80" pattern="[A-Za-z0-9\s]+{4,80}" required>
              </div>
              <div class="form-group">
                <textarea name="txtmessage" id="" cols="30" rows="5" class="form-control" placeholder="Message" minlength="5" maxlength="500" pattern="[A-Za-z0-9\s]+{10,500}" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="btnsubmit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-lg-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>

<?php
	require "footer.php";
?>
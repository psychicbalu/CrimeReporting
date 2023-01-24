<?php
	require "header.php";
	if(isset($_POST['btnsubmit']))
	{
		$insertQ="insert into tbl_contact_msg(msg_name,msg_email,msg_phno,msg_subject,msg_content) values('".$_POST['txtname']."','".$_POST['txtemail']."','".$_POST['txtnumber']."','".$_POST['txtsubject']."','".$_POST['txtmessage']."')";
		mysqli_query($con,$insertQ);
	}
?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Practice Areas</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Practice Areas <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

   	
    <section class="ftco-section bg-light">
    	<div class="container">
        <div class="row d-flex justify-content-center">
        	<div class="col-md-4 col-lg-3 text-center">
        		<div class="practice-area bg-white ftco-animate p-4">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-family"></span>
        			</div>
        			<h3 class="mb-3"><a href="practice-single.html">Family Law</a></h3>
        			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        		</div>
        	</div>
        	<div class="col-md-4 col-lg-3 text-center">
        		<div class="practice-area bg-white ftco-animate p-4">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-auction"></span>
        			</div>
        			<h3 class="mb-3"><a href="practice-single.html">Business Law</a></h3>
        			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        		</div>
        	</div>
        	<div class="col-md-4 col-lg-3 text-center">
        		<div class="practice-area bg-white ftco-animate p-4">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-shield"></span>
        			</div>
        			<h3 class="mb-3"><a href="practice-single.html">Insurance Law</a></h3>
        			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        		</div>
        	</div>
        	<div class="col-md-4 col-lg-3 text-center">
        		<div class="practice-area bg-white ftco-animate p-4">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-handcuffs"></span>
        			</div>
        			<h3 class="mb-3"><a href="practice-single.html">Criminal Law</a></h3>
        			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        		</div>
        	</div>
        	<div class="col-md-4 col-lg-3 text-center">
        		<div class="practice-area bg-white ftco-animate p-4">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-house"></span>
        			</div>
        			<h3 class="mb-3"><a href="practice-single.html">Property Law</a></h3>
        			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        		</div>
        	</div>
        	<div class="col-md-4 col-lg-3 text-center">
        		<div class="practice-area bg-white ftco-animate p-4">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-employee"></span>
        			</div>
        			<h3 class="mb-3"><a href="practice-single.html">Employment Law</a></h3>
        			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        		</div>
        	</div>
        	<div class="col-md-4 col-lg-3 text-center">
        		<div class="practice-area bg-white ftco-animate p-4">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-fire"></span>
        			</div>
        			<h3 class="mb-3"><a href="practice-single.html">Fire Accident</a></h3>
        			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        		</div>
        	</div>
        	<div class="col-md-4 col-lg-3 text-center">
        		<div class="practice-area bg-white ftco-animate p-4">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-money"></span>
        			</div>
        			<h3 class="mb-3"><a href="practice-single.html">Financial Law</a></h3>
        			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        		</div>
        	</div>
        	<div class="col-md-4 col-lg-3 text-center">
        		<div class="practice-area bg-white ftco-animate p-4">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-medicine"></span>
        			</div>
        			<h3 class="mb-3"><a href="practice-single.html">Drug Offenses</a></h3>
        			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        		</div>
        	</div>
        	<div class="col-md-4 col-lg-3 text-center">
        		<div class="practice-area bg-white ftco-animate p-4">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-handcuffs"></span>
        			</div>
        			<h3 class="mb-3"><a href="practice-single.html">Sexual Offenses</a></h3>
        			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        		</div>
        	</div>
        </div>
    	</div>
    </section>

    <section class="ftco-consultation">
    	<div class="container-fluid">
    		<div class="row d-md-flex">
    			<div class="half order-md-last mt-md-0 d-flex justify-content-center align-items-center img" style="background-image: url(images/bg_1.jpg);">
    				<div class="overlay"></div>
    				<div class="desc text-center">
    					<div class="icon"><span class="flaticon-auction"></span></div>
    					<h1><a href="index.html">CrimeReporting <br><span>Law Firm Website</span></a></h1>
    				</div>
    			</div>
    			<div class="half p-3 p-md-5 ftco-animate">
    				<h3 class="mb-4 font-weight-bold">Free Consultation</h3>
    				<form method="post" action="#" class="bg-light p-5 contact-form">
					  <div class="form-group">
						<input type="text" name="txtname" class="form-control" placeholder="Your Name">
					  </div>
					  <div class="form-group">
						<input type="email" name="txtemail" class="form-control" placeholder="Your Email">
					  </div>
					  <div class="form-group">
						<input type="number" name="txtnumber" class="form-control" placeholder="Your Contact Number">
					  </div>
					  <div class="form-group">
						<input type="text" name="txtsubject" class="form-control" placeholder="Subject">
					  </div>
					  <div class="form-group">
						<textarea name="txtmessage" id="" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
					  </div>
					  <div class="form-group">
						<input type="submit" name="btnsubmit" value="Send Message" class="btn btn-primary py-3 px-5">
					  </div>
					</form>
    			</div>
    		</div>
    	</div>
    </section>


<?php
	require "footer.php";
?>
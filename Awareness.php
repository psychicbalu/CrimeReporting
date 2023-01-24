<?php
	require "header.php";
	
?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Awareness</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Awareness <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

   	
    <section class="ftco-section bg-light">
    	<div class="container-fluid">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Our Awareness</span>
            <h2 class="mb-4">Awareness</h2>
          </div>
        </div>
        <div class="row">
			<?php
			
				$delQ="select * from tbl_awareness order by awareness_id desc";
				$rows=mysqli_query($con,$delQ);
				while($datas=mysqli_fetch_assoc($rows))
				{
			?>
			<div class="col-lg-3 col-sm-6">
        		<div class="block-2 ftco-animate">
	            <div class="flipper">
	              <div class="front" style="background-image: url(/images/baground.jpg);">
	                <div class="box" style="top: 55px;
    text-align: center;">
	                  <h2 style="font-size: 30px;"><?php echo $datas['awareness_title'] ?></h2>
					  <br>
					  <p style="font-size: 30px;">&ldquo;<?php echo $datas['awareness_description'] ?>&rdquo;</p>
					  <br>
	                  <p style="font-size: 15px;"><?php echo $datas['awareness_date'] ?></p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                
	                <div class="author d-flex" style="top:20px;padding: 130px 15px 10px 20px;">
	                    <a href="Dashboard/Pages/Admin/Awareness/<?php echo $datas['awareness_file'] ?>" download><img src="Dashboard/Pages/Admin/Awareness/<?php echo $datas['awareness_file'] ?>" width="265px" height="150px" alt=""></a>
	                </div>
	              </div>
	            </div>
	          </div>
        	</div>
			<?php
				}
			
			?>
        </div>
    	</div>
    </section>


<?php
	require "footer.php";
?>
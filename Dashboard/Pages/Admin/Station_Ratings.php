<?php

	ob_start();
	require "../header.php";
	
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Station Rating  Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Station Rating Details</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
					<div class="col-lg-12">
					<?php
									
					   $selectQ="select * from tbl_rating C inner join tbl_customer_reg CR on C.customer_id=CR.customer_id inner join tbl_station_reg D on C.station_reg_id=D.station_reg_id inner join tbl_district DT on D.dist_id=DT.dist_id order by C.rating desc";
					   $row=mysqli_query($con,$selectQ);
					   while($data=mysqli_fetch_assoc($row))
					   {
					?>
									
						<div class="card">
							<div class="card-header">
								<h5><strong>Station : </strong> <?php echo $data['station_name']; ?></h5><br>
								<h4><strong>District : </strong> <?php echo $data['dist_name']; ?><h4>
							</div>
							<div class="card-body card-block">
								<div class="row form-group">
									<div class="col-12 col-md-12">
									<?php  
										
										for($i=0;$i<$data['rating'];$i++) 
										{
									?>
									<i class="fa fa-star" style="color: #ffc800;font-size: 2em;" aria-hidden="true"></i>
									<?php
										}
									?>
									
									
									</div>
								</div>
								<div class="row form-group">
									<div class="col-12 col-md-12"><strong>Customer Name : </strong><?php echo $data['customer_name']; ?></div>
								</div>
								<div class="row form-group">
									<div class="col-12 col-md-12"><strong>Feedback : </strong><?php echo $data['feedback']; ?></div>
								</div>
							</div>
						</div>
						
						<?php
						   }
						   
						?>
					</div>
				</div>
			</div><!-- .animated -->
		</div><!-- .content -->
		
	</div><!-- /#right-panel -->
			<!-- Right Panel -->

<?php
	require "../footer.php";
?>
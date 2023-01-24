<?php

	ob_start();
	require "../header.php";
	$sid=$_GET['sid'];
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Rating  Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">My Rating Details</a></li>
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
									
					   $selectQ="select * from tbl_rating C inner join tbl_customer_reg CR on C.customer_id=CR.customer_id inner join tbl_station_reg D on C.station_reg_id=D.station_reg_id where C.station_reg_id='".$sid."'";
					   $row=mysqli_query($con,$selectQ);
					   while($data=mysqli_fetch_assoc($row))
					   {
					?>
									
						<div class="card">
							<div class="card-header">
								<strong>Customer Name : </strong> <?php echo $data['customer_name']; ?>
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
									<div class="col-12 col-md-12"><strong>Feedback : </strong><?php echo $data['feedback']; ?></div>
								</div>
							</div>
						</div>
						
						<?php
						   }
						   
						?>
						<button onMouseOver="this.style.backgroundColor='#6c757e'" onMouseOut="this.style.backgroundColor='#000000'" onclick="history.back()" class="btn btn-primary btn-sm" style="background-color: #000000;border-color: #000000;width: 65px;">
						 <i class="fa fa-hand-o-left"></i> Back
						</button>
					</div>
				</div>
			</div><!-- .animated -->
		</div><!-- .content -->
		
	</div><!-- /#right-panel -->
			<!-- Right Panel -->

<?php
	require "../footer.php";
?>
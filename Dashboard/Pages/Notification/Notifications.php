<?php

	ob_start();
	require "../header.php";
	
   
?>
<style>
.page-title {
	
}
</style>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Notification  Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">My Notification</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div><button onMouseOver="this.style.backgroundColor='#6c757e'" onMouseOut="this.style.backgroundColor='#000000'" onclick="history.back()" class="btn btn-primary btn-sm" style="background-color: #000000;border-color: #000000;width: 65px;">
						 <i class="fa fa-hand-o-left"></i> Back
						</button>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
					<div class="col-lg-12">
					<?php
									
					   $selectQ="select * from tbl_notification where customer_id='".$_SESSION['Id']."' order by nid desc";
					   $row=mysqli_query($con,$selectQ);
					   $i=0;
					   while($data=mysqli_fetch_assoc($row))
					   {
						   if($i==20)
							   break;
					?>
									
						<div class="card">
							<div class="card-header">
								<strong><?php echo $data['n_title']; ?></strong> 
							</div>
							<div class="card-body card-block">
								<div class="row form-group">
									<div class="col-12 col-md-12"><?php echo $data['n_des']; ?></div>
								</div>
							</div>
						</div>
						
						<?php
						  $i++;
						   }
						   
						?>
					</div><button onMouseOver="this.style.backgroundColor='#6c757e'" onMouseOut="this.style.backgroundColor='#000000'" onclick="history.back()" class="btn btn-primary btn-sm" style="background-color: #000000;border-color: #000000;width: 65px;">
						 <i class="fa fa-hand-o-left"></i> Back
						</button>
				</div>
			</div><!-- .animated -->
		</div><!-- .content -->
		
	</div><!-- /#right-panel -->
			<!-- Right Panel -->

<?php
	require "../footer.php";
?>
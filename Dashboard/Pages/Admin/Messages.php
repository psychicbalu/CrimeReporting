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
                        <h1>Messages</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Messages</a></li>
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
									
					   $selectQ="select * from tbl_contact_msg order by msg_id desc";
					   $row=mysqli_query($con,$selectQ);
					   $i=0;
					   while($data=mysqli_fetch_assoc($row))
					   {
						   if($i==20)
							   break;
					?>
									
						<div class="card">
							<div class="card-header">
								<strong>Name: <?php echo $data['msg_name']; ?></strong> 
							</div>
							<div class="card-body card-block">
								<div class="row form-group">
									<div class="col-12 col-md-12"><strong>Subject: </strong><?php echo $data['msg_subject']; ?></div>
									<div class="col-12 col-md-12"><strong>Content: </strong><?php echo $data['msg_content']; ?></div>
									<div class="col-12 col-md-12"><strong>Email: </strong><?php echo $data['msg_email']; ?></div>
									<div class="col-12 col-md-12"><strong>Phno: </strong><?php echo $data['msg_phno']; ?></div>
								</div>
							</div>
						</div>
						
						<?php
						  $i++;
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
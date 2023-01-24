<?php

	ob_start();
	require "../header.php";
	
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pending Complaints</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pending Complaints</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body" style="overflow: auto;">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Station Id</th>
											<th>Station Name</th>
											<th>Pending Count</th>
											<th>Station Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											//$selQ="select * from tbl_complaints C inner join tbl_station_reg S on C.station_reg_id=S.station_reg_id  where C.complaint_status='Pending' group by C.station_reg_id order by count(C.complaints_id) desc";
											$selQ="select * from tbl_station_reg S inner join tbl_complaints C on S.station_reg_id=C.station_reg_id where C.complaint_status='Pending' group by S.station_reg_id order by count(complaints_id) desc";
											$row=mysqli_query($con,$selQ);
											while($data=mysqli_fetch_assoc($row))
											{
												?>
												<tr>
													 <td><?php echo $data['station_reg_id']; ?></td>
													 <td><?php echo $data['station_name']; ?></td>
												  
												<?php
												$sid=$data['station_reg_id'];
												$selC="select count(complaints_id) from tbl_complaints  where station_reg_id='".$data['station_reg_id']."' and complaint_status='Pending'";
												$rowC=mysqli_query($con,$selC);
												$dataC=mysqli_fetch_array($rowC);
												?>
												
												  <td><?php echo $dataC['0'] ?></td>
												 <td><a href="Station_View.php?sid=<?php echo $data['station_reg_id']; ?>"><i class="fa fa-eye" style="font-size: 20px;"></i> View</a></td>
												</tr>
												<?php
											}
											
											
											?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
		
	</div><!-- /#right-panel -->
			<!-- Right Panel -->

<?php
	require "../footer.php";
?>
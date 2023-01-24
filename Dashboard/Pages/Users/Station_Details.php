<?php
	require "../header.php";  
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Station</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Station</a></li>
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
                                            <th>No</th>
                                            <th>Station Name</th>
											<th>District</th>
											<th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$selQ="select * from tbl_station_reg C inner join tbl_district D on C.dist_id=D.dist_id where C.status='1'";
											$rowQ=mysqli_query($con,$selQ);
											$i=1;
											while($dataQ=mysqli_fetch_assoc($rowQ))
											{
												
												?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $dataQ['station_name']; ?></td>
													<td><?php echo $dataQ['dist_name']; ?></td>
													<td width="132"><a href="Station_View.php?sid=<?php echo $dataQ['station_reg_id']; ?>"><i class="fa fa-eye" style="font-size: 20px"></i></a></td>
												</tr>
												<?php
												$i++;
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
<?php
	require "../header.php";
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Officer</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Officer</a></li>
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
											<th>District</th>
                                            <th>Station</th>
											<th>Officer Name</th>
											<th>Designation</th>
											<th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$selQ="select * from  tbl_officer_reg o inner join tbl_station_reg s on o.station_reg_id=s.station_reg_id inner join tbl_district d on o.dist_id=d.dist_id inner join tbl_designation e on o.des_id=e.des_id order by d.dist_id";
											$rowQ=mysqli_query($con,$selQ);
											$i=1;
											while($dataQ=mysqli_fetch_assoc($rowQ))
											{
												
												?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $dataQ['dist_name']; ?></td>
													<td><?php echo $dataQ['station_name']; ?></td>
													<td><?php echo $dataQ['officer_name']; ?></td>
													<td><?php echo $dataQ['des_name']; ?></td>
													<td width="132"><a href="Officer_View.php?sid=<?php echo $dataQ['officer_reg_id']; ?>"><i class="fa fa-eye" style="font-size: 20px;"></i></a></td>
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
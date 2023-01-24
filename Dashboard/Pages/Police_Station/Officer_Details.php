<?php
	require "../header.php";
	
	$sid=$_GET['sid'];
	$selectQ="select * from tbl_station_reg C inner join tbl_district D on C.dist_id=D.dist_id where C.station_reg_id='".$sid."'";
	$row=mysqli_query($con,$selectQ);
	$data=mysqli_fetch_assoc($row);
   
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
											<th>Name</th>
											<th>Designation</th>
											<th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$selQ="select * from  tbl_officer_reg o inner join tbl_designation d on o.des_id=d.des_id where o.station_reg_id='".$sid."'";
											$rowQ=mysqli_query($con,$selQ);
											$i=1;
											while($dataQ=mysqli_fetch_assoc($rowQ))
											{
												
												?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $dataQ['officer_name']; ?></td>
													<td><?php echo $dataQ['des_name']; ?></td>
													<td width="132"><a href="Officer_View.php?sid=<?php echo $dataQ['officer_reg_id']; ?>"><i class="fa fa-eye" style="font-size: 20px"></i></a></td>
												</tr>
												<?php
												$i++;
											}
											
											
											?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
<?php

	ob_start();
	require "../header.php";
	$con=mysqli_connect("51.79.241.88","tkrp","Tkrpv2frankop","db_cid");
	$sid=$_SESSION['Id'];
	
   $viewid=isset($_GET['cid'])?$_GET['cid']:null;
   if($viewid)
   {
	   $_SESSION['viewid']=$viewid;
	   header("Location:Accepted_Complaint_View.php");
   }
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Accepted Complaints</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Accepted Complaints</a></li>
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
                                <strong class="card-title">Accepted Complaints</strong> Details
                            </div>
                            <div class="card-body" style="overflow: auto;">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Complaint Id</th>
											<th>Complaint Title</th>
											<th>Date</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$selQ="select * from tbl_complaints where station_reg_id='".$_SESSION['Id']."' and complaint_status='On Going'";
											//echo $selQ;
											$rowQ=mysqli_query($con,$selQ);
											$i=1;
											while($dataQ=mysqli_fetch_assoc($rowQ))
											{
												
												?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $dataQ['complaints_id']; ?></td>
													<td><?php echo $dataQ['complaint_title']; ?></td>
													<td><?php echo $dataQ['complaint_date']; ?></td>
													<td width="132"><a href="Accepted_Complaints.php?cid=<?php echo $dataQ['complaints_id']; ?>"><i class="fa fa-eye" style="font-size: 20px;"></i></a></td>
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
<?php

	ob_start();
	require "../header.php";
	
	$cid=$_SESSION['Id'];
	
  
  if(isset($_GET['did']))
   {
       $deleteid=$_GET['did'];
	   $sel="select * from tbl_complaints where complaints_id='".$deleteid."'";
	   $row=mysqli_query($con,$sel);
	   $data=mysqli_fetch_assoc($row);
	   $file=$data['complaint_proof'];
	   $delQ="delete from tbl_complaints where complaints_id='".$deleteid."'";
	   mysqli_query($con,$delQ);
	   unlink("images/".$file);
	   header("Location:MyComplaints.php");
   }
   if(isset($_GET['eid']))
   {
       $editid=$_GET['eid'];
	   $_SESSION['editid']=$editid;
	   header("Location:Complaints_Edit.php");
   }
   
   
   
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>My Complaints</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">My Complaints</a></li>
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
                                <strong class="card-title">My Complaints</strong> Details
                            </div>
                            <div class="card-body" style="overflow: auto;">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
											<th>Complaint Title</th>
											<th>Date</th>
											<th>Status</th>
											<th>Edit</th>
											<th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$selQ="select * from tbl_complaints where customer_id='".$_SESSION['Id']."'";
											//echo $selQ;
											$rowQ=mysqli_query($con,$selQ);
											$i=1;
											while($dataQ=mysqli_fetch_assoc($rowQ))
											{
												
												?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $dataQ['complaint_title']; ?></td>
													<td><?php echo $dataQ['complaint_date']; ?></td>
													<td><?php echo $dataQ['complaint_status']; ?></td>
													<td width="56"><a href="MyComplaints.php?eid=<?php echo $dataQ['complaints_id']; ?>"><i class="fa fa-edit" style="font-size: 20px;"></i></a></td>
													<td width="69"><a onclick="return confirm('Are You Sure?')" href="MyComplaints.php?did=<?php echo $dataQ['complaints_id']; ?>"><i class="fa fa-trash-o" style="font-size: 20px;"></i></a></td>
													
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
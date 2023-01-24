<?php
	ob_start();
	require "../header.php";
	
	//$aid=$_SESSION['admin_id'];
   $sid=$_GET['sid'];
   $selectQ="select * from tbl_station_reg C inner join tbl_district D on C.dist_id=D.dist_id where C.station_reg_id='".$sid."'";
   $row=mysqli_query($con,$selectQ);
   $data=mysqli_fetch_assoc($row);
   
   $selectR="select * from tbl_rating where station_reg_id='".$sid."'";
   $rowR=mysqli_query($con,$selectR);
   $tr=0;$i=0;
   while($dataR=mysqli_fetch_assoc($rowR))
   {
	   $tr=$tr+intval($dataR['rating']);
	   $i++;
   }
   if($tr)
   {
	   $r=round($tr/$i);
   }
   else
   {
	   $r=0;
   }

   if(isset($_POST['btndeactivate']))
   {
	   $updateQ="update tbl_station_reg set status='0' where station_reg_id='".$sid."'";
	   mysqli_query($con,$updateQ);
	   header('Location:Station_Details.php');
	   
   }
   if(isset($_POST['btndelete']))
   {
	   $delO="delete from tbl_officer_reg where station_reg_id='".$sid."'";
	   mysqli_query($con,$delO);
	   $delR="delete from tbl_rating where station_reg_id='".$sid."'";
	   mysqli_query($con,$delR);
	   
	   $selC="select * from tbl_complaints where station_reg_id='".$sid."'";
	   $rowC=mysqli_query($con,$selC);
	   while($dataC=mysqli_fetch_assoc($rowC))
	   {
		   $delA="delete from tbl_accused where complaints_id='".$dataC['complaints_id']."'";
		   mysqli_query($con,$delA);
		   $file=$dataC['complaint_proof'];
		   if($file)
			 {
				 unlink("../Users/images/".$file);
			 }
		   $delC="delete from tbl_complaints where complaints_id='".$dataC['complaints_id']."'";
		   mysqli_query($con,$delC);
	   }
	   
	   $selS="select * from tbl_station_reg where station_reg_id='".$sid."'";
	   $rowS=mysqli_query($con,$selS);
	   $dataS=mysqli_fetch_assoc($rowS);
	   $sfile=$dataS['station_proof'];
	   if($sfile)
			 {
				 unlink("../Police_Station/Stations/".$sfile);
			 }
	   $deleteQ="delete from tbl_station_reg where station_reg_id='".$sid."'";
	   mysqli_query($con,$deleteQ);
	   header('Location:Station_Details.php');
   }
   
   
?>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<style>
@import url(http://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);

* {
  margin: 0;
  padding: 0;
  font-family: roboto;
}

.cont {
  width: 93%;
  max-width: 350px;
  text-align: center;
  margin: 4% auto;
  padding: 30px 0;
  background: #111;
  color: #EEE;
  border-radius: 5px;
  border: thin solid #444;
  overflow: hidden;
}

hr {
  margin: 20px;
  border: none;
  border-bottom: thin solid rgba(255,255,255,.1);
}

div.title { font-size: 2em; }

h1 span {
  font-weight: 300;
  color: #Fd4;
}

div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
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
					<div class="col-lg-7">
						<div class="card">
							<div class="card-header">
								<strong>Station</strong> Details
							</div>
							<div class="card-body card-block">
								<div class="row form-group">
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">Station Name :</label></div>
									<div class="col-12 col-md-8"><?php echo $data['station_name']; ?></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">District :</label></div>
									<div class="col-12 col-md-8"><?php echo $data['dist_name']; ?></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">Address :</label></div>
									<div class="col-12 col-md-8"><?php echo $data['station_address']; ?></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">Phone Number :</label></div>
									<div class="col-12 col-md-8"><?php echo $data['station_phno']; ?></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">Email :</label></div>
									<div class="col-12 col-md-8"><?php echo $data['station_email']; ?></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">Website :</label></div>
									<div class="col-12 col-md-8">
									   <?php
										  if($data['station_website'])
										  {?>
									         <a href="<?php echo $data['station_website']; ?>" target="_blank"><i class="fa fa-external-link" style="color: blue;font-size: 18px;"></i> <?php echo $data['station_website']; ?></a>
										     
											 <?php
										  }
										  else
										  {
											  echo "<b style='color: red;'>NA</b>";
										  }
										?>
									</div>
								</div>
								<!--<div class="row form-group">
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">Proof :</label></div>
									<div class="col-12 col-md-8">
									    <?php
										  $dbimg=$data['station_proof'];
										  $dname="CID-StationName-".$data['station_name']."-".$data['station_reg_id'];
										?>
										  <a href="../Police_Station/Stations/<?php echo $dbimg; ?>" download="<?php echo $dname; ?>">
										    <img src="../Police_Station/Stations/<?php echo $data['station_proof'];?>" width="150px" height="100px"/>&nbsp;
											<i class="fa fa-download" style="font-size: 20px;"></i>
										  </a>
									</div>
								</div>-->
							</div>
						</div>
						<div class="row form-group">
										<div class="col col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Officer_Details.php?sid=<?php echo $sid; ?>"><i class="fa fa-address-book-o" style="color: black;font-size: 20px;"></i> Officer Details</a></div>
						</div>
						<button onMouseOver="this.style.backgroundColor='#6c757e'" onMouseOut="this.style.backgroundColor='#000000'" onclick="history.back()" class="btn btn-primary btn-sm" style="background-color: #000000;border-color: #000000;width: 65px;">
						 <i class="fa fa-hand-o-left"></i> Back
						</button>
					</div>
					<div class="col-lg-5">
						<div class="card">
							<div class="card-header">
								<strong>Ratings</strong> Details
							</div>
							<div class="card-body card-block">
							Average Rating
								<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-12"><div class="stars">
											  <input class="star star-5" id="star-5" value="5" type="radio" name="star[]" <?php if($r==5){echo "checked";}?>/>
											  <label class="star star-5" for="star-5"></label>
											  <input class="star star-4" id="star-4" value="4" type="radio" name="star[]" <?php if($r==4){echo "checked";} ?>/>
											  <label class="star star-4" for="star-4"></label>
											  <input class="star star-3" id="star-3" value="3" type="radio" name="star[]" <?php if($r==3){echo "checked";} ?>/>
											  <label class="star star-3" for="star-3"></label>
											  <input class="star star-2" id="star-2" value="2" type="radio" name="star[]" <?php if($r==2){echo "checked";} ?>/>
											  <label class="star star-2" for="star-2"></label>
											  <input class="star star-1" id="star-1" value="1" type="radio" name="star[]" <?php if($r==1){echo "checked";} ?>/>
											  <label class="star star-1" for="star-1"></label>
										  </div>
										</div>
									</div>
									<div class="card-footer">
									<?php
										$selRA="select * from tbl_rating where station_reg_id='".$sid."'";
										$rowRA=mysqli_query($con,$selRA);
										$numRA=mysqli_num_rows($rowRA);
										?>
										<a <?php if($numRA>0){ ?>href="OtherRatings.php?sid=<?php echo $sid; ?>"<?php } else{ ?>href="#"<?php } ?> class="btn btn-primary btn-sm">
											<?php if($numRA>0)
											  { 
										    ?>
											<i class="fa fa-eye"></i> View
											<?php
											} 
											else{ 
                                            ?>
											<i class="fa fa-eye-slash"></i> View
											<?php
											} ?>
										</a>
										
									</div>
									
								
							</div>
						</div>
						<center>
						  <button onclick="return confirm('Are You Sure?')" name="btndeactivate" class="btn btn-danger btn-sm" style="width: 150px;background-color: #5c587e;" title="Temporarly Deactivate Acoount">
							  <i class="fa fa-ban"></i> Deactivate
						  </button>
						  <button onclick="return confirm('Are You Sure?')" name="btndelete" class="btn btn-danger btn-sm" style="width: 150px;background-color: #ae2b38;" title="Permanantly Delete Acoount">
							  <i class="fa fa-trash-o"></i> Delete Station
						  </button>
						</center>
					</form>					
					</div>
				</div>
			</div><!-- .animated -->
		</div><!-- .content -->
		
	</div><!-- /#right-panel -->
			<!-- Right Panel -->

<?php
	require "../footer.php";
?>
<?php
	
	$con=mysqli_connect("51.79.241.88","tkrp","Tkrpv2frankop","db_cid");
	session_start();
	if(!$_SESSION['Id'])
	{
		header("Location:../../../login.php");
    }
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CrimeReporting</title>
    <meta name="description" content="CID">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="../../images/CID2.png">

    <link rel="stylesheet" href="../../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../vendors/jqvmap/dist/jqvmap.min.css">
	<link rel="stylesheet" href="../../vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">


    <link rel="stylesheet" href="../../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<script src="../Notification/jQuery.js" type="text/javascript"></script>
<script>
function viewcom(n)
{
	$.ajax({
			url:"../Notification/AjaxNotification.php",
			data:{nid:n},
			success:function(result)
			{
				$("#container1").html(result);
			}
			});
}
</script>
</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="../Others/index.php"><img src="../../images/CID2.png" width="50%" height="50%"  alt="CID"></a>
                <a class="navbar-brand hidden" href="./"><img src="../../images/CID2.png" width="100%" height="100%"  alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="../Others/index.php"> <i class="menu-icon  fa fa-home" aria-hidden="true"></i>Home </a>
                    </li>
					<?php
					if($_SESSION['LoginId']==1)
					{
					?>
					<?php
                        $selPC="select count(station_reg_id) from tbl_station_reg where status='0'";
  						$rowPC=mysqli_query($con,$selPC);
						$dataPC=mysqli_fetch_array($rowPC);
					?>
					<li>
                        <a href="../Admin/StationRegistration.php"> 
						    <i class="menu-icon fa fa-hourglass-end"></i>Station Registration </a>
                    </li>
					<li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th-large"></i>Masters</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-graduation-cap"></i><a href="../Admin/Designation.php">Designation</a></li>
                            <li><i class="fa fa-location-arrow"></i><a href="../Admin/District.php">District</a></li>
                        </ul>
                    </li>
					<li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-info"></i>Details</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-university"></i><a href="../Admin/Station_Details.php">Station</a></li>
                            <li><i class="fa fa-users"></i><a href="../Admin/AllOfficerDetails.php">Officers</a></li>
                        </ul>
                    </li>
					<li>
                        <a href="../Admin/Pending_Complaints.php"> <i class="menu-icon fa fa-clock-o"></i>Pending Complaints </a>
                    </li>
					<li>
                        <a href="../Admin/Awareness.php"> <i class="menu-icon fa fa-universal-access"></i>Awareness </a>
                    </li>
					<li>
                        <a href="../Admin/Station_Ratings.php"> <i class="menu-icon fa fa-star"></i>Station Ratings </a>
                    </li>
					<li>
                        <a href="../Admin/Messages.php"> <i class="menu-icon fa fa-envelope-open-o"></i>Messages </a>
                    </li>
					<?php					
					}
					if($_SESSION['LoginId']==2)
					{
					?>
					<?php
                        $selCC="select * from tbl_complaints where station_reg_id='".$_SESSION['Id']."' and complaint_status='Pending'";
  						$rowCC=mysqli_query($con,$selCC);
						$dataCC=mysqli_num_rows($rowCC);
						$selAC="select * from tbl_complaints where station_reg_id='".$_SESSION['Id']."' and complaint_status='On Going'";
  						$rowAC=mysqli_query($con,$selAC);
						$dataAC=mysqli_num_rows($rowAC);
						$selRC="select * from tbl_rating where station_reg_id='".$_SESSION['Id']."'";
  						$rowRC=mysqli_query($con,$selRC);
						$dataRC=mysqli_num_rows($rowRC);
					?>
					<li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-info"></i>Complaints</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-circle-o-notch"></i><a href="../Police_Station/Complaints.php">Pending Complaints<?php if($dataCC){echo " - ".$dataCC;} ?></a></li>
							<li><i class="fa fa-check"></i><a href="../Police_Station/Accepted_Complaints.php">Accepted Complaints<?php if($dataAC){echo " - ".$dataAC;} ?></a></li>
                            <li><i class="fa fa-times"></i><a href="../Police_Station/Rejected_Complaints.php">Rejected Complaints</a></li>
							<li><i class="fa fa-check-circle"></i><a href="../Police_Station/Completed_Complaints.php">Completed Complaints</a></li>
							
                        </ul>
                    </li>
					<li>
                        <a href="../Police_Station/Officer_Reg.php"> <i class="menu-icon fa fa-users"></i>Officer Registration </a>
                    </li>
					<li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-info"></i>Details</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-university"></i><a href="../Police_Station/Station_Details.php">Station</a></li>
                            <li><i class="fa fa-users"></i><a href="../Police_Station/AllOfficerDetails.php">Officers</a></li>
                        </ul>
                    </li>
					<li>
                        <a <?php if($dataRC){ ?> href="../Police_Station/MyRatings.php"<?php } else{ ?>href=""<?php } ?>> <i class="menu-icon fa fa-star"></i>Ratings<?php if($dataRC==0){echo " - ".$dataRC;} ?></a>
                    </li>
					<?php					
					}
					if($_SESSION['LoginId']==3)
					{
					?>
					<li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-info"></i>Complaints</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-bullseye"></i><a href="../Users/Complaints.php">Post Complaints</a></li>
							<li><i class="fa fa-dot-circle-o"></i><a href="../Users/MyComplaints.php">My Complaints</a></li>
                        </ul>
                    </li>
					<li>
                        <a href="../Users/Station_Details.php"> <i class="menu-icon fa fa-dashboard"></i>Station Details </a>
                    </li>
					<?php					
					}
					?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <div class="form-inline">
                            <form class="search-form">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
				    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../../images/admin.jpg" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu" style="min-width: 180px;">
						    <?php
							if($_SESSION['LoginId']==1)
							{
							?>
                            <a class="nav-link" href="../Admin/Admin_Password_Change.php"><i class="fa fa-key"></i> Change Password</a>
							<?php
							}
							?>
							
							<?php
							if($_SESSION['LoginId']==2)
							{
							?>
                            <a class="nav-link" href="../Police_Station/Station_Profile.php"><i class="fa fa-user"></i> My Profile</a>
							
                            <a class="nav-link" href="../Police_Station/Station_Password_Change.php"><i class="fa fa-key"></i> Change Password</a>
							<?php
							}
							?>
							
							<?php
							if($_SESSION['LoginId']==3)
							{
							?>
                            <a class="nav-link" href="../Users/Customer_Profile.php"><i class="fa fa-user"></i> My Profile</a>
							
                            <a class="nav-link" href="../Users/Customer_Password_Change.php"><i class="fa fa-key"></i> Change Password</a>
							<?php
							}
							?>

                            <a class="nav-link"  href="#"  data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
					
					<style>
					  .notiN{
						  font-size: 20px;
						  padding: 10px 10px 10px 10px;
					  }
					  .notiY{
						  font-size: 20px;
						  padding: 10px 10px 10px 10px;
						  color: #ff3e3e;
						  animation: blink 1.3s ease 10;
					  }
					  .notiY:active,.notiY:hover{
						  color: #e13434;
						  animation-play-state: paused;
					  }
					  .notiY:visited{
						  animation-play-state: paused;
					  }
					  @keyframes blink {
						  0%{color: #000000;}
						  50%{color: #ff3e3e;}
						  100%{color: #ff3e3e;}
					  }
					  .notiH {
						  
					  }
					  /*::-webkit-scrollbar {
                        width: 5px;
                      }
					  ::-webkit-scrollbar:hover {
                        width: 10px;
                      }
					  ::-webkit-scrollbar-track {
                         background: #f1f1f1;
                      }
					  ::-webkit-scrollbar-track {
                         background: #f1f1f1;
                      }
                      ::-webkit-scrollbar-thumb {
                          background: #888;
                      }
                      ::-webkit-scrollbar-thumb:hover {
                          background: white;
                      }
					  */
					  
					  
					  
					  
					  
					  
					  
					  


/* Center the image and position the close button */
.imgcontainer1 {
    text-align: center;
    margin: 15px 15px 15px 15px;
	padding-top: 10px;
	padding-bottom: 10px;
    position: relative;
	background-color:#f1f1f1;
}

img.avatar1 {
    width: 16%;
    border-radius: 50%;
}

.container1 {
    padding-left: 80px;
    padding-right: 80px;
    padding-top:10px;
    padding-bottom:10px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal1 {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    
    
}

/* Modal Content/Box */
.modal-content1 {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
	margin-left: 500px;
    border: 1px solid #888;
	right: 0;
    width: 800px;
	height: 600px;
}

/* The Close Button (x) */
.close1 {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close1:hover,
.close1:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate1 {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

.ntitle {
	padding: 10px 5px 5px 5px;
	background-color: #3a1d55;
	width: 200px;
	height: 50px;
	border: 1px solid;
	text-align: center;
	color: white;
}
.ntitle2 {
	padding: 10px 5px 5px 5px;
	background-color: #beb3b3;
	width: 200px;
	height: 50px;
	border: 1px solid;
	text-align: center;
	color: white;
}
.ddown {
	width: 450px;
	min-height: 60px;
	margin-left: 205px;
	margin-right: 200px;
	border: 1px solid;
	margin-top: -1px;
	text-align: center;
}
.mnoti {
	color: red;
	float: right;
	margin-right: 20px;
	margin-top: 30px;
}

					  
					  
					</style>
					<?php
					  if($_SESSION['LoginId']==3)
					   {
						   $selNC="select * from tbl_notification where customer_id='".$_SESSION['Id']."' order by nid desc";
						   $rowNC=mysqli_query($con,$selNC);
						   $dataNC=mysqli_fetch_assoc($rowNC);
						   if($dataNC['status']=='0')
						   {
							    $numN=1;
						   }
						   else
						   {
							    $numN=0;
						   }
					?>
                        <a href="#" onclick="document.getElementById('id01').style.display='block'" class="float-right">
                            <?php if($numN){ ?><i class="notiY fa fa-bell-o"></i><?php } else{ ?><i class="notiN fa fa-bell-slash-o"></i><?php } ?>
                        </a>
                        
						<div id="id01" class="modal1">
  
						    <div class="modal-content1 animate1">
							    <div class="imgcontainer1">
							        <span onclick="document.getElementById('id01').style.display='none'" class="close1" title="Close Modal">&times;</span>
							        <i class="fa fa-bell" style="font-size: 50px;">NOTIFICATIONS</i>
							    </div>

							    <div class="container1" id="container1">
									<?php
									  $selN="select * from tbl_notification where customer_id='".$_SESSION['Id']."' order by nid desc";
						              $rowN=mysqli_query($con,$selN);
									  $i=1;
							          while($dataN=mysqli_fetch_assoc($rowN))
								   	  {
										if($i<=8)
										{
									?>
									    
										
										<div class="dropdown">
											<a href="#" <?php if($dataN['status']=='0'){ ?> onclick="viewcom(<?php echo $dataN['nid']; ?>);"<?php } ?> data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<div <?php if(!$dataN['status']){ ?>class="ntitle"<?php } else { ?>class="ntitle2"<?php } ?> ><?php echo $dataN['n_title']; ?></div>
											</a>
											<div class="dropdown-menu ddown" style="min-width: 180px;">
												<?php echo $dataN['n_des']; ?>
												
											</div>
									    </div>
										
										
									<?php
										}
										else{
											break;
										}
									  $i++;
									  }
									?>
							    </div>
								<a class="mnoti"href="../Notification/Notifications.php"><b><u>More Notifications</u></b></a>
						    </div>
						</div>


					<?php
					  $i++;
						}
					?>
                </div>
            </div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
        </header><!-- /header -->
        <!-- Header-->
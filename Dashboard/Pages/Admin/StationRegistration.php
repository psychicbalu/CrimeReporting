<?php

ob_start();
require "../header.php";

$sid = $_SESSION['Id'];
$con = mysqli_connect("localhost", "root", "", "db_cid");

$selectQ = "select * from tbl_station_reg where station_reg_id='" . $sid . "'";
$row = mysqli_query($con, $selectQ);
$data = mysqli_fetch_assoc($row);
$deleteid = isset($_GET['did']) ? $_GET['did'] : null;
if ($deleteid) {
    $delQ = "delete from tbl_officer_reg where officer_reg_id='" . $deleteid . "'";
    mysqli_query($con, $delQ);
    header("Location:Officer_Reg.php");
}
if (isset($_POST['btnsubmit'])) {
    $sname = strtoupper($_POST['txtname']);
    $saddress = ucwords($_POST['txtaddress']);
    $semail = $_POST['txtemail'];
    $sphno = $_POST['txtphno'];
    $dist_id = $_POST['seldistrict'];
    $susername = strtolower($_POST['txtusername']);
    $spassword = $_POST['txtpassword'];
    $date = date('Y-m-d');
    $swebsite = $_POST['txtwebsite'];

    $insertQ="insert into tbl_station_reg(station_name,station_address,dist_id,station_email,station_phno,station_website,station_username,station_password,station_reg_date,status) values('".$sname."','".$saddress."','".$dist_id."','".$semail."','".$sphno."','".$swebsite."','".$susername."','".$spassword."','".$date."','1')";
	mysqli_query($con,$insertQ);

    header("Location:StationRegistration.php");
}

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Officer Registration</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Officer Registration</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Officer</strong> Details
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Station Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtname" class="form-control" minlength="4" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{4,50}" title="Enter Name(use A-Z or a-z)" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
                                <div class="col-12 col-md-9"><textarea id="text-input" name="txtaddress" cols="45" rows="5" class="form-control" minlength="10" maxlength="100" style="text-transform: capitalize;" pattern="[A-Za-z0-9\s]+{4,50}" title="Enter Address" required></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">District</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="seldistrict" id="seldistrict" class="form-control" required>
                                        <option value="">----select---</option>
                                        <?php
                                        $selQ = "select * from tbl_district";
                                        $row = mysqli_query($con, $selQ);
                                        while ($data = mysqli_fetch_assoc($row)) {
                                        ?>
                                            <option value="<?php echo $data['dist_id']; ?>" style="color:#000 !important;"><?php echo $data['dist_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9"><input type="email" id="text-input" name="txtemail" class="form-control" minlength="4" maxlength="100" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="Enter Email" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Contact Number</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtphno" class="form-control" minlength="10" maxlength="10" pattern="[0-9]{10}" title="Enter PhoneNumber" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Website</label></div>
                                <div class="col-12 col-md-9"><input type="text" minlength="4" maxlength="100" id="text-input" name="txtwebsite" class="form-control" title="Enter PhoneNumber"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtusername" class="form-control" minlength="4" maxlength="30" pattern="[A-Za-z0-9]{4,30}" title="Enter username" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                                <div class="col-12 col-md-9"><input type="password" id="text-input" name="txtpassword" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="btnsubmit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> SAVE
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="content mt-3">
                    <div class="animated fadeIn">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Station Table</strong>
                                    </div>
                                    <div class="card-body" style="overflow: auto;">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Station Name</th>
                                                    <th>Address</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $selQ = "select * from tbl_station_reg ";
                                                $row = mysqli_query($con, $selQ);
                                                $i = 1;
                                                while ($data = mysqli_fetch_assoc($row)) {

                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $data['station_name']; ?></td>
                                                        <td><?php echo $data['station_address']; ?></td>
                                                        <td><a href="StationEdit.php?sid=<?php echo $data['station_reg_id']; ?>"><i class="fa fa-edit" style="font-size: 20px;"></i></a></td>
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


        </div>
    </div>
</div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->
<!-- Right Panel -->



<?php
require "../footer.php";
?>
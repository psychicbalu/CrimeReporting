<?php

ob_start();
require "../header.php";

$editid = isset($_GET['sid']) ? $_GET['sid'] : null;
if ($editid) {
    $selectQ = "select * from tbl_station_reg where station_reg_id='" . $editid . "'";
    $row = mysqli_query($con, $selectQ);
    $data = mysqli_fetch_assoc($row);
}
else{
    header("Location:StationRegistration.ph");
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

    $insertQ = "update tbl_station_reg set station_name='" . $sname . "',station_address='" . $saddress . "' ,dist_id='" . $dist_id . "',station_email='" . $semail . "',station_phno='" . $sphno . "',station_website='" . $swebsite . "',station_username='" . $susername . "',station_password='" . $spassword . "',station_reg_date='" . $date . "',status='1' where station_reg_id='" . $editid . "'";
    mysqli_query($con, $insertQ);

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
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtname" class="form-control" minlength="4" maxlength="50" style="text-transform: uppercase;" pattern="[A-Za-z\s]{4,50}" title="Enter Name(use A-Z or a-z)" required value="<?= isset($data['station_name'])?$data['station_name']:null;?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
                                <div class="col-12 col-md-9"><textarea id="text-input" name="txtaddress" cols="45" rows="5" class="form-control" minlength="10" maxlength="100" style="text-transform: capitalize;" pattern="[A-Za-z0-9\s]+{4,50}" title="Enter Address" required><?= isset($data['station_address'])?$data['station_address']:null;?></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">District</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="seldistrict" id="seldistrict" class="form-control" required>
                                        <option value="">----select---</option>
                                        <?php
                                        $selQ = "select * from tbl_district";
                                        $row = mysqli_query($con, $selQ);
                                        while ($datad = mysqli_fetch_assoc($row)) {
                                        ?>
                                            <option value="<?php echo $datad['dist_id']; ?>" style="color:#000 !important;" <?php if($data['dist_id']==$datad['dist_id']) echo 'selected';?>><?php echo $datad['dist_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9"><input type="email" id="text-input" name="txtemail" class="form-control" minlength="4" maxlength="100" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="Enter Email" required value="<?= isset($data['station_email'])?$data['station_email']:null;?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Contact Number</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtphno" class="form-control" minlength="10" maxlength="10" pattern="[0-9]{10}" title="Enter PhoneNumber" required value="<?= isset($data['station_phno'])?$data['station_phno']:null;?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Website</label></div>
                                <div class="col-12 col-md-9"><input type="text" minlength="4" maxlength="100" id="text-input" name="txtwebsite" class="form-control" title="Enter Url" value="<?= isset($data['station_website'])?$data['station_website']:null;?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtusername" class="form-control" minlength="4" maxlength="30" pattern="[A-Za-z0-9]{4,30}" title="Enter username" required value="<?= isset($data['station_username'])?$data['station_username']:null;?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                                <div class="col-12 col-md-9"><input type="password" id="text-input" name="txtpassword" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="<?= isset($data['station_password'])?$data['station_password']:null;?>" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="btnsubmit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


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
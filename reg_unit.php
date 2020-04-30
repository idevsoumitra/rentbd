<?php
    // include 'database.php';
    $server="localhost";
	$user="root";
	$passcode="";
	$myDB = "rent_bd";

	$link = mysqli_connect($server, $user, $passcode, $myDB);

    $message="";
    if(isset($_REQUEST['submit'])){
        $u_head= $_REQUEST['ut_heading'];
        $u_ads= $_REQUEST['ut_address'];
        $u_city= $_REQUEST['ut_city'];
        $u_type= $_REQUEST['ut_type'];
        $u_bedrooms= $_REQUEST['ut_bedrooms'];
        $u_bathrooms= $_REQUEST['ut_bathrooms'];
        $u_balcony= $_REQUEST['ut_balcony'];
        $u_floor_no= $_REQUEST['ut_floor_number'];
        $u_avail_date=$_REQUEST['ut_available_data'];
        $u_hold_no=$_REQUEST['ut_holding_number'];
        $u_description=$_REQUEST['ut_description'];
        $u_price=$_REQUEST['ut_price'];
        
        if($u_head!='' && $u_ads!='' && $u_city!='' && $u_type!=''){
            if(isset($_FILES['ut_bannar_pic'])){
                $type=$_FILES['ut_bannar_pic']['type'];
                
                if($type == 'image/jpeg'){
					$tp = '.jpeg';
				}
				else if($type == 'image/jpg'){
					$tp = '.jpg';
				}
				else if($type == 'image/png'){
					$tp = '.png';
				}
				else if($type == 'image/gif'){
					$tp = '.gif';
				}
				else{
					$tp = '';
				}
            }
            $status='Active';
            $date=date('Y-m-d H:i:s',time());
            
            $sql_for_unit= "INSERT INTO `unit_info`(`unit_heading`,`unit_address`,`unit_city_id`,`unit_type_num`,`unit_bedrooms`,`unit_bathrooms`,
            `unit_balcony`,`date_of_posting`,`date_available_from`,`is_active`,`unit_description`,
            `unit_holding_no`,`unit_floor_no`,`unit_price`,`unit_bannar`) VALUES('".$u_head."','".$u_ads."','".$u_city."','".$u_type."',
            '".$u_bedrooms."','".$u_bathrooms."','".$u_balcony."','".$date."','".$u_avail_date."','".$status."','".$u_description."',
            '".$u_hold_no."','".$u_floor_no."','".$u_price."','".$tp."')";
            // WHERE `unit_info`.`unit_city_id`=`unit_city`.`city_id`
            // AND `unit_info`.`unit_type_num`=`unit_type`.`unit_type_id`

            //mysqli_query($link,$sql_for_create);
            mysqli_query($link,$sql_for_unit);
            $unit_id=mysqli_insert_id($link);
            if(isset($_FILES['ut_bannar_pic'])){
                move_uploaded_file($_FILES['ut_bannar_pic']['tmp_name'],'unit_bannar_images/'.$unit_id.$tp);
            }
            echo 'Successfully Created';
        }
        else{
            echo 'Failed';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>RentBD.com</title>

    <!---Bootstrap link-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="style/reg_unit_style.css" rel="stylesheet" media="all">
    <!--ICON-->
    <link rel="icon" href="images/rent_logo.png" type="image/png"width="5px" height="2px" >
</head>

<body>
    <?php include 'header.php';?>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Add Your Unit</h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <label class="label">Unit Heading</label>
                                    <input class="input--style-4" type="text" name="ut_heading">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <label class="label">Unit Address</label>
                                    <input class="input--style-4" type="text" name="ut_address">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Unit City</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <div class="col-sm-12">
                                    <select name="ut_city">
                                        <option disabled="disabled" selected="selected">Choose option</option>
                                        <?php
                                            $res="";
                                            $sql_for_unit_city= "SELECT * FROM `unit_city`";
                                            $res= mysqli_query($link,$sql_for_unit_city);
                                            while($row=mysqli_fetch_array($res)){?>
                                                <!-- echo '<option>'.$row['city_name'].'</option>'; -->
                                                <option value='<?php echo $row["city_id"];?>'> <?php echo $row['city_name']; ?>
                                                </option><?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Unit Type</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="ut_type">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <?php
                                        $res="";
                                        $sql_for_unit_type= "SELECT * FROM `unit_type`";
                                        $res= mysqli_query($link,$sql_for_unit_type);
                                        while($row=mysqli_fetch_array($res)){?>
                                        <option value='<?php echo $row['unit_type_id'];?>'><?php echo $row['unit_type_name'];?></option><?php
                                            // echo '<option>'.$row['unit_type_name'].'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <label class="label">Number Of Bedrooms</label>
                                    <input class="input--style-4" name="ut_bedrooms" type="number" min="1" step="1" oninput="validity.valid||(value='');" name="unit_bedrooms">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <label class="label">Number of Bathrooms </label>
                                    <input class="input--style-4" type="number" name="ut_bathrooms" min="1" step="1" oninput="validity.valid||(value='');" name="unit_bathrooms">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <label class="label">Number Of Balcony</label>
                                    <input class="input--style-4" type="number"name="ut_balcony" min="1" step="1" oninput="validity.valid||(value='');" name="unit_balcony">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <label class="label">Unit Floor Number </label>
                                    <input class="input--style-4" type="number"name="ut_floor_number" min="1" step="1" oninput="validity.valid||(value='');" name="unit_floor_number">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <label class="label">Date Available from</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="ut_available_data">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <label class="label">Unit Holding Number</label>
                                    <input class="input--style-4" value="" type="text" name="ut_holding_number">
                                </div>
                            </div> 
                        </div>
                        <div class="row row-space">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <label class="label">Unit Price</label>
                                    <input class="input--style-4" value="" type="text" name="ut_price">
                                </div>
                            </div> 
                        </div>
                        <div class="input-group">
                            <label class="label">Description</label>
                            <input class="input--style-textfield" value="" type="textarea" name="ut_description">
                        </div>
                        <div class="input-group">
                            <label class="label">Bannner Image</label>
                            <input class="input_file" type="file" name="ut_bannar_pic"> 
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name='submit'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
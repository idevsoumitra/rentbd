<?php
    include 'database.php';

    $message="";
    if(isset($_REQUEST['submit'])){
        $f_name= $_REQUEST['u_first_name'];
        $l_name= $_REQUEST['u_last_name'];
        $ads= $_REQUEST['u_address'];
        $mail= $_REQUEST['u_email'];
        $cont= $_REQUEST['u_contact'];
        $pass= $_REQUEST['u_password'];
        $conf_pass= $_REQUEST['u_conf_password'];

        if($f_name!='' && $ads!='' && $mail!='' && $pass!='' && $conf_pass!=''){
            if(isset($_FILES['u_pro_pic'])){
                $type=$_FILES['u_pro_pic']['type'];

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
            $sql_for_create= "INSERT INTO `user_info`(`user_first_name`,`user_last_name`,
            `user_address`,`user_contact`,`user_email`,`user_pass`,`user_conf_pass`,`user_image`)
            VALUES('".$f_name."','".$l_name."','".$ads."','".$cont."','".$mail."', '".$pass."',
            '".$conf_pass."','".$tp."')";

            mysqli_query($link,$sql_for_create);
            $user_id= mysqli_insert_id($link);

            if(isset($_FILES['u_pro_pic'])){
                move_uploaded_file($_FILES['u_pro_pic']['tmp_name'],'user_images/'.$user_id.$tp);
            }
            $message='Your Profile Successfully Created';
        }
        else{
            $message='Something Wrong!';
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

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="style/reg_user_profile.css" rel="stylesheet" media="all">

    <!--ICON-->
    <link rel="icon" href="images/rent_logo.png" type="image/png"width="5px" height="2px" >
</head>

<body>
    <?php include 'header.php';?>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Create Your Profile</h2>
                </div>
                <div class="card-heading" style="background-color: white">
                    <center>
                        <p style="color: Green; font-size; 16px"><?php echo $message;?></p>
                    </center>
                </div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-sm-6">
                                        <div class="input-group-desc">
                                            
                                            <input class="input--style-5" name="u_first_name" placeholder="First name" type="text" required >
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group-desc">
                                            <input class="input--style-5"   name="u_last_name" placeholder="Last name"  type="text" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="u_address" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="u_email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="u_contact" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="u_password"required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Confirm Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="u_conf_password"required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Profile Picture</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input_file" type="file" name="u_pro_pic">
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="form-row p-t-20">
                            <label class="label label--block">Are you an existing customer?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> -->
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit" name="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include'footer.php';?>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->
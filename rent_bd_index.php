<?php
    include 'database.php';

    $server="localhost";
					$user="root";
					$passcode="";
					$myDB = "rent_bd";

					$server_connection = mysql_connect($server,$user,$passcode);
					$db_connection= mysql_select_db($myDB);

    $sql = 'select * from `unit_info`';
	$query = mysqli_query($link,$sql);
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelBD.com</title>
    
    <!---Bootstrap link-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!----CSS link-->
    <link rel="stylesheet" href="style/rent_index_style.css">
    <!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Cantata+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Imprima" rel="stylesheet">
    <!-- SLIDER LINK -->
    <link rel="shortcut icon" href="../favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,400,600' rel='stylesheet' type='text/css'>
    <script src="js/modernizr.custom.js"></script>
    <!-- Slider bootstrap -->
    <link rel="stylesheet" href="css/slider_css/bootstrap.min.css">
    <link rel="stylesheet" href="css/slider_css/slider.css">
    <!----Header css link---->
    <link rel="stylesheet" href="style/header_style.css">
    <!---Footer CSS-->
    <link rel="stylesheet" href="style/footer_style.css">
</head>

<!--------------------------START BODY-------------------------------->

<body>
    <!------------------Start Header--------------------->
    <header>
        <div class="head-div">
            <div class="row">
                <div class="col-sm-8">
                    <div class="logo-box">
                      <a href="/">
                      <img src="images/rent_logo.png" style="width: 120px; height: 80px;">
                      </a>
                    </div>
                </div>  
                <div class="col-sm-4">
                    <nav>
                      <ul id="n_list">
                          <li><a href="">home</a></li>
                          <li><a href="">work</a></li>
                          <li><a href="">product</a></li>
                          <li><a href="">about</a></li>
                          <li><a href="">contact</a></li>
                      </ul>
                    </nav>
                </div>
            </div> <!---END OF DIV ROW-->
        </div> <!-- END OF DEV HEAD-DIV -->
    </header>
    <!-------------------END HEADER----------------------->

    <!--------------------- START SLIDER --------------------->
    <div class="slider_div">
        
        <div id="slider1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#slider1" data-slide-to="0"></li>
                <li data-target="#slider1" data-slide-to="1"></li>
                <li data-target="#slider1" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="images/slider_images/slide2.jpg" class="d-block img-fluid" alt="First Slide" >
                    <div class="carousel-caption">
                        <h3>RentBD</h3>
                        <p>A New Experience For Find Home</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/slider_images/slide1.jpg" class="d-block img-fluid" alt="Second Slide">
                    <div class="carousel-caption">
                        <h3>RentBD</h3>
                        <p>My place, my Home.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/slider_images/slide3.jpg" class="d-block img-fluid" alt="Third Slide">
                    <div class="carousel-caption">
                        <h3>RentBD</h3>
                        <p>“Come on, guys lets party at my place.”</p>
                    </div>
                </div>
            </div>
            <a href="#slider1" class="carousel-control-prev" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#slider1" class="carousel-control-next" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div> <!---END OF DIV SLIDER1-->
    </div> <!----END OF DIV slider div-->
    <script src="js/slider_js/jquery-slim.min.js"></script>
    <script src="js/slider_js/popper.min.js"></script>
    <script src="js/slider_js/bootstrap.min.js"></script>

    <script>
        $('.carousel').carousel({
        interval : 10000,
        pause: 'hover',
        wrap: true,
        keyboard: true
        opacity: 1
        });
    </script>
    <!----------------------------END SLIDRE----------------------------------->    
    <div class="container">
            <?php
                $result="";
                $result=mysql_query("SELECT * FROM `unit_info` LIMIT 5");

                $row="";
                while($row=mysql_fetch_array($result))
                {?>
                <div class="row" id="ht_list">
                    <div class="col-sm-3" id="ht_img">
                        <?php
                            $uID=$row['unit_id'];
                            $ext= $row['unit_bannar'];
                            if($ext!=''){
                                echo'<img src="unit_bannar_images/'.$uID.$ext.'">';
                            }
                            else {
                                echo '<img src="images/row.png">';
                            }
                        ?>
                    </div>
                    <div class="col-sm-5" id="ht_details" style="height: 200px;">
                        <?php
                            echo "<h1>".$row['unit_heading']."</h1>";
                            echo "<h4>"."<h2>Address : </h2>".$row['unit_heading']."</h4>";
                            echo "<p>"."<h2>City : </h2>".$row['unit_heading']."</p>";
                            echo "<p>"."<h2>Price : BDT</h2>".$row['unit_heading']."</p>";
                            echo "<p>"."<h2>Rating : </h2>".$row['unit_heading']."</p>";
                        
                        ?>
                    </div>
                    <div class="col-sm-4" id="part3">
                        <p><a href="#">Gallary Images</a></p>
                        <p>If You Have any Question?</p>
                        <form action="">
                            <input type="textfield" id="input" name="que" placeholder="say somthing!.....">
                            <input type="submit" id="button">
                        </form>
                    </div>
                    
                <?php echo '</div>';} ?>
         <!---END OF DIV ROW-->
    </div> <!--END OF DIV CONTAINER-->
    <footer>
        <div class="container" id="footer_container">
            <div class="row">
                <div class="col-sm-4" id="f_part1">
                    <h3>Hotel BD</h3> <hr>
                    <p>The site have developed a smart way for get information of hotels for visitors.</p>
                    
                </div>
                <div class="col-sm-4" id="f_part2">
                    <h3>Contact</h3> <hr>
                    
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>
                    
                </div>
                <div class="col-sm-4" id="f_part3">
                    <ul>
                        <li><a href="">About us</a></li>
                        <li><a href="">Gallary</a></li>
                        <li><a href="">Review Site</a></li>
                        <li><a href="">The Houses</a></li>
                    </ul>
                </div>
            </div>
        </div> <!----END OF DIV CONATINER-->
    </footer>
    <footer id="f_2">
        <div class="container" id="copyright">
            <p id="copy">copyright@soumitra</p>
        </div>
    </footer>
</body>
<!------------------------------------END BODY----------------------------------------->
</html>
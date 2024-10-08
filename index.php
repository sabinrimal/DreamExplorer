<?php
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Dream Explorer</title>
    <link rel="shortcut icon" href="assets/logo/logo_title.png">
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>

<!--Header-->
<?php include('includes/header.php'); ?>
<!-- /Header -->

<!-- Banners -->
<section id="banner" class="banner-section">
    <div class="container">
        <div class="div_zindex">
            <div class="row">
                <div class="col-md-6 col-md-push-0">
                    <div class="banner_content">
                        <h1>Road Trip! <br/>Need a vehicle???</h1>
                        <p>"Why own? When you can rent."
                        <br/>
                        "Join us for vehicle renting"
                        <br/>
                        "We have more than a hundreds of vehicles for you to choose from"</p>
                        <br/>
                        <a href="car-listing.php" class="btn" style="margin-top: 10px;">View All
                            <span class="angle_arrow">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-md-5 col-md-push-4">
                    <div class="banner_content">
                        <h2>Safe | Secure | Simple</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Banners -->

<!-- Recent Vehicles-->
<section class="section-padding gray-bg">
    <div class="container">
        <div class="section-header text-center">
            <h2>Find the Best <span>VehicleForYou</span></h2>
            <h6>Self Drive Car or Bike Rentals in Nepal</h6>
            <p>Rent cars for self drive in Nepal. DreamExplorer is the most affordable brand for self drive
                car rentals in Nepal. You can also rent a bike in Nepal with DreamExplorer.
                Self drive car rentals and self drive bike rental options are getting extremely
                popular nowadays. Rent a Swift, Rent a Camper or Rent a Royal Enfield and enjoy
                the freedom to drive on your own with DreamExplorer.</p>
        </div>
        <div class="row">
            <!-- Nav tabs -->
            <div class="recent-tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">New
                            Vehicles</a></li>
                </ul>
            </div>
            <!-- Recently Listed New Vehicles -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="resentnewcar">
                    <?php
                    $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 
                                from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand 
                                ORDER BY id DESC LIMIT 0, 6";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                            ?>
                            <div class="col-list-3">
                                <div class="recent-car-list">
                                    <div class="car-info-box">
                                        <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                                            <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>"
                                                 class="img-responsive" alt="image">
                                        </a>
                                        <ul>
                                            <li>
                                                <i class="fa fa-car" aria-hidden="true"></i>
                                                <?php echo htmlentities($result->FuelType); ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo htmlentities($result->ModelYear); ?> Model
                                            </li>
                                            <li>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <?php echo htmlentities($result->SeatingCapacity); ?> Seats
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="car-title-m">
                                        <h6>
                                            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                                                <?php echo htmlentities($result->BrandName); ?>,
                                                <?php echo htmlentities($result->VehiclesTitle); ?>
                                            </a>
                                        </h6>
                                        <span class="price">रु.<?php echo htmlentities($result->PricePerDay); ?> /Day</span>
                                    </div>
                                    <div class="inventory_info_m">
                                        <p><?php echo substr($result->VehiclesOverview, 0, 70); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
</section>
<!-- /Resent Vehicles -->

<!-- Fun Facts-->
<section class="fun-facts-section">
    <div class="container div_zindex">
        <div class="row">
            <div class="col-lg-3 col-xs-6 col-sm-3">
                <div class="fun-facts-m">
                    <div class="cell">
                        <h2><i class="fa fa-calendar" aria-hidden="true"></i>BCA 4th</h2>
                        <p>TU Project</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6 col-sm-3">
                <div class="fun-facts-m">
                    <div class="cell">
                        <h2><i class="fa fa-car" aria-hidden="true"></i>10+</h2>
                        <p>New Vehicles For Rent</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6 col-sm-3">
                <div class="fun-facts-m">
                    <div class="cell">
                        <h2><i class="fa fa-life-ring" aria-hidden="true"></i>10+</h2>
                        <p>Certified Mechanics</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6 col-sm-3">
                <div class="fun-facts-m">
                    <div class="cell">
                        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>200+</h2>
                        <p>Satisfied Customers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
</section>
<!-- /Fun Facts-->

<!--Testimonial -->
<section class="section-padding testimonial-section parallex-bg">
    <div class="container div_zindex">
        <div class="section-header white-text text-center">
            <h2>Our Satisfied <span>Customers</span></h2>
        </div>
        <div class="row">
            <div id="testimonial-slider">
                <?php
                $tid = 1;
                $sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial 
                        join tblusers on tbltestimonial.UserEmail=tblusers.EmailId 
                        where tbltestimonial.status=:tid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':tid', $tid, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                        ?>
                        <div class="testimonial-m">
                            <div class="testimonial-img"><img src="assets/logo/logo_title.png" alt=""/></div>
                            <div class="testimonial-content">
                                <div class="testimonial-heading">
                                    <h5><?php echo htmlentities($result->FullName); ?></h5>
                                    <p><?php echo htmlentities($result->Testimonial); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <!-- Dark Overlay-->
    <div class="white-overlay"></div>
</section>
<!-- /Testimonial-->

<!--Footer -->
<?php include('includes/footer.php'); ?>
<!-- /Footer-->

<!--Back to top-->
<div id="back-top" class="back-top"><a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a></div>
<!--/Back to top-->

<!--Login-Form -->
<?php include('includes/login.php'); ?>
<!--/Login-Form -->

<!--Register-Form -->
<?php include('includes/registration.php'); ?>
<!--/Register-Form -->

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php'); ?>
<!--/Forgot-password-Form -->

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
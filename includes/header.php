
<header>
    <div class="default-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <div class="logo">
                        <a href="index.php"><img src="assets/logo/logo.png" alt="image" height="70px !important"/></a>
                    </div>
                </div>
                <div class="col-sm-9 col-md-10">
                    <div class="header_info">
                        <div class="header_widgets">
                            <div class="circle_icon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <p class="uppercase_text">For Support Mail us </p>
                            <a href="mailto:info@example.com">info@dreamexplorer.com.np</a></div>
                        <div class="header_widgets">
                            <div class="circle_icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <p class="uppercase_text">Service Helpline</p>
                            <a href="tel:61-1234-5678-09">+977-9804975875</a>
                        </div>
                        <div class="social-follow">
                        </div>
                        <?php
                        if (strlen($_SESSION['login']) == 0) {
                            ?>
                            <div class="login_btn">
                                <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal"
                                   data-dismiss="modal">Login / Register</a>
                            </div>
                            <?php
                        } else {
                            echo "<b>Welcome: </b><i><b><u>";
                            $email = $_SESSION['login'];
                            $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email ";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':email', $email, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                                    echo htmlentities($result->FullName);
                                }
                            }
                            echo "</u></u></i>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav id="navigation_bar" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="header_wrap">
                <!--          //profile start-->
                <div class="user_login">
                    <ul>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <?php
                                $email = $_SESSION['login'];
                                $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email ";
                                $query = $dbh->prepare($sql);
                                $query->bindParam(':email', $email, PDO::PARAM_STR);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) {
                                        echo htmlentities($result->FullName);
                                    }
                                }
                                ?>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                if ($_SESSION['login']) {
                                    ?>
                                    <li><a href="profile.php">Profile Settings</a></li>
                                    <li><a href="update-password.php">Update Password</a></li>
                                    <li><a href="my-booking.php">My Booking</a></li>
                                    <li><a href="post-testimonial.php">Post a Testimonial</a></li>
                                    <li><a href="my-testimonials.php">My Testimonial</a></li>
                                    <li><a href="logout.php">Sign Out</a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Profile
                                            Settings</a></li>
                                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Update
                                            Password</a></li>
                                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">My Booking</a>
                                    </li>
                                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Post a
                                            Testimonial</a></li>
                                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">My Testimonial</a>
                                    </li>
                                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!--          //profile end-->
                <div class="header_search">
                    <div id="search_toggle">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                    <!-- FORM FOR SEARCH -->
                    <form action="search.php" method="get" id="header-search-form">
                        <input type="text" placeholder="Search..." class="form-control" name="searched"/>
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                    <!-- SEARCH END -->
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="page.php?type=aboutus">About Us</a></li>
                    <li><a href="car-listing.php">Car Listing</a>
                    <li><a href="contact-us.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation end -->

    <!-- Timeout After 20 Minutes -->
    <script>
        console.log('hello');
        setTimeout(function(){ window.location.href = "logout.php";
        }, 1200000);
    </script>
    <!-- Timeout After 20 Minutes  -->
</header>
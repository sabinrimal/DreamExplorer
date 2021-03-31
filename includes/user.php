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
                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Update Password</a></li>
                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">My Booking</a></li>
                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Post a Testimonial</a></li>
                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">My Testimonial</a></li>
                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
                    <?php
                }
                ?>
            </ul>
        </li>
    </ul>
</div>

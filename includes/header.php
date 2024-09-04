<header>
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="navbar-header">
      <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="header_wrap">
      <div class="user_login">
        <ul>
          <li class="dropdown">
            <?php if(strlen($_SESSION['login'])==0) { ?>
              <a href="#loginform" data-toggle="modal" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> Login / Register <i class="fa fa-angle-down" aria-hidden="true"></i></a>
            <?php } else { ?>
              <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
                <?php 
                $email = $_SESSION['login'];
                $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email";
                $query = $dbh->prepare($sql);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0) {
                  foreach($results as $result) {
                    echo htmlentities($result->FullName);
                  }
                }
                ?>
                <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php">Profile Settings</a></li>
                <li><a href="update-password.php">Update Password</a></li>
                <li><a href="my-booking.php">My Booking</a></li>
                <li><a href="post-testimonial.php">Post a Testimonial</a></li>
                <li><a href="my-testimonials.php">My Testimonial</a></li>
                <li><a href="logout.php">Sign Out</a></li>
              </ul>
            <?php } ?>
          </li>
        </ul>
      </div>
      <div class="header_search">
        <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
        <form action="search.php" method="post" id="header-search-form">
          <input type="text" placeholder="Search..." name="searchdata" class="form-control" required="true">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="navigation">
      <div class="mb-3">
        <div class="logo">
          <a href="index.php">
            <img src="assets/images/logo.png" alt="image"/>
          </a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="car-listing.php">Car Listing</a></li>
          <li><a href="page.php?type=faqs">FAQs</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
</header>

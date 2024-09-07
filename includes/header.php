
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-2">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="assets/pics/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Bootstrap
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="page.php?type=aboutus">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="car-listing.php">Yachts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="page.php?type=faqs">FAQs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-us.php">Contact Us</a>
          </li>
        </ul>
        <div class="d-flex">


          
          <div class="user_login dropdown">
            <?php if(strlen($_SESSION['login'])==0) { ?>
              <a href="#loginform" data-bs-toggle="modal" aria-haspopup="true" aria-expanded="false" class="btn btn-outline-primary">
                <i class="fa fa-user-circle" aria-hidden="true"></i> Login/signup
              </a>
            <?php } else { ?>
              <a href="#" class="btn btn-outline-primary dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
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
              </a>
              <ul class="dropdown-menu mb-3 " aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="profile.php">Profile Settings</a></li>
                <li><a class="dropdown-item" href="update-password.php">Update Password</a></li>
                <li><a class="dropdown-item" href="my-booking.php">My Booking</a></li>
                <li><a class="dropdown-item" href="post-testimonial.php">Post a Testimonial</a></li>
                <li><a class="dropdown-item" href="my-testimonials.php">My Testimonial</a></li>
                <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
              </ul>
            <?php } ?>
          </div>
          <div class="container-fluid">
              <form action="search.php" method="post" id="header-search-form" class="d-flex">
                <input type="text" placeholder="Search..." name="searchdata" class="form-control me-2" required>
                <button type="submit" class="btn btn-outline-success">Search</button>
              </form>
            </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  </header>
<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_POST['submit'])) {
  $fromdate = $_POST['fromdate'];
  $todate = $_POST['todate'];
  $message = $_POST['message'];
  $useremail = $_SESSION['login'];
  $status = 0;
  $vhid = $_GET['vhid'];
  $bookingno = mt_rand(100000000, 999999999);
  $ret = "SELECT * FROM tblbooking where (:fromdate BETWEEN date(FromDate) and date(ToDate) || :todate BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN :fromdate and :todate) and VehicleId=:vhid";
  $query1 = $dbh->prepare($ret);
  $query1->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query1->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
  $query1->bindParam(':todate', $todate, PDO::PARAM_STR);
  $query1->execute();
  $results1 = $query1->fetchAll(PDO::FETCH_OBJ);

  if ($query1->rowCount() == 0) {

    $sql = "INSERT INTO  tblbooking(BookingNumber,userEmail,VehicleId,FromDate,ToDate,message,Status) VALUES(:bookingno,:useremail,:vhid,:fromdate,:todate,:message,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bookingno', $bookingno, PDO::PARAM_STR);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
    $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
    $query->bindParam(':todate', $todate, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      echo "<script>alert('Booking successfull.');</script>";
      echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
    } else {
      echo "<script>alert('Something went wrong. Please try again');</script>";
      echo "<script type='text/javascript'> document.location = 'car-listing.php'; </script>";
    }
  } else {
    echo "<script>alert('Car already booked for these days');</script>";
    echo "<script type='text/javascript'> document.location = 'car-listing.php'; </script>";
  }
}

?>


<!DOCTYPE HTML>
<html lang="en">

<head>

  <title>Yacht Renting Website | Vehicle Details</title>
 
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Yacht Rental</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

 
</head>
<body>

  <!-- Header Section -->
  <?php include('includes/header.php');?>
  <!-- /Header -->

  <!--Listing-Image-Slider-->

  <?php
  $vhid = intval($_GET['vhid']);
  $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['brndid'] = $result->bid;
  ?>


<!-- carousel silder -->
<section id="listing_img_slider">
  <div id="vehicleCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-inner">
      <!-- Image 1 -->
      <div class="carousel-item active">
        <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="d-block w-100 img-responsive" alt="image" width="900" height="560">
      </div>
      <!-- Image 2 -->
      <div class="carousel-item">
        <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" class="d-block w-100 img-responsive" alt="image" width="900" height="560">
      </div>
      <!-- Image 3 -->
      <div class="carousel-item">
        <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" class="d-block w-100 img-responsive" alt="image" width="900" height="560">
      </div>
      <!-- Image 4 -->
      <div class="carousel-item">
        <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" class="d-block w-100 img-responsive" alt="image" width="900" height="560">
      </div>
      <!-- Image 5 (only if exists) -->
      <?php if ($result->Vimage5 != ""): ?>
        <div class="carousel-item">
          <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5); ?>" class="d-block w-100 img-responsive" alt="image" width="900" height="560">
        </div>
      <?php endif; ?>
    </div>

    <!-- Carousel Controls (optional) -->
    <a class="carousel-control-prev" href="#vehicleCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#vehicleCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>
</section>


      <!--/Listing-Image-Slider-->


      <!--Listing-detail-->
      <section class="listing-detail">
        <div class="container">
          <div class="listing_detail_head row">
            <div class="col-md-9">
              <h2><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></h2>
            </div>
            <div class="col-md-3">
              <div class="price_info">
                <p>$<?php echo htmlentities($result->PricePerDay); ?> </p>Per Day

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <div class="main_features">
                <ul>

                  <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result->ModelYear); ?></h5>
                    <p>Reg.Year</p>
                  </li>
                  <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result->FuelType); ?></h5>
                    <p>Fuel Type</p>
                  </li>

                  <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result->SeatingCapacity); ?></h5>
                    <p>Seats</p>
                  </li>
                </ul>
              </div>
                         
                                           
                                      
          <?php }
      } ?>

            </div>

            <!--Side-Bar-->
<!-- Side-Bar -->
<aside class="col-lg-3 col-md-4 col-sm-12 mb-4">

  <!-- Book Now Section -->
  <div class="sidebar_widget">
    <div class="widget_heading mb-3">
      <h5><i class="fa fa-envelope" aria-hidden="true"></i> Book Now</h5>
    </div>
    <form method="post">
      <div class="form-group">
        <label for="fromdate">From Date:</label>
        <input type="date" class="form-control" name="fromdate" id="fromdate" placeholder="From Date" required>
      </div>
      <div class="form-group">
        <label for="todate">To Date:</label>
        <input type="date" class="form-control" name="todate" id="todate" placeholder="To Date" required>
      </div>
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea rows="4" class="form-control" name="message" id="message" placeholder="Message" required></textarea>
      </div>
      <?php if ($_SESSION['login']) { ?>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" name="submit" value="Book Now">
        </div>
      <?php } else { ?>
        <!-- <a href="index.php" class="btn btn-secondary btn-xs uppercase" >Login First Book</a> -->
            <!-- Trigger the login modal -->
    <button type="button" class="btn btn-secondary btn-xs uppercase" data-bs-toggle="modal" data-bs-target="#loginform">
      Login First to Book
    </button>

      <?php } ?>
    </form>
  </div>
</aside>
<!-- /Side-Bar -->

          </div>

          <div class="space-20"></div>
          <div class="divider"></div>

          <!-- Similar-Cars Section -->
<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
  <h3>Similar Yachts</h3>
  <div class="row">
    <?php
    $bid = $_SESSION['brndid'];
    $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.VehiclesBrand=:bid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bid', $bid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
      foreach ($results as $result) { ?>
        <div class="col-md-4 mb-4">
          <div class="product-listing-m gray-bg">
            <div class="product-listing-img">
              <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-fluid" alt="image" />
              </a>
            </div>
            <div class="product-listing-content">
              <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?>, <?php echo htmlentities($result->VehiclesTitle); ?></a></h5>
              <p class="list-price">$<?php echo htmlentities($result->PricePerDay); ?></p>
              <ul class="features_list">
                <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity); ?> seats</li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear); ?> model</li>
                <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType); ?></li>
              </ul>
            </div>
          </div>
        </div>
      <?php }
    } ?>
  </div>
</div>
<!-- End of Similar-Cars Section -->
       </div>
      </section>
      <!--/Listing-detail-->

      <!--Footer -->
      <?php include('includes/footer.php'); ?>
      <!-- /Footer-->

      <!--Login-Form -->
      <?php include('includes/login.php'); ?>
      <!--/Login-Form -->

      <!--Register-Form -->
      <?php include('includes/registration.php'); ?>

      <!--/Register-Form -->

      <!--Forgot-password-Form -->
      <?php include('includes/forgotpassword.php'); ?>

          <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
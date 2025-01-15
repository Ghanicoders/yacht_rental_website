 <!-- <?php
session_start();
include("includes/config.php");
error_reporting(0);
?>  -->

<!DOCTYPE html>
<html lang="en">
<head>
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


       <?php include('includes/carosel1.php');?>

    <!-- About Section -->
    <section class="about-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Experience Luxury Yacht Rentals</h2>
                    <p>Enjoy a luxurious experience on the water with our exclusive yacht rental services. Explore stunning destinations and create unforgettable memories.</p>
                </div>
            </div>
        </div>
    </section>



<!-- Recently Listed New Cars -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="resentnewcar">
    <div class="row"> <!-- Move the row here to wrap all cards -->
      <?php 
        $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand limit 9";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
          foreach ($results as $result) {
      ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="card">
            <div class="card-body"> 
              <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive card-img-top" alt="image">
              </a>
              <ul>
                <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType); ?></li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear); ?> Model</li>
                <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity); ?> seats</li>
              </ul>
            </div>
            <div class="car-title-m ml-5 text-center">
              <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"> <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
              <span class="price">$<?php echo htmlentities($result->PricePerDay); ?> /Day</span>
            </div>
            <div class="inventory_info_m text-center">
              <p><?php echo substr($result->VehiclesOverview, 0, 70); ?></p>
            </div>
          </div>
        </div>
      <?php 
          }
        }
      ?>
    </div> <!-- End of row -->
  </div>
</div>

<!-- Feedback Section -->
<section class="feedback-section py-5 bg-light">
    <div class="container">
    <h3 class="mb-4 text-primary text-center">Satisfied Customers</h3>
        <div class="row">
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="feedback-item p-4 border rounded shadow-sm bg-white">
                    <p class="quote-text font-italic text-muted">"Best experience ever! The yacht was luxurious and the service was top-notch."</p>
                    <p class="customer-name font-weight-bold">- John Doe</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="feedback-item p-4 border rounded shadow-sm bg-white">
                    <p class="quote-text font-italic text-muted">"A memorable trip! Highly recommend their services."</p>
                    <p class="customer-name font-weight-bold">- Sarah Lee</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="feedback-item p-4 border rounded shadow-sm bg-white">
                    <p class="quote-text font-italic text-muted">"Wonderful experience! The yacht was incredible and the crew was amazing!"</p>
                    <p class="customer-name font-weight-bold">- Mark Smith</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="feedback-item p-4 border rounded shadow-sm bg-white">
                    <p class="quote-text font-italic text-muted">"An unforgettable day! The best yacht rental service we've ever had!"</p>
                    <p class="customer-name font-weight-bold">- Emily Davis</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- About Us -->
<section class="about-us py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-primary mb-4">About Us</h1>
                <p class="lead">
                    Welcome to our Boat Rental Service! We provide a luxurious and unforgettable experience on the water. Whether you're looking for a peaceful day on the lake or an exciting adventure on the sea, our fleet of well-maintained boats is ready to serve you.
                </p>
                <p>
                    Our mission is to offer top-notch service, comfort, and safety to all our customers. We pride ourselves on providing personalized experiences tailored to your needs, making sure every moment spent on our boats is a memorable one.
                </p>
                <p>
                    With a wide range of options, from small leisure boats to luxury yachts, we cater to all preferences and budgets. Book your next adventure with us, and let us help you create memories that will last a lifetime!
                </p>
            </div>
        </div>
    </div>
</section>



    <!-- Footer Section -->
    <?php include('includes/footer.php');?>




<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



</body>
</html>

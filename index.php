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
            <div class="car-title-m ml-5">
              <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"> <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
              <span class="price">$<?php echo htmlentities($result->PricePerDay); ?> /Day</span>
            </div>
            <div class="inventory_info_m">
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
    <section class="feedback-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Satisfied Customers</h3>
                    <p>"Best experience ever! The yacht was luxurious and the service was top-notch."</p>
                    <p>"A memorable trip! Highly recommend their services."</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- about us  -->
     <h1>about us </h1>
     <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur nisi aliquam quia voluptatum voluptas molestias. Totam a dolo
        r veritatis quod aut consequatur sit et itaque, nulla, tempora, qui enim debitis!</p>


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
    <script src="assets/js/script.js"></script>


</body>
</html>

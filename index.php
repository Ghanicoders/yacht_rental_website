 <!-- <?php
session_start();
include("includes/config.php");
error_reporting(0);
?>  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <!-- services -->
     <section>
     <div class="container mt-5">
    <h2 class="text-center mb-3">Our Yacht Rental Services</h2>
    <div class="row">
        <!-- Service 1 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="assets/images/kolkata.jpg" class="card-img-top img-fluid" alt="Yacht Rental in Kolkata">
                <div class="card-body">
                    <h5 class="card-title">Yacht Rental in Kolkata</h5>
                    <p class="card-text">Explore the beautiful waters of Kolkata with our luxury yachts available for rent.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <!-- Service 2 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="assets/images/goa.jpg" class="card-img-top img-fluid" alt="Yacht Rental in Goa">
                <div class="card-body">
                    <h5 class="card-title">Yacht Rental in Goa</h5>
                    <p class="card-text">Enjoy the serene beaches of Goa on our premium yachts, perfect for any occasion.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <!-- Service 3 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="assets/images/chennai.jpg" class="card-img-top img-fluid" alt="Yacht Rental in Chennai">
                <div class="card-body">
                    <h5 class="card-title">Yacht Rental in Chennai</h5>
                    <p class="card-text">Sail alon  g the coast of Chennai with our exclusive yacht rental services.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Service 4 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="assets/images/tamilnadu.jpg" class="card-img-top img-fluid" alt="Yacht Rental in Tamil Nadu">
                <div class="card-body">
                    <h5 class="card-title">Yacht Rental in Tamil Nadu</h5>
                    <p class="card-text">Experience the beauty of Tamil Nadu’s coastline with our luxurious yacht rentals.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <!-- Service 5 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="assets/images/mumbai.jpg" class="card-img-top img-fluid" alt="Yacht Rental in Mumbai">
                <div class="card-body">
                    <h5 class="card-title">Yacht Rental in Mumbai</h5>
                    <p class="card-text">Discover the bustling waters of Mumbai with our top-of-the-line yachts.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <!-- Service 6 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="assets/images/kerala.jpg" class="card-img-top img-fluid" alt="Yacht Rental in Kerala">
                <div class="card-body">
                    <h5 class="card-title">Yacht Rental in Kerala</h5>
                    <p class="card-text">Cruise through the backwaters of Kerala with our luxurious yacht services.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
     </section>



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

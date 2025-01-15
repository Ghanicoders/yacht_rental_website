<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['send'])) {
  $name = $_POST['fullname'];
  $email = $_POST['email'];
  $contactno = $_POST['contactno'];
  $message = $_POST['message'];
  $sql = "INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':name', $name, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
  $query->bindParam(':message', $message, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    $msg = "Query Sent. We will contact you shortly";
  } else {
    $error = "Something went wrong. Please try again";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Header -->
    <?php include('includes/header.php'); ?>
    <!-- End Header -->

    <!-- Page Header (About Us) -->
    <section class="page-header py-5 bg-light">
        <div class="container text-center">
            <h1>About Us</h1>
            <p class="lead">Learn more about our company and the services we offer.</p>
        </div>
    </section>
    <!-- End Page Header -->

    <!-- About Us Section -->
    <section class="about-us py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Who We Are</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla fermentum, orci nec cursus rhoncus, leo metus tincidunt libero, vitae fermentum elit nulla vel urna. Proin non nisi felis. Integer ac sollicitudin ante.</p>
                    <p>We provide luxurious boat rental services to create unforgettable experiences. Whether for a special event or just a relaxing day on the water, we ensure top-notch service and amazing boats for your enjoyment.</p>
                </div>
                <div class="col-md-6">
                    <img src="assets/pics/about-us-image.jpg" alt="About Us" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Section -->

    <!-- Our Mission Statement -->
    <section class="mission-statement py-5 bg-primary text-white">
        <div class="container text-center">
            <h2>Our Mission</h2>
            <p>To provide exceptional yacht and boat rental services with unmatched luxury, comfort, and attention to detail, ensuring every customer’s journey is memorable.</p>
        </div>
    </section>
    <!-- End Mission Statement -->

    <!-- Our Team Section (5 Team Members) -->
    <section class="our-team py-5">
        <div class="container text-center">
            <h2>Meet Our Team</h2>
            <div class="row">
                <!-- Team Member 1 -->
                <div class="col-md-2 col-6 mb-4">
                    <div class="card">
                        <img src="assets/pics/team-member1.jpg" alt="Team Member 1" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-text">CEO & Founder</p>
                        </div>
                    </div>
                </div>
                <!-- Team Member 2 -->
                <div class="col-md-2 col-6 mb-4">
                    <div class="card">
                        <img src="assets/pics/team-member2.jpg" alt="Team Member 2" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Jane Smith</h5>
                            <p class="card-text">Operations Manager</p>
                        </div>
                    </div>
                </div>
                <!-- Team Member 3 -->
                <div class="col-md-2 col-6 mb-4">
                    <div class="card">
                        <img src="assets/pics/team-member3.jpg" alt="Team Member 3" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Robert Johnson</h5>
                            <p class="card-text">Customer Service</p>
                        </div>
                    </div>
                </div>
                <!-- Team Member 4 -->
                <div class="col-md-2 col-6 mb-4">
                    <div class="card">
                        <img src="assets/pics/team-member4.jpg" alt="Team Member 4" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Emily Davis</h5>
                            <p class="card-text">Marketing Manager</p>
                        </div>
                    </div>
                </div>
                <!-- Team Member 5 -->
                <div class="col-md-2 col-6 mb-4">
                    <div class="card">
                        <img src="assets/pics/team-member5.jpg" alt="Team Member 5" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Michael Lee</h5>
                            <p class="card-text">Fleet Manager</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Team Section -->

 
   

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>
    <!-- End Footer -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>

</html>

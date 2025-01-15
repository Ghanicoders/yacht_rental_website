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
<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <!-- Header -->

  <!-- /Header -->

  <!-- Page Header -->
  <section class="page-header contactus_page py-5 bg-light">
  <div class="container text-center">
    <div class="page-header_wrap">
      <div class="page-heading text-start">
        <h1>Contact Us</h1>
      </div>
      <ul class="coustom-breadcrumb list-unstyled text-start">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>
  </div>
</section>
  <!-- /Page Header -->

  <!-- Contact Us Section -->
  <section class="contact_us section-padding py-5">
    <div class="container">
      <div class="row">
        <!-- Contact Form -->
        <div class="col-md-6">
          <h3>Get in touch using the form below</h3>
          <?php if ($error) { ?>
            <div class="alert alert-danger" role="alert">
              <strong>Error!</strong> <?php echo htmlentities($error); ?>
            </div>
          <?php } else if ($msg) { ?>
            <div class="alert alert-success" role="alert">
              <strong>Success!</strong> <?php echo htmlentities($msg); ?>
            </div>
          <?php } ?>
          <div class="contact_form gray-bg p-4 rounded shadow">
            <form method="post">
              <div class="mb-3">
                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                <input type="text" name="fullname" class="form-control" id="fullname" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" id="emailaddress" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                <input type="text" name="contactno" class="form-control" id="phonenumber" required maxlength="10" pattern="[0-9]+">
              </div>
              <div class="mb-3">
                <label class="form-label">Message <span class="text-danger">*</span></label>
                <textarea class="form-control" name="message" rows="4" required></textarea>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary w-100" type="submit" name="send">Send Message <i class="fa fa-paper-plane ms-2"></i></button>
              </div>
            </form>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="col-md-6">
          <h3 class="mb-4">Contact Info</h3>
          <div class="contact_detail">
            <?php
            $sql = "SELECT Address, EmailId, ContactNo FROM tblcontactusinfo";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            if ($query->rowCount() > 0) {
              foreach ($results as $result) { ?>
                <ul class="list-unstyled">
                  <li class="mb-3">
                    <div class="d-flex align-items-center">
                      <i class="fa fa-map-marker-alt me-3" style="font-size: 20px;"></i>
                      <span><?php echo htmlentities($result->Address); ?></span>
                    </div>
                  </li>
                  <li class="mb-3">
                    <div class="d-flex align-items-center">
                      <i class="fa fa-phone-alt me-3" style="font-size: 20px;"></i>
                      <a href="tel:<?php echo htmlentities($result->ContactNo); ?>"><?php echo htmlentities($result->ContactNo); ?></a>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex align-items-center">
                      <i class="fa fa-envelope me-3" style="font-size: 20px;"></i>
                      <a href="mailto:<?php echo htmlentities($result->EmailId); ?>"><?php echo htmlentities($result->EmailId); ?></a>
                    </div>
                  </li>
                </ul>
            <?php }
            } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Contact Us Section -->

  <!-- Footer -->
  <?php include('includes/footer.php'); ?>
  <!-- /Footer -->

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0G8sAXtF+ua7G6qp2p2jvV6jJmKl4v0VYwktLSXqOSiFE4yd" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0G8sAXtF+ua7G6qp2p2jvV6jJmKl4v0VYwktLSXqOSiFE4yd" crossorigin="anonymous"></script>
</body>

</html>

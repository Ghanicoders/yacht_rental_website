<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else 
?>
  <!DOCTYPE HTML>
  <html lang="en">

  <head>
    <title>Yacht Renting Website - My Booking</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <body>

    <!--Header-->
    <?php include('includes/header.php'); ?>
    <!--Page Header-->

  

    <?php
    $useremail = $_SESSION['login'];
    $sql = "SELECT * from tblusers where EmailId=:useremail ";
    $query = $dbh->prepare($sql);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) 
      foreach ($results as $result) { ?>
        <section class="user_profile inner_pages">
          <div class="container">
            <div class="user_profile_info bg-light p-4 rounded mb-4">
              <div class="upload_user_logo">
                <img src="assets/images/dealer-logo.jpg" alt="image" class="img-fluid rounded-circle" width="120">
              </div>
              <div class="dealer_info ms-3">
                <h5><?php echo htmlentities($result->FullName); ?></h5>
                <p><?php echo htmlentities($result->Address); ?><br>
                  <?php echo htmlentities($result->City); ?>&nbsp;<?php echo htmlentities($result->Country); ?>
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3">
                <?php include('includes/sidebar.php'); ?>
              </div>

              <div class="col-md-8 col-sm-8">
                <div class="profile_wrap">
                  <h5 class="text-uppercase border-bottom pb-3">My Bookings</h5>
                  <div class="my_vehicles_list">
                    <ul class="list-unstyled">
                      <?php
                      $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status,tblvehicles.PricePerDay,DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totaldays,tblbooking.BookingNumber from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail order by tblbooking.id desc";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>
                          <li class="mb-4">
                            <h4 class="text-danger">Booking No #<?php echo htmlentities($result->BookingNumber); ?></h4>
                            <div class="vehicle_img mb-3">
                              <a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid); ?>">
                                <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" alt="image" class="img-fluid" width="200">
                              </a>
                            </div>
                            <div class="vehicle_title">
                              <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
                              <p><b>From:</b> <?php echo htmlentities($result->FromDate); ?> <b>To:</b> <?php echo htmlentities($result->ToDate); ?></p>
                              <p><b>Message:</b> <?php echo htmlentities($result->message); ?></p>
                            </div>

                            <?php if ($result->Status == 1) { ?>
                              <div class="vehicle_status">
                                <a href="#" class="btn btn-success btn-sm">Confirmed</a>
                              </div>
                            <?php } else if ($result->Status == 2) { ?>
                              <div class="vehicle_status">
                                <a href="#" class="btn btn-danger btn-sm">Cancelled</a>
                              </div>
                            <?php } else { ?>
                              <div class="vehicle_status">
                                <a href="#" class="btn btn-warning btn-sm">Not Confirmed Yet</a>
                              </div>
                            <?php } ?>

                            <h5 class="mt-4 text-primary">Invoice</h5>
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>Car Name</th>
                                  <th>From Date</th>
                                  <th>To Date</th>
                                  <th>Total Days</th>
                                  <th>Rent / Day</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><?php echo htmlentities($result->VehiclesTitle); ?>, <?php echo htmlentities($result->BrandName); ?></td>
                                  <td><?php echo htmlentities($result->FromDate); ?></td>
                                  <td><?php echo htmlentities($result->ToDate); ?></td>
                                  <td><?php echo htmlentities($tds = $result->totaldays); ?></td>
                                  <td><?php echo htmlentities($ppd = $result->PricePerDay); ?></td>
                                </tr>
                                <tr>
                                  <th colspan="4" class="text-center">Grand Total</th>
                                  <th><?php echo htmlentities($tds * $ppd); ?></th>
                                </tr>
                              </tbody>
                            </table>
                            <hr />
                        <?php }
                      } else { ?>
                        <h5 class="text-center text-danger">No bookings yet</h5>
                        <?php } ?>

                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <?php include('includes/footer.php'); ?>
    </body>

  </html>
<?php } ?>

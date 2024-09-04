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
    <header>
        <div class="default-header">
            <nav id="navigation_bar" class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Yacht Rental</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Destinations</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Feedback</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-primary text-white" href="#loginform" data-toggle="modal" data-dismiss="modal">Login / Register</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- Carousel Slider -->
    <div id="yachtCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/yacht1.jpg" class="d-block w-100" alt="Yacht 1">
            </div>
            <div class="carousel-item">
                <img src="assets/images/yacht2.jpg" class="d-block w-100" alt="Yacht 2">
            </div>
            <div class="carousel-item">
                <img src="assets/images/yacht3.jpg" class="d-block w-100" alt="Yacht 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#yachtCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#yachtCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

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

    <!-- Destinations Section -->
    <section class="destinations-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">Available Destinations</h3>
                    <ul class="list-group list-group-flush mt-4">
                        <li class="list-group-item">Kolkata</li>
                        <li class="list-group-item">Goa</li>
                        <li class="list-group-item">Chennai</li>
                        <li class="list-group-item">Tamil Nadu</li>
                        <li class="list-group-item">Mumbai</li>
                    </ul>
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

    <!-- Footer Section -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; 2024 Yacht Rental. All rights reserved.</p>
                    <p><a href="#" class="text-white">About Us</a> | <a href="#" class="text-white">Contact Us</a> | <a href="#" class="text-white">Licenses</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>

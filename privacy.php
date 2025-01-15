<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Header -->
    <?php include('includes/header.php'); ?>
    <!-- End Header -->

    <!-- Page Header (Privacy Policy) -->
    <section class="page-header py-5 bg-light">
        <div class="container text-center">
            <h1>Privacy Policy</h1>
            <p class="lead">Your privacy is important to us. Please read our Privacy Policy to understand how we collect, use, and protect your information.</p>
        </div>
    </section>
    <!-- End Page Header -->

    <!-- Privacy Policy Section -->
    <section class="privacy-policy py-5">
        <div class="container">
            <h2>Introduction</h2>
            <p>We value your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, and safeguard your personal data when you use our services. By using our website, you agree to the terms outlined in this policy.</p>

            <h3>Information We Collect</h3>
            <p>We collect the following types of information:</p>
            <ul>
                <li><strong>Personal Information</strong>: When you interact with our services, we may collect personal information such as your name, email address, phone number, and other relevant contact details.</li>
                <li><strong>Usage Data</strong>: We may also collect non-personally identifiable information related to your interactions with our website and services, including IP addresses, browser types, and website navigation data.</li>
            </ul>

            <h3>How We Use Your Information</h3>
            <p>We use the collected information for the following purposes:</p>
            <ul>
                <li>To provide and improve our services</li>
                <li>To communicate with you regarding bookings, inquiries, or customer support</li>
                <li>To personalize your experience on our website</li>
                <li>To send promotional materials, if you have opted in</li>
                <li>To comply with legal obligations or resolve disputes</li>
            </ul>

            <h3>How We Protect Your Information</h3>
            <p>We use security measures to protect your personal data from unauthorized access, alteration, or disclosure. However, no method of transmission over the internet or electronic storage is 100% secure, so we cannot guarantee absolute security.</p>

            <h3>Sharing Your Information</h3>
            <p>We will not sell, rent, or lease your personal information to third parties. However, we may share your information with trusted partners or service providers who assist us in operating our business, such as payment processors or marketing agencies. We ensure that these partners follow strict confidentiality agreements.</p>

            <h3>Cookies</h3>
            <p>Our website may use cookies to enhance your experience. Cookies are small data files that help us remember your preferences and improve site functionality. You can choose to disable cookies in your browser settings, but this may affect your ability to use certain features of the website.</p>

            <h3>Your Rights</h3>
            <p>You have the right to:</p>
            <ul>
                <li>Access and update your personal information</li>
                <li>Request the deletion of your personal data, subject to certain exceptions</li>
                <li>Opt-out of receiving promotional emails or other marketing communications</li>
            </ul>

            <h3>Third-Party Links</h3>
            <p>Our website may contain links to third-party websites. We are not responsible for the content or privacy practices of these external sites. We encourage you to review the privacy policies of any third-party sites you visit.</p>

            <h3>Changes to This Privacy Policy</h3>
            <p>We may update our Privacy Policy from time to time. Any changes will be posted on this page, and the date of the most recent update will be indicated at the top of this page. Please review this policy periodically for any updates or changes.</p>

            <h3>Contact Us</h3>
            <p>If you have any questions or concerns about our Privacy Policy, please contact us at:</p>
            <p>Email: <a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></p>
            <p>Phone: (123) 456-7890</p>
        </div>
    </section>
    <!-- End Privacy Policy Section -->

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>
    <!-- End Footer -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

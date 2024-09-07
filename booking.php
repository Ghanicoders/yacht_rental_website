<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yacht_rentals";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define variables and initialize with empty values
$name = $email = $phone = $yacht = $date = "";
$name_err = $email_err = $phone_err = $yacht_err = $date_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter your phone number.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    if (empty(trim($_POST["yacht"]))) {
        $yacht_err = "Please select a yacht.";
    } else {
        $yacht = trim($_POST["yacht"]);
    }

    if (empty(trim($_POST["date"]))) {
        $date_err = "Please select a date.";
    } else {
        $date = trim($_POST["date"]);
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($email_err) && empty($phone_err) && empty($yacht_err) && empty($date_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO bookings (name, email, phone, yacht, date) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssss", $param_name, $param_email, $param_phone, $param_yacht, $param_date);

            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_phone = $phone;
            $param_yacht = $yacht;
            $param_date = $date;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                echo "Booking successful!";
            } else {
                echo "Something went wrong. Please try again later.";
            }
            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Yacht</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section id="booking">
        <div class="container">
            <h2>Book Your Yacht</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $name; ?>">
                    <span><?php echo $name_err; ?></span>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                    <span><?php echo $email_err; ?></span>
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>">
                    <span><?php echo $phone_err; ?></span>
                </div>
                <div>
                    <label for="yacht">Yacht</label>
                    <select id="yacht" name="yacht">
                        <option value="">Select a yacht</option>
                        <option value="Yacht 1" <?php echo $yacht == 'Yacht 1' ? 'selected' : ''; ?>>Yacht 1</option>
                        <option value="Yacht 2" <?php echo $yacht == 'Yacht 2' ? 'selected' : ''; ?>>Yacht 2</option>
                        <option value="Yacht 3" <?php echo $yacht == 'Yacht 3' ? 'selected' : ''; ?>>Yacht 3</option>
                    </select>
                    <span><?php echo $yacht_err; ?></span>
                 </div>
                 <div>
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" value="<?php echo $date; ?>">
                    <span><?php echo $date_err; ?></span>
                 </div>
                 <div>
                    <input type="submit" value="Submit">
                 </div>
            </form>
        </div>
    </section>
</body>
</html>


<?php
// Include the database configuration file
include('includes/config.php');

// Query to fetch booking data grouped by date
$sql = "SELECT DATE(PostingDate) as BookingDate, COUNT(*) as TotalBookings 
        FROM tblbooking 
        GROUP BY DATE(PostingDate) 
        ORDER BY BookingDate ASC";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

// Prepare data for the chart
$dataPoints = [];
$totalBookings = 0;
foreach ($results as $row) {
    $dataPoints[] = [
        "label" => $row['BookingDate'],
        "y" => (int)$row['TotalBookings']
    ];
    $totalBookings += (int)$row['TotalBookings'];
}

// Encode data to JSON for use in JavaScript
$dataPoints_json = json_encode($dataPoints, JSON_NUMERIC_CHECK);
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1",
        title: {
            text: "Booking Trends by Date"
        },
        axisY: {
            includeZero: true,
            title: "Total Bookings"
        },
        axisX: {
            title: "Dates",
            labelAngle: -45
        },
        data: [{
            type: "column", // Change type to line write "line"
            indexLabelFontColor: "#5A5757",
            indexLabelPlacement: "outside",   
            dataPoints: <?php echo $dataPoints_json; ?>
        }]
    });
    chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>

<!-- Display Total Bookings -->
<div style="text-align: center; margin-top: 20px;">
    <h3>Total Bookings: <?php echo $totalBookings; ?></h3>
</div>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>
